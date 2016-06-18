<?php
require 'libs/Smarty.class.php';
require 'dataBase.php';
require 'check.php';

$smarty = new Smarty();

$smarty -> template_dir = 'templates';
$smarty -> compile_dir = 'templates_c';

session_start();

$userName = filter_input(INPUT_POST, 'userName');
$password = filter_input(INPUT_POST, 'password');
$userError = "";
$sameName = false;

try {
    //connect
    $db = new PDO(PDO_DSN, DB_USER, DB_PASS);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db -> query("SELECT * FROM users");
    $users = $stmt -> fetchAll(PDO::FETCH_CLASS);

    if(isset($userName) && isset($password)) {
        if($userName != "" && $password != "") {
            foreach($users as $user) {
                if($userName == $user -> name) {
                    $sameName = true;
                }
            }
            if($sameName == true) {
                $userError = "すでに登録されています。別の名前にしてください。";
            } else {
                $stmt = $db -> prepare("INSERT INTO users(name, password) VALUES(:name, :password)");
                $stmt -> bindvalue(':name', $userName, PDO::PARAM_STR);
                $stmt -> bindvalue(':password', $password, PDO::PARAM_STR);
                $stmt -> execute();
                $userError = "登録できました。";
            }
        }
    }
} catch (PDOException $e) {
//    echo $e -> getMessage();
}

$smarty -> assign('userName', checkInput($userName));
$smarty -> assign('password', checkInput($password));
$smarty -> assign('userError', $userError);

$smarty -> display('addAccount.tpl');
?>