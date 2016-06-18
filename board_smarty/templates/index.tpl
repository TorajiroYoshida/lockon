<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>Smartyの掲示板</title>
         <link rel="stylesheet" href="comn/style.css">
    </head>
    <body>
    <input type="button" value="ログイン" onclick="location.href='login.php';">
    <input type="button" value="会員登録" onclick="location.href='addAccount.php';">
    <input type="button" value="ログアウト" onclick="location.href='logout.php';">
    {if isset($userName)}
        {if !$userName == ""}
            {$userName}としてログイン中
        {else}
            ゲストです
        {/if}
    {else}
        ゲストです
    {/if}
    <br><hr>

        {if isset($boards)}
            {foreach $boards as $board}
                ({$board->name})<br>
                {nl2br(htmlspecialchars($board->contents))}<br>
                {if $userName == $board->name}
                    <form action="index.php" method="POST">
                        <input type="hidden" name="deleteNumber" value="{$board->number}">
                        <input type="submit" value="削除する">
                    </form>
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="nowContents" value="{$board->contents}">
                        <input type="hidden" name="editNumber" value="{$board->number}">
                        <input type="submit" value="編集" onclick="location.href='edit.php'">
                    </form>
                {/if}
                <hr>
            {/foreach}
        {/if}

        <form action="index.php" method="POST">
            名前： <input type="text" name="name" value={$userName}>{$name}{$userError}<br>
            本文： <textarea name="contents" cols="50" rows="3"></textarea>{$contents}<br>
            <br>
            <input type="submit" value="送信する">
        </form>
    </body>
</html>