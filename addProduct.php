<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="css/addProduct.css">
</head>
<body>
    <div class="card">
 
    <h2>Add Product</h2>

    <form id="productForm">

        <select id="category_id">
            
        </select>

        <input type="text" id="name"placeholder="Product Name">
        <input type="number" id="price" placeholder="Price">
        <input type="number" id="stock" placeholder="Stock">
        <input type="file" id="image" >

        

        <button type="submit">Add Product</button>

    </form>

</div>
<script src="js/addProduct.js"></script>
</body>
</html>