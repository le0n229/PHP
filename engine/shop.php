<?
function getGood($id)
{
    $id = (int)$id;

    $sql = "SELECT * FROM goods WHERE id = {$id}";
    $good = getAssocResult($sql);

    $result = [];
    if (isset($good[0]))
        $result = $good[0];

    return $result;
}

function getGoods()
{
    $sql = "SELECT * FROM goods";
    $goods = getAssocResult($sql);
    return $goods;
}

function readProductFeedback($id)
{
    $id = (int)$id;

    $sql = "SELECT * FROM `product_feedback` WHERE id = {$id}";
    $feedback = getAssocResult($sql);

    $result = [];
    if (isset($feedback[0]))
        $result = $feedback[0];

    return $result;
}

function getAllProductFeedback($product_id)
{
    $sql = "SELECT * FROM `product_feedback` WHERE `product_id`=$product_id ORDER BY id DESC";
    return getAssocResult($sql);
}

function addProductFeedBack($product_id)
{
    $db = getDb();
    $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
//    $product_id = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['product_id'])));
    $sql = "INSERT INTO `product_feedback`(`name`, `text`, `product_id`) VALUES ('{$name}','{$message}','{$product_id}')";
    return executeQuery($sql);
}

function deleteProductFeedback($id)
{
    $sql = "DELETE FROM `product_feedback` WHERE id={$id}";
    return executeQuery($sql);
}

function editProductFeedback($id)
{
    $db = getDb();
    $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
    $sql = "UPDATE `product_feedback` SET `name`='$name',`text`=$message WHERE `id`= $id";
    return executeQuery($sql);
}


function doProductFeedbackAction(&$params, $action, $id, $productId)
{
    if ($_GET['status'] == 1) {
        $params['error'] = "Отзыв добавлен!";
    }
    if ($_GET['status'] == 2) {
        $params['error'] = "Отзыв удален!";
    }

    if ($action == "add") {
        $error = addProductFeedBack($id);
        header("Location: /productpage/?id=$id/?status=1");

    }

    if ($action == "delete") {
        $error = deleteProductFeedback($id);

        header("Location: /productpage/?id=$productId/?status=1");

    }
    if ($action == "read") {
        return readProductFeedback($id);

    }
    if ($action == "edit") {
        $error = editProductFeedback($id);

        header("Location: /productpage/?id=$productId/?status=1");

    }
}

?>
