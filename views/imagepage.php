

<?
executeQuery("UPDATE `pictures` SET `views` = '".($views+1)."' WHERE `id` = '".$id."'")
?>
<h3>Просмотры:<?=$views?></h3>
<img src="/img/gallery_img/big/<?=$path?>"/>

