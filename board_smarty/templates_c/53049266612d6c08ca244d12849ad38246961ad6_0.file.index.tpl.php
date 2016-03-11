<?php
/* Smarty version 3.1.29, created on 2016-03-10 10:52:32
  from "/Applications/MAMP/htdocs/board_smarty/templates/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e143e029f537_64605780',
  'file_dependency' => 
  array (
    '53049266612d6c08ca244d12849ad38246961ad6' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/index.tpl',
      1 => 1457603471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e143e029f537_64605780 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>Smartyの掲示板</title>
         <link rel="stylesheet" href="comn/style.css">
    </head>
    <body>
        <?php
$_from = $_smarty_tpl->tpl_vars['boards']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_board_0_saved_item = isset($_smarty_tpl->tpl_vars['board']) ? $_smarty_tpl->tpl_vars['board'] : false;
$_smarty_tpl->tpl_vars['board'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['board']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['board']->value) {
$_smarty_tpl->tpl_vars['board']->_loop = true;
$__foreach_board_0_saved_local_item = $_smarty_tpl->tpl_vars['board'];
?>
            <?php echo $_smarty_tpl->tpl_vars['board']->value;?>

            <br><hr>
        <?php
$_smarty_tpl->tpl_vars['board'] = $__foreach_board_0_saved_local_item;
}
if ($__foreach_board_0_saved_item) {
$_smarty_tpl->tpl_vars['board'] = $__foreach_board_0_saved_item;
}
?>

        <form action = "index.php" method = "POST">
            名前： <input type = "text" name = "name"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br>
            本文： <textarea name= "contents" cols="50" rows="3"></textarea><?php echo $_smarty_tpl->tpl_vars['contents']->value;?>
<br>
            <br>
            <input type="submit" value="送信する">
        </form>
    </body>
</html><?php }
}
