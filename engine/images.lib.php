<?php

//функция возвращает имя файла по его idx
function getOneImage($id)
{
    $sql = "SELECT * FROM `images` WHERE idx={$id}";
    $row = getAssocResult($sql);
    return $row[0];
}

//увеличим число лайков на 1 одним запросом к базе
function add_likes($id)
{
    $sql = "UPDATE `images` SET `likes` = `likes` + 1 WHERE idx={$id}";
    executeQuery($sql);
}

function getImages()
{
    $sql = "SELECT * FROM `images` ORDER BY likes DESC";
    $images = getAssocResult($sql);
    return $images;
}

function addImage()
{
    include "../engine/resize.php";
    if (isset($_POST["load"])) {
        $dir = './img/big/';
        $dirSmall = './img/small/';
        $upload = $dir . $_FILES["photo"][name];
        include "../engine/upload_checks.php";
        if (move_uploaded_file($_FILES["photo"]['tmp_name'], $upload)) {
            create_thumbnail($upload, $dirSmall . $_FILES["photo"][name], 150, 100);
//                echo "Файл успешно загружен.\n";
//            header("Location: ?page=catalog");
        } else {
//                echo "Загрузка не получилась.\n";
        }
        $filename = $_FILES["photo"][name];
        $title = $_POST['title'];
        $price = (int)$_POST['price'];
        $db = getDb();
        $sql = "INSERT INTO `images`(`filename`, `name`, `price`) VALUES ('$filename','$title','$price')";
        @mysqli_query($db, $sql) or die(mysqli_error($db));
    }

    return true;
}

function changeImage($id)
{
        if (isset($_POST["changePrice"])) {
        $price = (int)$_POST['newPrice'];
        $sql = "UPDATE `images` SET `price` = {$price} WHERE idx={$id}";
        executeQuery($sql);
    }


}

function deleteImage($id)
{
    if (isset($_POST["deleteImage"])) {
        $sql = "DELETE FROM `images` WHERE idx={$id}";
        executeQuery($sql);
    }


}