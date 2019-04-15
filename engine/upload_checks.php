<?php

//Проверка существует ли файл
if (file_exists($upload)) { echo "Файл $upload существует, выберите другое имя файла!"; exit;}

//Проверка на размер файла
if($_FILES["photo"]["size"] > 1024*1*1024)
{
    echo ("Размер файла не больше 5 мб");
    exit;
}
//Проверка расширения файла
$blacklist = array(".php", ".phtml", ".php3", ".php4");
foreach ($blacklist as $item) {
    if(preg_match("/$item\$/i", $_FILES['photo']['name'])) {
        echo "Загрузка php-файлов запрещена!";
        exit;
    }
}
//Проверка на тип файла
$imageinfo = getimagesize($_FILES['photo']['tmp_name']);
if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
    echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
    exit;
}

if($_FILES['photo']['type'] != "image/jpeg") {
    echo "Можно загружать только jpg-файлы.";
    exit;
}

?>
