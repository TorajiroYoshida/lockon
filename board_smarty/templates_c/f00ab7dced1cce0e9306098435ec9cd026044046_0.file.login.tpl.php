<?php
/* Smarty version 3.1.29, created on 2016-03-16 16:54:05
  from "/Applications/MAMP/htdocs/board_smarty/templates/login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e9819d557391_07861211',
  'file_dependency' => 
  array (
    'f00ab7dced1cce0e9306098435ec9cd026044046' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/login.tpl',
      1 => 1458034757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e9819d557391_07861211 ($_smarty_tpl) {
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
        ログイン画面 <input type="button" value="掲示板に戻る" onclick="location.href='index.php';"><br>
        <?php echo $_smarty_tpl->tpl_vars['userError']->value;?>

        <form action = "login.php" method = "POST">
            UserName： <input type = "text" name = "userName"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
<br>
            PassWord：<input type = "password" name = "password"><?php echo $_smarty_tpl->tpl_vars['password']->value;?>
<br>
            <br>
            <input type="submit" value="ログインする">
        </form>
    </body>
</html><?php }
}
