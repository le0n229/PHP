<?php
$year = 2019;
$header= 'Информация обо мне';
$title = 'Главная страница - страница обо мне';


$content = file_get_contents('site.tmpl');

$content = str_replace('{{year}}', $year, $content );
$content = str_replace('{{header}}', $header, $content );
$content = str_replace('{{title}}', $title, $content );

echo $content;