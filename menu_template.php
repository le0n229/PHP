<ul>
	<li><a href='#'>Меню1</a></li>
	<li><a href='#'>Меню2</a></li>
	<li><a href='#'>Меню3</a></li>
	<li><a href='3'>Меню4</a></li>
</ul>

<!--6. ВАЖНОЕ2.В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через
PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать,
как можно реализовать меню с вложенными подменю? Попробовать его реализовать, при желании на
движке 3.-->

<?

$menuArray = [
        'Меню1'=>'#', 'Меню2'=>'#', 'Меню3'=>'#', 'Меню4'=>'#',
];

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

echo drawMenu($menuArray);

echo drawMenu($menuArray2);


?>
