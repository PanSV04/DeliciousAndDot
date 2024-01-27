<?php
    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();

    $taste = isset($_GET['taste']) ? $_GET['taste'] : null;
    $stuffing = isset($_GET['stuffing']) ? $_GET['stuffing'] : null;
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $stock = isset($_GET['stock']) ? $_GET['stock'] : null;
    $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : null;
    $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : null;
    $sale = isset($_GET['sale']) ? $_GET['sale'] : null;
    $portion = isset($_GET['portion']) ? $_GET['portion'] : null;
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : -1;

    $products = $db->get_products($taste, $stuffing, $category, $stock, $portion, $min_price, $max_price, $sale, $user_id);

    if($products === false) {
        // http_response_code(422);
        echo json_encode([]);
        return;
    } 

    echo json_encode($products);