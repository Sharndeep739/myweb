<?php
include 'db.php';
session_start();

header("Content-Type: application/json");

try{
      if(!isset($_POST["category_id"], $_POST["name"], $_POST["price"], $_POST["stock"]) ||!isset($_FILES["image"])
        ) {
        throw new Exception("Missing required fields");
    }

    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $price = $_POST["price"]; 
    $stock = $_POST["stock"];

    $image = $_FILES["image"];

    // type validation
    $alowedType= ["image/jpeg","image/png","image/webp","image/jpg"];
    if(!in_array($image['type'],$alowedType)){
        echo json_encode([
            "status"=>false,
            "message"=>"plese select the image file"
        ]);
        exit;
    }

    //upload in folder
    $tmp_name= $image['tmp_name'];
    move_uploaded_file($tmp_name,"../uploads/" . $image['name']);

    $add= $conn->prepare(
        "insert into products(
        category_id,name,price,stock,image)
        values
        (:category_id,:name,:price,:stock,:image)"
    );

    $add->execute([
        ":category_id"=>$category_id,
        ":name"=>$name,
        ":price"=>$price,
        ":stock"=>$stock,
        ":image"=>$image['name']
    ]);


    echo json_encode([
        "status"=>true,
        "message"=>"product add sucessfully"
    ]);

}catch(Exception $e){
        echo json_encode([
        "status"=>false,
        "message"=>"product add fail". $e
        ]);
}
?>