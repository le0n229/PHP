<?php

function renderTemplate($page, $content = '') {
    function bodyRenderTemplate($page, $content = '') {
        ob_start();
        include ($page . '.php');
        return ob_get_clean();
    }
    ob_start();
    $body = bodyRenderTemplate($page, $content );

    include ('layout.php');
    return ob_get_clean();
}
//echo renderTemplate('menu');
echo renderTemplate('main', 'Hello world');
//var_dump( renderTemplate('main', 'Hello world'));

