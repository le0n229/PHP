<!--1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:-->
<!--если $a и $b положительные, вывести их разность;-->
<!--если $а и $b отрицательные, вывести их произведение;-->
<!--если $а и $b разных знаков, вывести их сумму;-->
<!--Ноль можно считать положительным числом.-->
<?php
$a = 1;
$b = 2;

function checkNumbers($a,$b) {
if (($a >= 0) && ($b >= 0)) {
    echo"($a - $b)=". ($a - $b)."<br>";
} else if (($a < 0) && ($b < 0)){
    echo "($a * $b)=". ($a * $b)."<br>";
} else {
    echo "($a + $b)=". ($a + $b)."<br>";
}}

checkNumbers(3,5);
checkNumbers(-3,-5);
checkNumbers(3,-5);

?>

<!--2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
switch организовать вывод чисел от $a до 15. *. сделайте это через цикл if-->

<?
$a=3;

switch($a) {
    case 0:
        echo 0;
    case 1:
        echo 1;
    case 2:
        echo 2;
    case 3:
        echo 3;
    case 4:
        echo 4;
    case 5:
        echo 5;
    case 6:
        echo 6;
    case 7:
        echo 7;
    case 8:
        echo 8;
    case 9:
        echo 9;
    case 10:
        echo 10;
    case 11:
        echo 11;
    case 12:
        echo 12;
    case 13:
        echo 13;
    case 14:
        echo 14;
    case 15:
        echo 15;
        break;
    default:
        echo "Неккоректные данные";
}

?>

<!--3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
 Обязательно использовать оператор return. В делении на 0 сделайте проверку и вывод
 сообщения об ошибке.-->
<?
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

//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2,
// $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием
// операции. В зависимости от переданного значения операции выполнить одну из
// арифметических операций (использовать функции из пункта 3) и вернуть полученное
// значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case sum:
            echo $operation($arg1,$arg2)."<br>";
            break;
        case sub:
            echo $operation($arg1,$arg2)."<br>";
            break;
        case multy:
            echo $operation($arg1,$arg2)."<br>";
            break;
        case div:
            echo $operation($arg1,$arg2)."<br>";
            break;
        default:
            echo "Неккоректные данные";
    }
}

mathOperation(3,5,'sum');
mathOperation(3,5,'sub');
mathOperation(3,5,'multy');
mathOperation(3,5,'div');
mathOperation(3,0,'div');
mathOperation(3,5,'sub123');

?>


<!--5. ВАЖНОЕ! Написать функцию renderTemplate возвращающую шаблон в виде текста,
вынесите весь повторяющийся код из шаблона страниц (doctype, menu, header, footer)
в отдельный шаблон (layout), сделайте отдельный шаблон страницы с приветствием.
Обеспечьте формирование результирующей страницы используя только функцию renderTemplate,
 т.е. в layout должен вставиться подшаблончик страницы с приветствием.-->

<?


?>