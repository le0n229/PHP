<?
$dir    = './img/gallery_img/big/';
$dirSmall    = './img/gallery_img/small/';
$files1 = scandir($dir);
$files1 = array_slice($files1, 2);
$images='';
foreach ($files1 as $value) {
  $images.="<a rel=\"gallery\" class=\"photo\" href=\"$dir$value\"><img src=\"$dirSmall$value\" width=\"150\" height=\"100\" /></a>";
}

include "../engine/resize.php";


if (isset($_POST["load"])) {
    $upload = $dir.$_FILES["photo"][name];
    include "../engine/upload_checks.php";
    if (move_uploaded_file($_FILES["photo"]['tmp_name'], $upload)) {
        create_thumbnail($upload, $dirSmall.$_FILES["photo"][name], 150, 100);
        echo "Файл успешно загружен.\n";
        header("Location: ?page=gallery");
    } else {
        echo "Загрузка не получилась.\n";
    }

}


?>



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script type="text/javascript" src="./js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });	}); </script>

</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?=$images?>
    </div>
</div>

<form enctype="multipart/form-data" method="post">
    <p>Загрузите ваши фотографии на сервер</p>
    <p><input type="file" name="photo" multiple accept="image/*,image/jpeg">
        <input type="submit" name="load" value="Отправить"></p>
</form>

</body>
</html>

