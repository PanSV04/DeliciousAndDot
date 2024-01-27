<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();

    $name = $_POST['name'];

    $surname = $_POST['surname'];

    $patronymic = $_POST['patronymic'];

    $date_birth = $_POST['date_birth'];

    $login= $_POST['login'];

    $password = $_POST['password'];

    $city = $_POST['city'];
    
    $street = $_POST['street'];
    
    $num_home = $_POST['num_home'];
    
    $num_app = $_POST['num_app']; 

    $result = $db->add_users($name, $surname,  $patronymic, $date_birth, $login, $password, $city, $street, $num_home, $num_app);

    if($result === false){
        http_response_code(422);
        return;
    }