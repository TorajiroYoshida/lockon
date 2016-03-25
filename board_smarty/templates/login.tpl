<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>掲示板ログイン</title>
         <link rel="stylesheet" href="comn/style.css">
    </head>
    <body>
        ログイン画面 <input type="button" value="掲示板に戻る" onclick="location.href='index.php';"><br>
        {$userError}
        <form action = "login.php" method = "POST">
            UserName： <input type = "text" name = "userName">{$userName}<br>
            PassWord：<input type = "password" name = "password">{$password}<br>
            <br>
            <input type="submit" value="ログインする">
        </form>
    </body>
</html>