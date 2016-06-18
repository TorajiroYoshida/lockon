<?php
/* Smarty version 3.1.29, created on 2016-06-13 02:16:53
  from "/Applications/MAMP/htdocs/board_smarty/templates/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575dfb75150d70_13597715',
  'file_dependency' => 
  array (
    '53049266612d6c08ca244d12849ad38246961ad6' => 
    array (
      0 => '/Applications/MAMP/htdocs/board_smarty/templates/index.tpl',
      1 => 1460417090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_575dfb75150d70_13597715 ($_smarty_tpl) {
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
    <input type="button" value="ログイン" onclick="location.href='login.php';">
    <input type="button" value="会員登録" onclick="location.href='addAccount.php';">
    <input type="button" value="ログアウト" onclick="location.href='logout.php';">
    <?php if (isset($_smarty_tpl->tpl_vars['userName']->value)) {?>
        <?php if (!$_smarty_tpl->tpl_vars['userName']->value == '') {?>
            <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
としてログイン中
        <?php } else { ?>
            ゲストです
        <?php }?>
    <?php } else { ?>
        ゲストです
    <?php }?>
    <br><hr>

        <?php if (isset($_smarty_tpl->tpl_vars['boards']->value)) {?>
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
                (<?php echo $_smarty_tpl->tpl_vars['board']->value->name;?>
)<br>
                <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['board']->value->contents));?>
<br>
                <?php if ($_smarty_tpl->tpl_vars['userName']->value == $_smarty_tpl->tpl_vars['board']->value->name) {?>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="deleteNumber" value="<?php echo $_smarty_tpl->tpl_vars['board']->value->number;?>
">
                        <input type="submit" value="削除する">
                    </form>
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="nowContents" value="<?php echo $_smarty_tpl->tpl_vars['board']->value->contents;?>
">
                        <input type="hidden" name="editNumber" value="<?php echo $_smarty_tpl->tpl_vars['board']->value->number;?>
">
                        <input type="submit" value="編集" onclick="location.href='edit.php'">
                    </form>
                <?php }?>
                <hr>
            <?php
$_smarty_tpl->tpl_vars['board'] = $__foreach_board_0_saved_local_item;
}
if ($__foreach_board_0_saved_item) {
$_smarty_tpl->tpl_vars['board'] = $__foreach_board_0_saved_item;
}
?>
        <?php }?>

        <form action="index.php" method="POST">
            名前： <input type="text" name="name" value=<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
><?php echo $_smarty_tpl->tpl_vars['name']->value;
echo $_smarty_tpl->tpl_vars['userError']->value;?>
<br>
            本文： <textarea name="contents" cols="50" rows="3"></textarea><?php echo $_smarty_tpl->tpl_vars['contents']->value;?>
<br>
            <br>
            <input type="submit" value="送信する">
        </form>
    </body>
</html><?php }
}
