<div><?=$name?></div>
<div><?=$price?></div>
<div><?=$description?></div>


<h2>Отзывы</h2>

<?=$error?>
<form action="/myfeedback/add/<?=$id?>" method="post">
    Оставьте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя"><br>
    <input type="text" name="message" placeholder="Ваш отзыв"><br>
<!--    <input hidden type="text" name="product_id" value="--><?//=$id?><!--" ><br>-->
    <input type="submit">
</form>




<?foreach ($feedback as $item): ?>
    <p>
        <b><?=$item['name']?>:</b> <?=$item['text']?> <a href="/editfeedback/read/<?=$item['id']?>/?product_id=<?=$id?>">[править]</a>  <a href="/myfeedback/delete/<?=$item['id']?>/?product_id=<?=$id?>">[x]</a><br>
    </p>
<?endforeach;?>