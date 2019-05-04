<div class="item">
    <? if ($goods): ?>
    <? foreach ($goods as $value): ?>
        <div>
            <a rel="gallery" class="photo" href="/productpage/?id=<?=$value['id']?>"><img src="/img/gallery_img/small/<?=$value['picture']?>" width="150" height="100" /></a>
            <div><a href="/productpage/?id=<?=$value['id']?>">Подробнее</a></div>
            <form>
                <input type="text" name="id" value="<?=$value['id_cart']?>" hidden>
                <button type="submit" name='delete' data-id="<?=$value['id_cart']?>" class="delete">Удалить</button>
            </form>
        </div>
    <?endforeach;?>
    <a href='/order/'>Оформить заказ</a>
    <? else: ?>
    Корзина пуста
    <? endif; ?>
</div>