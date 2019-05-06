<h3>Ваши заказы:</h3>

<ol>
<? foreach ($orders as $value ):?>

    <li data-id="<?=$value['id']?>" class="orders">Номер заказа:<?=$value['id']?> <br>
        Время заказа:<?=$value['date']?> <br>
        Имя:<?=$value['name']?> <br>
        Телефон:<?=$value['phone']?> <br>
        Статус: <span class="statusOrder" data-id="<?=$value['id']?>"> <?=$value['status']?></span>
        <? if ($_SESSION['admin']): ?>
        <? if ($value['status']!= 'Подтверждён'): ?>
        <button class="approveOrder" data-id="<?=$value['id']?>">Подтвердить заказ</button> <br><br>
            <?endif;?>
        <?endif;?>
        <ol>
        <? foreach ($value['goods'] as  $item):?>
<!--            --><?//var_dump($item);
//            die;?>
        <li class="good" data-good="<?=$item['id_orders_goods']?>">
            <div id="item_<?=$item['idx']?>">
                <?=$item['name']?> <br>
                <? if ($_SESSION['admin']): ?>
                <button data-order="<?=$value['id']?>" class="deleteGood" data-good="<?=$item['id_orders_goods']?>">Удалить</button>
                <?endif;?>
                <br>
                Цена: <?=$item['price']?>  <br>
            </div> <br> </li>
        <?endforeach;?>
        </ol>
        Стоимость итого по заказу: <?=$value['sum']?>
        <button class="deleteOrder" data-id="<?=$value['id']?>">Отменить заказ</button>
    </li> <br>
<?endforeach;?>
</ol>

<script>
    const ordersList = document.getElementsByClassName('orders');
    const orders = Array.prototype.slice.call(ordersList);
    $(document).ready(function(){
        $(".deleteOrder").on('click', function(e){
            const id = e.target.dataset.id;

            $.ajax({
                url: "/orders/delete/" + id,
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    const currentOrder = orders.filter( el => el.dataset.id === id);
                    currentOrder[0].remove();
                }

            })
        });

    });
    const approveList = document.getElementsByClassName('approveOrder');
    const approveButtons = Array.prototype.slice.call(approveList);
    const statusList = document.getElementsByClassName('statusOrder');
    const status = Array.prototype.slice.call(statusList);
    $(document).ready(function(){
        $(".approveOrder").on('click', function(e){
            const id = e.target.dataset.id;

            $.ajax({
                url: "/orders/approve/" + id,
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    const currentApproveButton = approveButtons.filter( el => el.dataset.id === id);
                    currentApproveButton[0].remove();
                    const currentStatus = status.filter( el => el.dataset.id === id);
                    currentStatus[0].innerText='Подтверждён'
                    $('#all').html(answer.summ);
                    $('#item_'+answer.id).remove();
                }

            })
        });

    });
    $(document).ready(function(){
        $(".deleteGood").on('click', function(e){
            const id_good = e.target.dataset.good;
            const id_order = e.target.dataset.order;

            $.ajax({
                url: "/orders/change/" + id_order,
                type: "POST",
                dataType : "json",
                data:{
                    id_good,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    $(`li[data-good=${id_good}]`).remove();
                }

            })
        });

    });
</script>


