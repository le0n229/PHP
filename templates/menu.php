<p>
    <a href="/">Главная</a>
<!--    <a href="/news/">Новости</a>-->
    <a href="/catalog/">Каталог</a>
    <a href="/feedback/">Отзывы</a>
    <? if ($ngoods != 0): ?>
        <a href="/basket/">Корзина (<?=$ngoods?>)</a>
    <?else:?>
<!--        <a href="/basket/">Корзина</a>-->
    <?endif;?>
    <a href="/orders/">Заказы</a>
    <br>

    <? if ($allow): ?>
        Добро пожаловать, <?= $user ?> <a href='/logout/'>выход</a>
    <? else: ?>
<form method="post" action="/login/">
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    <br>
    Save? <input type='checkbox' name='save'>
    <button type='submit' name='send'>Войти</button>
    <br>
    ---or---
    <br>
    <button type='submit' name='reg'>Зарегестрироваться</button>
</form>
<? endif; ?>

</p>