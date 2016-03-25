<?php
require 'libs/Smarty.class.php';
require 'dataBase.php';
require 'check.php';

$smarty = new Smarty();

$smarty -> template_dir = 'templates';
$smarty -> compile_dir = 'templates_c';

session_start();

session_unset();

$smarty -> display('logout.tpl');
?>