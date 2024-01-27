<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/DB.php';

    $db = new DB();

    $id = $_GET['id'];

    error_log($id);

    $result = $db->get_one_prod($id);

    if ($result === false) {
        http_response_code(422);
        return;
    }else{
        echo json_encode($result);
    }