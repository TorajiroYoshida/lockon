<?php
/* Smarty version 3.1.29, created on 2016-03-05 10:22:18
  from "/Applications/MAMP/htdocs/board_smarty/templates/hello.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56daa54a339ef1_00801533',
  'file_dependency' => 
  array (
    'd73ee4ea4064e1f022c9d1262b1a45c3b0c2ddba' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/hello.tpl',
      1 => 1457169713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56daa54a339ef1_00801533 ($_smarty_tpl) {
?>
<html>
    <meta charset="utf-8">
        こんにちは、<?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
さん。
    <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['Fruits']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
            <li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <b><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</b></li>
        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
    </ul>
</html><?php }
}
