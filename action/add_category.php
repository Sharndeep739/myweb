<?php
include 'db.php';
header("Content-Type: application/json");

$data= json_decode(file_get_contents("php://input"),true);

    $category= $data['category_name'];

    //check
    $check= $conn->prepare(
        "select * from categories
        where category_name =:category_name"
    );

    $check->execute([
        ":category_name"=>$category
    ]);


    if($check->fetch()){
        echo json_encode([
            "message"=>"category already exist"
        ]);
        exit;
    }

    $query = $conn->prepare(
        "insert into categories(category_name)
        values(:category_name)"
    );

    $query->execute([
        ":category_name" => $category
    ]);

    echo json_encode([
        "message" => "Category Added Successfully"
    ]);

?>

