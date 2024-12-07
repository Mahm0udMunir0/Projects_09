<?php 
include("javaScript_tos.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Add Products (Admin)</title>
</head>
<body>
    <center>
        <div class="main container m-3 p-4">
            <div class="logo">
                <img src="./img/logo2.png" style="width: 300px; height: 300px;">
            </div>
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control inp-text" placeholder="Enter Product Name" name="name" autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control inp-text" placeholder="Enter Product Price" name="price" autocomplete="off">
                </div>
                <div class="mb-3">
                    <input class="form-control inp-text file-upload" type="file" id="file" name="image">
                    <label for="file" class="btn btn-primary">Choose image</label>
                </div>
                <div class="d-flex justify-content-evenly">
                    <button type="submit" class="btn btn-primary" name="upload">Upload Product</button>
                    <div class="btn-style"><a class="btn btn-primary btn" href="products.php" target="_blank">Show All Products</a></div>
                </div>
            </form>
        </div>
        <p class="container devlo">Developed By Mahmoud Mounir ❤️</p>
    </center>

    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
