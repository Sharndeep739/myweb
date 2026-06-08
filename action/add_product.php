<?php

header("Content-Type: application/json");

$category_id = $_POST["category_id"];
$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];

$image = $_FILES["image"];

echo json_encode([
    "category_id"=>$category_id,
    "name"=>$name,
    "price"=>$price,
    "stock"=>$stock,
    "image_name"=>$image["name"]
]);
?>