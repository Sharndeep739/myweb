<?php
include 'db.php';

header("Content-Type: application/json");


try{
    $data = json_decode(file_get_contents("php://input"),true);

    $name = trim($data["name"]);
    $email = trim($data["email"]);
    $password = password_hash($data["password"],PASSWORD_DEFAULT);

    //cheker
    $check= $conn->prepare(
        "select id from users
        where email= :email"
    );

    $check->execute([
        ":email"=>$email
    ]);
    if($check->fetch(PDO::FETCH_ASSOC)){
        echo json_encode([
        "status"=>false,
        "message"=>"Email already register"
        ]);
        exit;
    }

    $query = $conn->prepare(
        "insert into users
        (name,email,password)
        values
        (:name,:email,:password)"
    );

    $query->execute([
        ":name"=>$name,
        ":email"=>$email,
        ":password"=>$password
    ]);

    echo json_encode([
        "status"=>true,
        "message"=>"Register Successfully"
    ]);
}catch(Exception $e){
    echo json_encode([
        "status"=>false,
        "message"=>"Register Unsuccessfully"
    ]);
}

