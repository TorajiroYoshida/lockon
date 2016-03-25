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

try {
    //connect
    $db = new PDO(PDO_DSN, DB_USER, DB_PASS);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $db -> query("SELECT * FROM users");
    $users = $stmt -> fetchAll(PDO::FETCH_CLASS);
    
    foreach($users as $user) {
        if($user->name == $userName && $user->password == $password) {
            $userError = "ログインできました。";
            $_SESSION["userName"] = $userName;
            header('Location:index.php');
            break;
        }
        if($user == end($users)){
            if(isset($userName) && isset($password)) {
                $userError = "ログインに失敗しました";
            }
        }
    }
} catch (PDOException $e) {
//    echo $e -> getMessage();
}

$smarty -> assign('userName', checkInput($userName));
$smarty -> assign('password', checkInput($password));
$smarty -> assign('userError', $userError);

$smarty -> display('login.tpl');
?>