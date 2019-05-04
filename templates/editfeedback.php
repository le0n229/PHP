<form action="/myfeedback/edit/<?=$id?>/?product_id=<?=$productId?>" method="post">
    Отредактируйте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$text?>" ><br>
    <input type="submit" value="Отредактировать">
</form>
