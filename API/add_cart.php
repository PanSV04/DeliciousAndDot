<?php 
session_start();

include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

$db = new DB();

$user = $_SESSION['id'];

$product = $_POST['product'];

$quantity = $_POST['quantity'];

if(!isset($_SESSION['id'])) {
    http_response_code(401);
    return;
}

$result = $db->add_cart($user, $product, $quantity);

if($result === false){
    if($db->is_cart_exists($user, $product)){
        http_response_code(409);
    } else {
        http_response_code(422);
    }
    return;
}