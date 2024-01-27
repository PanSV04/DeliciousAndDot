<?php
    session_start();

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

    include $_SERVER['DOCUMENT_ROOT'].'/includes/DB.php';

    $db = new DB();

    if(!preg_match('/^8[0-9]{10}$/', $login)){
    
        http_response_code(422);
        return;
    }

    if(!preg_match('/^[a-z0-9A-Z]{3,50}$/', $password)){
      
        http_response_code(422);
        return;
    }

    if(!preg_match('/^[А-Яа-яёЁ]{2,50}$/u', $name)){
      
        http_response_code(422);
        return;
    }

    if(!preg_match('/^[А-Яа-яёЁ]{2,50}$/u', $surname)){

        http_response_code(422);
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = $db->add_users($name, $surname, $patronymic, $date_birth, $login, $password, $city, $street, $num_home, $num_app);

    if($result === false){
        // echo $db->get_conn();
        var_dump($db);
        var_dump($date_birth);
        http_response_code(422);
        return;
    } else{
        http_response_code(200);
    }

    $result = $db->get_user_login($login);

    $_SESSION['id'] = $result['id'];
    $_SESSION['perms'] = $result['perms'];
    $_SESSION['login'] = $login;
    $_SESSION['name'] = $result['name'];
    $_SESSION['surname'] = $result['surname'];
    $_SESSION['patronymic'] = $result['patronymic'];