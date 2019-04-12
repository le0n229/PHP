 <?
    $menuArray2 = [
        'Меню1'=>'#', 'Меню2'=>'#', 'Меню3'=>[
            'SUBМеню1'=>'#', 'SUBМеню2'=>'#', 'SUBМеню3'=>'#', 'SUBМеню4'=>'#',
        ], 'Меню4'=>'#',
    ];
    function drawMenu($someArray) {
        $menu= '<ul>';
        foreach ($someArray as $my_key => $my_value)
        {
            is_array($my_value) ? $menu.=drawMenu($my_value) : $menu.=("<li><a href='$my_value'>$my_key</a></li>");
        }
        $menu.='</ul>';
        return $menu;

    }
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<p>
    <?=drawMenu($menuArray2);?>
    <a href="/">Главная</a>
    <a href="?page=catalog">Каталог</a>
</p>
<?=$content?>
</body>
</html>