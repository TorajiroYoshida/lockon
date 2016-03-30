<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>掲示板ログイン</title>
        <link rel="stylesheet" href="comn/style.css">
    </head>
    <body>
        編集ページ <input type="button" value="掲示板に戻る" onclick="location.href='index.php';">{$editError}<br>
        <form action = "edit.php" method = "POST">
            <input type="hidden" name="editNumber" value="{$editNumber}">
            <input type="hidden" name="nowContents" value="{$nowContents}">
            名前： <input type="text" name="userName" value={$userName}>{$checkName}{$userError}<br>
            本文： <textarea name="editContents" cols="50" rows="3">{$nowContents}</textarea>{$checkContents}<br>
            <br>
            <input type="submit" value="編集を完了する">
        </form>
    </body>
</html>