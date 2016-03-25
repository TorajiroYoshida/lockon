<?php
/* Smarty version 3.1.29, created on 2016-03-25 03:29:56
  from "/Applications/MAMP/htdocs/board_smarty/templates/edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f4a2a4098cd0_94702808',
  'file_dependency' => 
  array (
    '9d73832c2392b663832dc98edd7ba4091a4ad8f7' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/edit.tpl',
      1 => 1458872091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f4a2a4098cd0_94702808 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>掲示板ログイン</title>
        <link rel="stylesheet" href="comn/style.css">
    </head>
    <body>
        編集ページ <input type="button" value="掲示板に戻る" onclick="location.href='index.php';"><br>
        <form action = "login.php" method = "POST">
            名前： <input type = "text" name = "userName" value=<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
><?php echo $_smarty_tpl->tpl_vars['checkName']->value;?>
<br>
            本文： <textarea name="contents" cols="50" rows="3"><?php echo $_smarty_tpl->tpl_vars['nowContents']->value;?>
</textarea><?php echo $_smarty_tpl->tpl_vars['checkContents']->value;?>
<br>
            <br>
            <input type="submit" value="編集を完了する">
        </form>
    </body>
</html><?php }
}
