<?php
    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();

    $user = $_SESSION['id'];

    $product = $_POST['product'];

    $result = $db->del_love($user, $product);

    if($result === false){
        http_response_code(422);
        return;
    }