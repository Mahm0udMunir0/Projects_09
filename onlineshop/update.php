<?php
    include("config.php");
    include("javaScript_tos.php");
    // Check if 'id' is passed in the URL
    if (isset($_GET["id"])) {
        $ID = $_GET["id"];
    } else {
        echo "Product ID not provided.";
        exit;
    }

    // Fetch product data from database
    $db_f = "SELECT * FROM prod WHERE id = $ID";
    $up = mysqli_query($con, $db_f);
    if ($up) {
        $data = mysqli_fetch_array($up);
    } else {
        echo "Error fetching data: " . mysqli_error($con);
        exit;
    }

    // Process the form submission
    if (isset($_POST["update"])) {
        $ID = $_POST["id"];
        $NAME = $_POST["name"];
        $PRICE = $_POST["price"];

        // Handle image upload logic
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $image_location = $_FILES["image"]["tmp_name"];
            $image_name = $_FILES["image"]["name"];
            $image_up = "images/" . $image_name;
            move_uploaded_file($image_location, 'images/' . $image_name);
        } else {
            // If no new image, use the existing one
            $image_up = $data['image'];
        }

        // Update the product in the database
        $update = "UPDATE prod SET name='$NAME', price='$PRICE', image='$image_up' WHERE id=$ID";
        if (mysqli_query($con, $update)) {
            echo "<script>
                    addSucces();
                    toastr['success']('Product updated successfully', 'Update Product');
                  </script>";
        } else {
            echo "<script>
                    addSucces();
                    toastr['warning']('Failed to update product', 'Update Product');
                  </script>";
        }

        // Redirect after updating
        header("Refresh:1; url=products.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/main3.css">
    <title>Update Products</title>
</head>
<body>
    <div class="d-flex justify-content-between m-3">
        <a class="text-danger" href="products.php">
            <i data-feather="arrow-left-circle" class="m-4"></i>
        </a>
    </div>
    <center>
        <div class="main container m-3 p-4">
            <h2>Update Products</h2>
            <form action="update.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data" class="form-main">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="mb-3">
                    <input type="text" class="form-control inp-text" placeholder="Enter Product Name" name="name" value="<?php echo $data['name']; ?>" autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control inp-text" placeholder="Enter Product Price" name="price" value="<?php echo $data['price']; ?>" autocomplete="off">
                </div>
                <div class="mb-3">
                    <input class="form-control inp-text file-upload" type="file" id="file" name="image">
                    <label for="file" class="btn btn-primary">Update image</label>
                </div>
                <div class="d-flex justify-content-evenly">
                    <button type="submit" class="btn btn-primary" name="update">Edit Product</button>
                    <div class="btn-style"><a class="btn btn-primary btn" href="products.php" target="_blank">Show All Products</a></div>
                </div>
            </form>
        </div>
        <p class="container devlo">Developed By Mahmoud Mounir ❤️</p>
    </center>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/feather.min.js"></script>
    <script>feather.replace();</script>
</body>
</html>
