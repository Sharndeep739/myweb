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
    <title>Products</title>
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body>
    <div class="sidebar">
        <ul>
            <a href="dashboard.php"><i class="fa-solid fa-chart-column"></i><li>Dashboard</li></a>
            <a href="products.php"><i class="fa-solid fa-barcode"></i><li>Products</li></a>
            <a href="addProduct.php"><i class="fa-solid fa-plus"></i><li>Add</li></a>
            <a href="category.php"><i class="fa-solid fa-layer-group"></i><li>Categories</li></a>
            <a href="#"><i class="fa-solid fa-user"></i><li>Users</li></a>
            <a href="#"><i class="fa-solid fa-eraser"></i><li>Remove</li></a>
            <a href="action/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><li>Logout</li></a>
        </ul>
    </div>

    <div class="main">

        <div class="topbar">
            <h2>Products</h2>
            <a href="addProduct.php"><h3><i class="fa-solid fa-plus"></i> Add</h3></a>
        </div>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            </thead>

            <tbody id="productTable">

            </tbody>
</table>
        
    </div>
    <script src="js/products.js"></script>
</body>
</html>