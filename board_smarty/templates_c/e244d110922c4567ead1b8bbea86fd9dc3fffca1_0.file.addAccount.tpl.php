<?php
/* Smarty version 3.1.29, created on 2016-06-13 02:22:54
  from "/Applications/MAMP/htdocs/board_smarty/templates/addAccount.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575dfcdeca6d62_55904353',
  'file_dependency' => 
  array (
    'e244d110922c4567ead1b8bbea86fd9dc3fffca1' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/addAccount.tpl',
      1 => 1465777369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575dfcdeca6d62_55904353 ($_smarty_tpl) {
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
新規登録 <input type="button" value="掲示板に戻る" onclick="location.href='index.php';"><input type="button" value="ログイン" onclick="location.href='login.php';"><br>
<?php echo $_smarty_tpl->tpl_vars['userError']->value;?>

<form action = "addAccount.php" method = "POST">
    UserName： <input type = "text" name = "userName"><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
<br>
    PassWord：<input type = "password" name = "password"><?php echo $_smarty_tpl->tpl_vars['password']->value;?>
<br>
    <br>
    <input type="submit" value="登録する">
</form>
</body>
</html><?php }
}
