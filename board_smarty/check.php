<?php
function e($str, $charset = 'UTF-8') {
    return htmlspecialchars($str, ENT_QUOTES, $charset);
}

function checkInput($text) {
    if(isset($text)) {
        if($text == "") {
            return '入力してください';
        }
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>