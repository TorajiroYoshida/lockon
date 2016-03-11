<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>Smartyの掲示板</title>
         <link rel="stylesheet" href="comn/style.css">
    </head>
    <body>
        {foreach $boards as $board}
            {$board}
            <br><hr>
        {/foreach}

        <form action = "index.php" method = "POST">
            名前： <input type = "text" name = "name">{$name}<br>
            本文： <textarea name= "contents" cols="50" rows="3"></textarea>{$contents}<br>
            <br>
            <input type="submit" value="送信する">
        </form>
    </body>
</html>