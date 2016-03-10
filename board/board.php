<?php
require 'dataBase.php';
require 'check.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$contents = filter_input(INPUT_POST, 'contents', FILTER_SANITIZE_SPECIAL_CHARS);

class Board {
    function show() {
        e("($this->name)$this->contents");
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
    
    $stmt = $db -> query("SELECT * FROM messages");
    $boards = $stmt -> fetchAll(PDO::FETCH_CLASS, 'Board');
    
} catch (PDOException $e) {
    $error = "ただいまデータベースでエラーが発生しています。";
//    echo $e -> getMessage();
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>掲示板</title>
    </head>
    <body>
        <?php
            foreach($boards as $board) {
                $board -> show();
                echo "<br><hr>";
            }
        ?>
        <form action = "board.php" method = "POST">
            名前： <input type = "text" name = "name"><?php checkInput($name) ?><br>
            本文： <textarea name= "contents" cols="50" rows="3"></textarea><?php checkInput($contents) ?><br>
            <br>
            <input type="submit" value="送信する">
            <?php
                if(isset($error)) {
                    print($error);
                }
            ?>
        </form>
    </body>
</html>
