<?php
require 'libs/Smarty.class.php';
require 'dataBase.php';
require 'check.php';

$smarty = new Smarty(); 

$smarty -> template_dir = 'templates';
$smarty -> compile_dir = 'templates_c';

session_start();

$name = filter_input(INPUT_POST, 'name');
$contents = filter_input(INPUT_POST, 'contents');
$deleteNumber = filter_input(INPUT_POST, 'deleteNumber');

if(empty($_SESSION["userName"])) {
    $_SESSION["userName"] = "";
}

try {
    //connect
    $db = new PDO(PDO_DSN, DB_USER, DB_PASS);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //insert
    if(isset($name) && isset($contents)) {
        if(!$name == "" && !$contents == "") {
            $stmt = $db -> prepare("INSERT INTO messages(name, contents, submitUser) VALUES(:name, :contents, :submitUser)");
            $stmt -> bindvalue(':name', $name, PDO::PARAM_STR);
            $stmt -> bindvalue(':contents', $contents, PDO::PARAM_STR);
            $stmt -> execute();
        }
    }

    //delete
    if(isset($deleteNumber)) {
        if(!$deleteNumber == "") {
                $stmt = $db -> prepare("DELETE FROM messages WHERE number = :deleteNumber and name = :userName");
                $stmt -> bindValue(':deleteNumber', $deleteNumber);
                $stmt -> bindValue(':userName', $_SESSION["userName"]);
                $stmt -> execute();
        }
    }


    //get Data
    $stmt = $db -> query("SELECT * FROM messages");
    $boards = $stmt -> fetchAll(PDO::FETCH_CLASS);

} catch (PDOException $e) {
    $error = "ただいまデータベースでエラーが発生しています。";
//    echo $e -> getMessage();
}

$smarty -> assign('name', checkInput($name));
$smarty -> assign('contents', checkInput($contents));
$smarty -> assign('boards', $boards);
$smarty -> assign('userName', $_SESSION["userName"]);
$smarty -> assign('deleteNumber', $deleteNumber);
$smarty -> display('index.tpl');

?>