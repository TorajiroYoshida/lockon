<?php
define('DB_NAME', 'board_app');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=board_app;charset=utf8');

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$contents = filter_input(INPUT_POST, 'contents', FILTER_SANITIZE_SPECIAL_CHARS);

class Board {
    function show() {
        e("($this->name)$this->contents");
        echo "<br><hr>";
    }
}

function e($str, $charset = 'UTF-8') {
    print htmlspecialchars($str, ENT_QUOTES, $charset);
}

function h($text) {
    if(isset($text)) {
        if($text == "") {
            echo '入力してください';
        }
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
    foreach($boards as $board) {
        $board -> show();
    }
    
} catch (PDOException $e) {
    echo $e -> getMessage();
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
        <form action = "board.php" method = "POST">
            名前： <input type = "text" name = "name"><?php h(filter_input(INPUT_POST, 'name')) ?><br/>
            本文： <textarea name= "contents" cols="50" rows="3"></textarea><?php h(filter_input(INPUT_POST, 'contents')) ?><br>
            <br>
            <input type="submit" value="送信する">
        </form>
    </body>
</html>
