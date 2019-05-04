<?php


function prepareVariables($page, $action, $id)
{
    $params = [];
    $params['is_ajax'] = false;
    switch ($page) {
        case 'index':
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'newspage':
            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'catalog':

            $params['images'] = getImages();

            break;

        case "image":
            //получаем индекс изображения


            if ($action != 'edit') {
                $id = (int)$id;
                $params = doFeedbackActionImage($action, $id);
            } else {

                $params = doFeedbackActionImage($action, $id);
                $params['edit_id'] = $id;
                $id = (int)$_GET['backid'];

            }


            //добавим лайки изображению с полученным индексом
            add_likes($id);

            //подготовим переменные для шаблона
            $image = getOneImage($id);



            $params['image'] = $image['filename'];
            $params['likes'] = $image['likes'];
            $params['id'] = $image['idx'];

            break;


        case "addlike":
            $id = (int)$_POST['id'];
            add_likes($id);
            $image = getOneImage($id);
            $params['likes'] = $image['likes'];
            $params['is_ajax'] = true;
            break;

        case "feedback":

           $params = doFeedbackAction($action, $id);

            break;

        case 'myfeedback':
            $productId= (int)( $_GET['product_id']);
            doProductFeedbackAction($params, $action, $id, $productId );

            break;
        case 'editfeedback':
            $productId= (int)( $_GET['product_id']);
            $content=doProductFeedbackAction($params, $action, $id, $productId );
            $params['name'] = $content['name'];
            $params['text'] = $content['text'];
            $params['id'] = $id;
            $params['productId'] = $productId;
            break;
        case 'shop':
            if (isset($_GET['buy'])) {
                $id = (int)( $_GET['id']);
                addToCart($id);
            }
            $params["goods"] = getGoods();

            break;
        case 'productpage':
            $db = getDb();
            $checkedId= (int)mysqli_real_escape_string($db, $_GET['id']);
            $content = getGood($checkedId);
            $params['name'] = $content['name'];
            $params['price'] = $content['price'];
            $params['description'] = $content['description'];
            $params['feedback'] = getAllProductFeedback($checkedId);
            $params['id']=$checkedId;
            break;
        case 'cart':
            if (isset($_GET['delete'])) {
                $id = (int)($_GET['id']);
                delGoodFromCart($id);
            }
            $params["goods"] = getCurrentCart();

            break;
        case 'order':
            if (isset($_GET['order'])) {
                $phone = (int)($_GET['phone']);
                addOrder($phone);
            }
            break;
    }
    return $params;
}





