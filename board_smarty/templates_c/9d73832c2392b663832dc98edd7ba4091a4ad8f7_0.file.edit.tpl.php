<?php
/* Smarty version 3.1.29, created on 2016-03-29 10:56:42
  from "/Applications/MAMP/htdocs/board_smarty/templates/edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fa434a086fb8_62408011',
  'file_dependency' => 
  array (
    '9d73832c2392b663832dc98edd7ba4091a4ad8f7' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/edit.tpl',
      1 => 1459241791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fa434a086fb8_62408011 ($_smarty_tpl) {
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
        編集ページ <input type="button" value="掲示板に戻る" onclick="location.href='index.php';"><?php echo $_smarty_tpl->tpl_vars['editError']->value;?>
<br>
        <form action = "edit.php" method = "POST">
            <input type="hidden" name="editNumber" value="<?php echo $_smarty_tpl->tpl_vars['editNumber']->value;?>
">
            名前： <input type="text" name="userName" value=<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
><?php echo $_smarty_tpl->tpl_vars['checkName']->value;
echo $_smarty_tpl->tpl_vars['userError']->value;?>
<br>
            本文： <textarea name="editContents" cols="50" rows="3"><?php echo $_smarty_tpl->tpl_vars['nowContents']->value;?>
</textarea><?php echo $_smarty_tpl->tpl_vars['checkContents']->value;?>
<br>
            <br>
            <input type="submit" value="編集を完了する">
        </form>
    </body>
</html><?php }
}
