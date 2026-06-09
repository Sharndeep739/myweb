<?php
session_start();
include 'db.php';

header("Content-Type: application/json");


try{

    $data = json_decode(file_get_contents("php://input"),true);


    $email = trim($data["email"]);
    $password = $data["password"];

    $query = $conn->prepare(
        "SELECT * FROM admins
         WHERE email = :email"
    );

    $query->execute([
        ":email"=>$email
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    if(!$user){

        echo json_encode([
            "status"=>false,
            "message"=>"Email not found"
        ]);

        exit;
    }

    if(password_verify($password,$user["password"])){

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["name"] = $user["name"];

        echo json_encode([
            "status"=>true,
            "message"=>"Login Successful"
        ]);

    }else{

        echo json_encode([
            "status"=>false,
            "message"=>"Wrong Password"
        ]);

    }

}catch(PDOException $e){

    echo json_encode([
        "status"=>false,
        "message"=>$e->getMessage()
    ]);

}
?>