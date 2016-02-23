<?php
$num1 = filter_input(INPUT_POST, 'num1');
$operator = filter_input(INPUT_POST, 'operator');
$num2 = filter_input(INPUT_POST, 'num2');

if (!is_null($num1) && !is_null($num2)) {
    if(ctype_digit($num1) && ctype_digit($num2)) {
        switch ($operator) {
            case '-':
                $answer = $num1 - $num2;
                break;
            case '*':
                $answer = $num1 * $num2;
                break;
            case '/':
                if($num2 == 0) {
                    $answer = '0 で割れません。';
                } else {
                    $answer = $num1 / $num2;
                }
                break;
            case '+':
                $answer = $num1 + $num2;
                break;
            default:
                $answer = '計算記号が ' . $operator . ' になってます';
        }
        $result = "{$num1} {$operator} {$num2} = {$answer}";
    } else {
        if(!ctype_digit($num1) && !ctype_digit($num2)) {
            $result = '両方が数字ではないです。';
        } else if(!ctype_digit($num1)) {
            $result = '１つ目が数字ではないです。';
        } else if(!ctype_digit($num2)) {
            $result = '２つ目が数字ではないです。';
        }
    }
} else {
    $result = '入力なし';
}

function e($str, $charset = 'UTF-8') {
    print htmlspecialchars($str, ENT_QUOTES, $charset);
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
 and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>電卓の基本</title>
    </head>
    <body>
        <form method = "POST">
            <input type="text" name="num1" value="<?php echo $num1; ?>"/>
            <select name="operator">
                <option value="+" <?php if ($operator === '+') {
                    echo 'selected';
                } ?>>+</option>
                <option value="-" <?php if ($operator === '-') {
                    echo 'selected';
                } ?>>-</option>
                <option value="*" <?php if ($operator === '*') {
                    echo 'selected';
                } ?>>*</option>
                <option value="/" <?php if ($operator === '/') {
                    echo 'selected';
                } ?>>/</option>
            </select>
            <input type="text" name="num2" value="<?php e($num2); ?>"/>
            <input type="submit" value="計算する">
        </form>
        <p><?php e($result); ?></p>
    </body>
</html>
