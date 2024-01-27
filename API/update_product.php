<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/DB.php';

    include $_SERVER['DOCUMENT_ROOT'] . '/includes/admin_check.php';

    $db = new DB();

    $id = $_POST['id'];

    $title = $_POST['title'];

    $image = $_POST['image'];

    $price = $_POST['price'];

    $sale = $_POST['sale'];

    $weight = $_POST['weight'];

    $description = $_POST['description'];

    $portion = $_POST['portion'];

    $stuffing = $_POST['stuffing'];

    $taste = $_POST['taste'];

    $stock = $_POST['stock'];

    $category = $_POST['category'];

    $weight_value = $_POST['weight_value'];


    $result = $db->update_prod($title, $image, $price, $sale, $weight, $description, $portion, $stuffing, $taste, $stock, $category, $weight_value);

    if ($result === false) {
        http_response_code(422);
        return;
    }