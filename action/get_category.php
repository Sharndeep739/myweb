<?php

include 'db.php';

header("Content-Type: application/json");

$query = $conn->prepare(
    "SELECT * FROM categories"
);

$query->execute();

$categories = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categories);
?>