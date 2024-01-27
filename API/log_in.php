<?php
    session_start();

    $login = $_POST['login'];

    $password = $_POST['password'];

    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();

    $result = $db->get_user_login($login);

    if($user === false){
        http_response_code(422);
        return;
    } else{
        http_response_code(200);
    }

    if (password_verify($password, $result['password'])){
        $_SESSION['id'] = $result['id'];
        $_SESSION['perms'] = $result['perms'];
        $_SESSION['login'] = $login;
        $_SESSION['name'] = $result['name'];
        $_SESSION['surname'] = $result['surname'];
        $_SESSION['patronymic'] = $result['patronymic'];
    } else {
        error_log($result['password']);
        error_log($password);
        error_log($login);
        http_response_code(401);
    } 