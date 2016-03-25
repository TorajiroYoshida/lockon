<?php
require 'libs/Smarty.class.php';
require 'check.php';

$smarty = new Smarty();

$smarty -> template_dir = 'templates';
$smarty -> compile_dir = 'templates_c';

session_start();

$name = $_SESSION["userName"];
$contents = filter_input(INPUT_POST, 'edit');

$smarty -> assign('userName', $name);
$smarty -> assign('nowContents', $contents);
$smarty -> assign('checkName', checkInput($name));
$smarty -> assign('checkContents', checkInput($contents));
$smarty -> display('edit.tpl');

?>