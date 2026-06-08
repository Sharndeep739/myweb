<?php

include 'db.php';

header("Content-Type: application/json");

$query = $conn->prepare("
    SELECT products.*,
           categories.category_name
    FROM products
    INNER JOIN categories
    ON products.category_id = categories.id
    ORDER BY products.id DESC
");

$query->execute();

echo json_encode(
    $query->fetchAll(PDO::FETCH_ASSOC)
);