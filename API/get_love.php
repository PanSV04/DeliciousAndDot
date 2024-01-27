<?php
    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();

    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : -1;

    $love = $db->get_love($user_id);

    if($love === false) {
        echo json_encode([]);
        return;
    } 

    echo json_encode($love);
