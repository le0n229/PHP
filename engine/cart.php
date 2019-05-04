<?php

function addToCart($id) {
    if ($_SESSION['id']){
        $userId=$_SESSION['id'];
    } else {
        $userId=$_COOKIE["PHPSESSID"];
    }
    $db = getDb();
    $id = mysqli_real_escape_string($db, strip_tags(stripslashes($id)));
    $sql = "INSERT INTO cart (id_session, id_goods) VALUES ('$userId', '$id');";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
    return true;
}

function getCurrentCartLength() {
    if ($_SESSION['id']){
        $userId=$_SESSION['id'];
    } else {
        $userId=$_COOKIE["PHPSESSID"];
    }
    $db = getDb();
    $sql = "SELECT COUNT(id) FROM cart WHERE `id_session` = '{$userId}'; ";
    $result=@mysqli_query($db, $sql) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    return $row['COUNT(id)'];
}

function getCurrentCart() {
    if ($_SESSION['id']){
        $userId=$_SESSION['id'];
    } else {
        $userId=$_COOKIE["PHPSESSID"];
    }
    $sql = "SELECT * FROM cart WHERE `id_session` = '{$userId}'; ";
    $cartGoods = getAssocResult($sql);
    $goods=[];
    foreach ( $cartGoods as $value ) {
        $good=getGood($value['id_goods']);
        $good['id_cart']= $value['id'];
        array_push($goods, $good);
    }

    return $goods;
}

function delGoodFromCart($id)
{
    if ($_SESSION['id']){
        $userId=$_SESSION['id'];
    } else {
        $userId=$_COOKIE["PHPSESSID"];
    }
    $id = (int)$id;
    $sql = "DELETE FROM cart WHERE id = {$id} AND `id_session` = '{$userId}'";
    return executeQuery($sql);
}

function addOrder($phone) {
    if ($_SESSION['id']){
        $userId=$_SESSION['id'];
    } else {
        $userId=$_COOKIE["PHPSESSID"];
    }
    $db = getDb();
    $id = mysqli_real_escape_string($db, strip_tags(stripslashes($phone)));
    $sql = "INSERT INTO orders (id_session, phone) VALUES ('$userId', '$phone');";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
    header("Location: /");
    return true;
}




