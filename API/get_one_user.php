<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/DB.php';

    $db = new DB();

    $login = $_GET['login'];

    error_log($login);

    $result = $db->get_user_login($login);

    if ($result === false) {
        http_response_code(422);
        return;
    }else{
        echo json_encode($result);
    }