<!--2. Выполнить примеры из методички, разобраться, как это работает.-->

<?php
echo "Hello, World!";
$name = "GeekBrains user";
echo "Hello, $name!";
define('MY_CONST', 100);
echo MY_CONST;

?>


<?php
$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br>";
?>

<br>

<?php
$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3";
?>


<?php
$a = 1;
echo "$a";
echo '$a';
?>

<br>
<?php
$a = 10;
$b = (boolean)$b;
?>


<?php
$a = 'Hello,';
$b = 'world';
$c = $a . $b;
echo $c;
?>



<?php
$a = 4;
$b = 5;
echo $a + $b . '<br>';    // сложение
echo $a * $b . '<br>';    // умножение
echo $a - $b . '<br>';    // вычитание
echo $a / $b . '<br>';  // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень
?>

<br>
<?php
$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a. '<br>';
$a = 0;
echo $a++ . '<br>';     // Постинкремент
echo ++$a . '<br>';    // Преинкремент
echo $a-- . '<br>';     // Постдекремент
echo --$a . '<br>';  // Предекремент
?>

<br>

<?php
$a = 4;
$b = 5;
var_dump($a == $b);  // Сравнение по значению
var_dump($a === $b); // Сравнение по значению и типу
var_dump($a > $b);    // Больше
var_dump($a < $b);    // Меньше
var_dump($a <> $b);  // Не равно
var_dump($a != $b);   // Не равно
var_dump($a !== $b); // Не равно без приведения типов
var_dump($a <= $b);  // Меньше или равно
var_dump($a >= $b);  // Больше или равно?>

<!--3.Объяснить, как работает данный код: -->

<br>
<?php
$a = 5;
$b = '05';
var_dump($a == $b);                             // Почему true? Нестрогое сравнение
var_dump((int)'012345');                        // Почему 12345? приведение к целому десятичному числу убирает 0 в начале
var_dump((float)123.0 === (int)123.0); // Почему false? строгое сравнение разных типов данных
var_dump((int)0 === (int)'hello, world'); // Почему true? приведение строки без цифр отбрасывает всё и получается 0
?>


