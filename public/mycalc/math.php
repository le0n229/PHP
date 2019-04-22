<?php


$operand1 = (int)$_POST['operand1'];
$operand2 = (int)$_POST['operand2'];
$operation = $_POST['operation'];

$result = mathOperation($operand1, $operand2, $operation);

header("Location: /calculator.php/?result=$result&oper1=$operand1&oper2=$operand2");

function sum($a, $b) {
    return $a+$b;
}
function sub($a, $b) {
    return $a-$b;
}
function multy($a, $b) {
    return $a*$b;
}
function div($a, $b) {
    if ($b==0){
        return 'Ошибка деления на ноль';
    }
    return $a/$b;
}

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case sum:
            return $operation($arg1,$arg2);
            break;
        case sub:
            return $operation($arg1,$arg2);
            break;
        case multy:
            return $operation($arg1,$arg2);
            break;
        case div:
            return $operation($arg1,$arg2);
            break;
        default:
            return "Неккоректные данные";
    }
}