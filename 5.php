<?php
//5. Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // думал 1 оказалось 2 т.к. сама переменная хранится в классе и каждый вызов в любом экземпляре инкрементирует именно её.
$a1->foo(); // думал 2 оказалось 3
$a2->foo(); // думал 2 оказалось 4
//Что он выведет на каждом шаге? Почему?
