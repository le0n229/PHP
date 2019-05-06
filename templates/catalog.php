<? foreach ($images as $image): ?>
    <?= $image['name'] ?> <br>
    <a href="/image/<?= $image['idx'] ?>">
        <img src="/img/small/<?= $image['filename'] ?>" width="150" height="100">
    </a><br>
    <a href="/basket/buy/<?= $image['idx'] ?>">Купить</a>  <br>
    Цена: <?= $image['price'] ?>  <br>
    <? if ($_SESSION['admin']): ?>
        <form method="post" action="/image/change/<?= $image['idx'] ?>">
        Укажите новую цену товара: <input type="text" name="newPrice" value="<?= $image['price'] ?>">
        <button type="submit" name="changePrice">Изменить цену</button> <br>
        </form>
    <? endif; ?>
    Просмотров: <?= $image['likes'] ?><br>
    <? if ($_SESSION['admin']): ?>
        <form method="post" action="/image/delete/<?= $image['idx'] ?>">
            <button type="submit" name="deleteImage">Удалить товар</button> <br>
        </form>
        <br> <br>

    <? endif; ?>

<? endforeach; ?>

<? if ($_SESSION['admin']): ?>

    <h3>Добавить новый товар</h3>

    <form enctype="multipart/form-data" method="post" action="/image/add/">
        <p>Укажите название товара: <input type="text" name="title"> <br>
       Укажите цену товара: <input type="text" name="price"> <br>
            <input type="file" name="photo" multiple accept="image/*,image/jpeg"> <br>
<button type="submit" name="load">Создать товар</button>
            </p>
    </form>

<? endif; ?>


