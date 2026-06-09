<?php

include 'db.php';

header("Content-Type: application/json");

$query = $conn->prepare(
    "SELECT 
    categories.id,
    categories.category_name,
    COUNT(products.id) AS product_count
FROM categories
LEFT JOIN products 
ON categories.id = products.category_id
GROUP BY categories.id, categories.category_name"
);

$query->execute();

$categories = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categories);
?>