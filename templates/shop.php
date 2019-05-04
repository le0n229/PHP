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
            <form>
                <input type="text" name="id" value="<?=$value['id']?>" hidden>
            <button type="submit" name='buy' data-id="<?=$value['id']?>" class="buy">Купить</button>
            </form>
        </div>
        <?endforeach;?>
    </div>
</div>

<!--<script>-->
<!--    const buttons = document.getElementsByClassName('action');-->
<!--    for (let i = 0; i < buttons.length; i+=1) {-->
<!--        buttons[i].addEventListener('click', async (e) => {-->
<!--            e.preventDefault();-->
<!--            let id = e.target.dataset.id;-->
<!--            -->
<!--            let response = await fetch('math.php', {-->
<!--                method: 'POST',-->
<!--                headers:-->
<!--                    {-->
<!--                        'Accept':-->
<!--                            'application/json',-->
<!--                        'Content-Type':-->
<!--                            'application/json'-->
<!--                    }-->
<!--                ,-->
<!--                body: JSON.stringify({-->
<!--                    'id': id-->
<!--                })-->
<!--            });-->
<!--            let text = await response.text();-->
<!--            let obj=JSON.parse(text);-->
<!--            currentResult[0].value=obj.result;-->
<!--        })-->
<!--    }-->
<!--</script>-->

</body>
</html>

