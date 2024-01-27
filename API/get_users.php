<?php

    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();
    $users = $db->get_users();

    if($users === false) {
        http_response_code(422);
        return;
    } 

    echo json_encode($users);
