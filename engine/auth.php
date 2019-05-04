<?php

function regUser($login, $passHash) {
    $db = getDb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $sql = "SELECT * FROM `users` WHERE `login`='{$login}'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $user = $row['login'];
    if (empty($user)) {
        $sql = "INSERT INTO `users`(`login`, `pass`, `hash`) VALUES ('$login','$passHash','$passHash')";
        @mysqli_query($db, $sql) or die(mysqli_error($db));
        $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}
//function get_db()
//{
//    static $db = '';
//    if (empty($db)) {
//        $db = mysqli_connect('localhost', 'root', '', 'mygallery');
//    }
//    return $db;
//}

function auth($login, $pass)
{
//    $db = get_db();
    $db = getDb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    /*
        $options = [
            'cost' => 11,
            'salt' => SALT
        ];
    */
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
//        $db = get_db();
        $db = getDb();
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return is_auth() ? $_SESSION['login'] : false;
}
