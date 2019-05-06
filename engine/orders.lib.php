<?php

function makeOrder()
{
    if (isset($_POST['makeOrder'])) {
        $basket = getBasket();
        if (count($basket) > 0) {
            $db = getDb();
            $name = mysqli_real_escape_string($db, strip_tags(stripslashes($_POST['name'])));
            $phone = mysqli_real_escape_string($db, strip_tags(stripslashes($_POST['phone'])));
            $session = session_id();
            $today = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `orders`(`name`, `phone`, `id_session`, `date`, `status`) VALUES ('$name','$phone','$session', '$today', 'Ожидает подтверждения')";
            @mysqli_query($db, $sql) or die(mysqli_error($db));
            $result = mysqli_query($db, "SELECT id FROM orders WHERE `name` = '{$name}' AND `id_session` = '{$session}' AND `date` = '{$today}' ORDER BY `date` LIMIT 1");
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];

            foreach ($basket as $value) {
                $sql = "INSERT INTO `orders_goods`(`id_orders`, `id_goods`) VALUES ('$id','$value[good]')";
                @mysqli_query($db, $sql) or die(mysqli_error($db));
            }
            $sql = "DELETE FROM `basket` WHERE `session`= '{$session}'";
            @mysqli_query($db, $sql) or die(mysqli_error($db));
//            session_regenerate_id();
            header("Location: /basket/?message=ok");
        }
    }
}

function getOrders() {

    if ($_SESSION['admin']){
        $sql = "SELECT * FROM `orders`";
    } else{
        $session = session_id();
        $sql = "SELECT * FROM `orders` WHERE  `id_session` = '{$session}'";
    }
    $orders = getAssocResult($sql);
//    foreach ( $orders as $value ) {
//        $goods=getOrderGoods($value['id']);
//        $value['goods']=$goods;
//    }
    function changeArray($value) {
        $goods=getOrderGoods($value['id']);
        $fullGoods=[];
        $sum=0;
        foreach ( $goods as $item ) {
            $good=getOneImage($item['id_goods']);
            $good['id_orders_goods']= $item['id'];
            $sum+=$good[price];
            array_push($fullGoods, $good);
        }
        $value['goods']=$fullGoods;
        $value['sum']=$sum;
        return $value;
    }
    $newOrders=array_map('changeArray', $orders);
//        var_dump($newOrders);
//        die;
    return $newOrders;
}

function getOrderGoods($id_order) {
    $sql = "SELECT * FROM `orders_goods` WHERE  `id_orders` = '{$id_order}'";
    return getAssocResult($sql);
}

function deleteOrder($id) {

    $sql = "DELETE FROM `orders` WHERE id = {$id}";

    return executeQuery($sql);
}

function approveOrder($id) {

    $sql = "UPDATE `orders` SET `status`='Подтверждён' WHERE id = {$id}";

    return executeQuery($sql);
}

function changeOrder($id_good, $id_order) {


    $sql = "DELETE FROM `orders_goods` WHERE id_orders = {$id_order} AND id = {$id_good}";

    return executeQuery($sql);
}