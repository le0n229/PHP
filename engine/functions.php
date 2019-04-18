<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    switch ($page) {
        case 'index':
            $params["username"] ="Вася";
            break;
        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            $content = getNewsContent($_GET['id']);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;
        case 'gallery':

            $params["pictures"] = getPictures();

            break;
        case 'imagepage':
            $db = getDb();
            $checkedId= mysqli_real_escape_string($db, $_GET['id']);
            $content = getImage($checkedId);
            $params['path'] = $content['path'];
            $params['views'] = $content['views'];
            $params['id'] = $content['id'];
            break;
    }
    return $params;
}

function getNewsContent($id){
    $id = (int)$id;

    $sql = "SELECT * FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];

    return $result;
}


function getNews()
{
    $sql = "SELECT * FROM news";
    $news = getAssocResult($sql);
    // var_dump($news);
    return $news;
}

function getPictures()
{
    $sql = "SELECT * FROM pictures ORDER BY views DESC";
    $pictures = getAssocResult($sql);
    return $pictures;
}

function getImage($id){
    $id = (int)$id;

    $sql = "SELECT * FROM pictures WHERE id = {$id}";
    $pictures = getAssocResult($sql);

    $result = [];
    if(isset($pictures[0]))
        $result = $pictures[0];

    return $result;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{

    return renderTamplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTamplate($page, $params),
        "menu" => renderTamplate("menu")
    ]);
}


//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTamplate($page, $params = [])
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }


    $fileName = TEMLATES_DIR . $page . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы не существует, 404");
    }


    return ob_get_clean();
}
