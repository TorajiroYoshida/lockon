<?php
require 'libs/Smarty.class.php';
require 'dataBase.php';
require 'check.php';

$smarty = new Smarty();

$smarty -> template_dir = 'templates';
$smarty -> compile_dir = 'templates_c';

session_start();

$userName = filter_input(INPUT_POST, 'userName');
$nowContents = filter_input(INPUT_POST, 'nowContents');
$editContents = filter_input(INPUT_POST, 'editContents');
$editNumber = filter_input(INPUT_POST, 'editNumber');
$userError = "";
$editError = "";

try {
    //connect
    $db = new PDO(PDO_DSN, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //update
    if(isset($userName) && isset($editContents)) {
        if(!$userName == "" && !$editContents == "") {
            if($userName == $_SESSION["userName"]) {
                if(!$editContents == $nowContents) {
                    $stmt = $db -> prepare("UPDATE messages set contents = :editContents WHERE name = :userName and number = :editNumber");
                    $stmt -> bindValue(':userName', $userName);
                    $stmt -> bindValue(':editContents', $editContents);
                    $stmt -> bindValue(':editNumber', $editNumber);
                    $stmt -> execute();
//                    print ($stmt -> rowCount());
//                    var_dump($stmt);
//                    echo '1';
                    if($stmt -> rowCount() == 1) {
                        header('Location:index.php');
                    } else {
                        $editError = "編集に失敗しました";
                    }
                }
            } else {
                $userError = "ログインしている名前にしてください";
            }
        }
    }

} catch(PDOException $e) {
    $error = "ただいまデータベースでエラーが発生しています。";
//    echo $e -> getMessage();
}

$smarty -> assign('userName', $_SESSION["userName"]);
$smarty -> assign('nowContents', $nowContents);
$smarty -> assign('checkName', checkInput($userName));
$smarty -> assign('checkContents', checkInput($editContents));
$smarty -> assign('editNumber', $editNumber);
$smarty -> assign('userError', $userError);
$smarty -> assign('editError', $editError);
$smarty -> display('edit.tpl');

?>