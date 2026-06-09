<?php
header("Content-Type:application/json");

include 'db.php';

$delete= json_decode(file_get_contents("php://input"),true);

$query= $conn->prepare(
    "delete from categories where id= :category_id"
);
$query->execute([
    ":category_id"=>$delete["category_id"]
]);

echo json_encode([
    "message"=>"delete file"
]);
?>