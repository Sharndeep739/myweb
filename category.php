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
    <title>Category</title>
    <link rel="stylesheet" href="css/category.css">
</head>
<body>

<div class="container">

    <div class="card">
        <h2>Add Category</h2>

        <form id="categoryForm">

            <input type="text" id="category_name" placeholder="Category Name">
            <button id="add-btn" type="submit">Add Category</button>

        </form>
    </div>

    <div class="card">

        <h2>Category List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Total products</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="categoryTable">
                
                
            </tbody>
        </table>

    </div>

</div>
<script src="js/category.js"></script>
</body>
</html>