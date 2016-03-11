<?php
require 'libs/Smarty.class.php';
require 'dataBase.php';
require 'check.php';

$smarty = new Smarty(); 

$smarty -> template_dir = 'templates';
$smarty -> compile_dir = 'templates_c';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$contents = filter_input(INPUT_POST, 'contents', FILTER_SANITIZE_SPECIAL_CHARS);

class Board {
    function getShow() {
        return e("($this->name)$this->contents");
//        e("($this->name)$this->contents");
    }
}

try {
    //connect
    $db = new PDO(PDO_DSN, DB_USER, DB_PASS);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //insert
    if(isset($name) && isset($contents)) {
        if(!$name == "" && !$contents == "") {
            $stmt = $db -> prepare("INSERT INTO messages(name, contents) VALUES(:name, :contents)");
            $stmt -> bindvalue(':name', $name, PDO::PARAM_STR);
            $stmt -> bindvalue(':contents', $contents, PDO::PARAM_STR);
            $stmt -> execute();
        }
    }
    
    //get Data
    $stmt = $db -> query("SELECT * FROM messages");
    $boards = $stmt -> fetchAll(PDO::FETCH_CLASS, 'Board');
    
    foreach($boards as $board) {
        $print[] = $board -> getShow();
    }
    
} catch (PDOException $e) {
    $error = "ただいまデータベースでエラーが発生しています。";
//    echo $e -> getMessage();
}

$smarty -> assign('name', checkInput($name));
$smarty -> assign('contents', checkInput($contents));
$smarty -> assign('boards', $print);
$smarty -> display('index.tpl');

?>