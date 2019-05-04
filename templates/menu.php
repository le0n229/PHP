<?

session_start();
$allow = false;



$cartLength=getCurrentCartLength();


if (isset($_GET['logout'])) {
session_destroy();
setcookie("hash");
header("Location: /");
}

if (is_auth()) {
$allow = true;
$user = get_user();
}


if (isset($_GET['send'])) {
$login = $_GET['login'];
$pass = $_GET['pass'];

if (!auth($login, $pass)) {
Die('Не верный логин пароль');
} else {
if (isset($_GET['save'])) {
$hash = uniqid(rand(), true);
$db = getDb();
$id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
$sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
$result = mysqli_query($db, $sql);
setcookie("hash", $hash, time() + 3600);
header("Location: /");
}
$allow = true;
$user = get_user();


}
}

if (isset($_GET['reg'])) {
$login = $_GET['login'];
$pass = $_GET['pass'];
if (!regUser( $login ,password_hash($pass, PASSWORD_DEFAULT))) {
    Die('Такой пользователь уже существует');
}
$allow = true;
$user = get_user();
}
?>

<p>
    <? if (!$allow): ?>
<form>
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    <br>
    Save? <input type='checkbox' name='save'>
    <button id="login" type='submit' name='send'> Войти </button>
    <br>
    ---or---
    <br>
    <button type='submit' name='reg'> Регистрация </button>
</form>
<? else: ?>
    <p>Добро пожаловать <?= $user ?> <a href='?logout'>выход</a> </p>
<? endif; ?>
<a href="/">Главная</a>
<!--<a href="/news/">Новости</a>-->
<!--<a href="/catalog/">Каталог</a>-->
<!--<a href="/feedback/">Отзывы</a>-->
<a href="/shop/">Магазин</a>
<a href="/cart/">Ваша корзина(<?=$cartLength?>)</a>
</p>


