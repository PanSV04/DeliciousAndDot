<?php 
session_start();

include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

$db = new DB();

$user = $_SESSION['id'];

error_log($user."fnfnfn");

if(!isset($_SESSION['id'])) {
    http_response_code(401);
    return;
}

$result = $db->get_cart($user);

if($result === false){
    http_response_code(422);
    return;
}

echo json_encode($result);