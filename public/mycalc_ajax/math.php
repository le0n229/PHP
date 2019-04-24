<?php

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));

    $decoded = json_decode($content, true);


    //If json_decode failed, the JSON is invalid.
    if(! is_array($decoded)) {

    } else {
        // Send error back to user.
    }
}


$operand1 = (int)$decoded['operand1'];
$operand2 = (int)$decoded['operand2'];
$operation = $decoded['operation'];
$response['result'] = mathOperation($operand1, $operand2, $operation);
echo json_encode($response);

//header("Location: calculator.php/?result=$result&oper1=$operand1&oper2=$operand2");

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