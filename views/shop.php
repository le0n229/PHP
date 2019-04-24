<?
//$dir    = './img/gallery_img/big/';
//$dirSmall    = './img/gallery_img/small/';
//$files1 = scandir($dir);
//$files1 = array_slice($files1, 2);
//$images='';

//include "../engine/resize.php";


//if (isset($_POST["load"])) {
//    $upload = $dir.$_FILES["photo"][name];
//    include "../engine/upload_checks.php";
//    if (move_uploaded_file($_FILES["photo"]['tmp_name'], $upload)) {
//        create_thumbnail($upload, $dirSmall.$_FILES["photo"][name], 150, 100);
//        echo "Файл успешно загружен.\n";
//        header("Location: ?page=gallery");
//    } else {
//        echo "Загрузка не получилась.\n";
//    }
//
//}


?>



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>

</head>

<body>
<div id="main">
    <div class="post_title"><h2>Каталог товаров</h2></div>
    <div class="item">
        <? foreach ($goods as $value): ?>
        <div>
            <a rel="gallery" class="photo" href="/productpage/?id=<?=$value['id']?>"><img src="/img/gallery_img/small/<?=$value['picture']?>" width="150" height="100" /></a>
                    <div><a href="/productpage/?id=<?=$value['id']?>">Подробнее</a></div>
        </div>
        <?endforeach;?>
    </div>
</div>



</body>
</html>

