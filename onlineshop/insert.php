<?php
include("config.php");
include("javaScript_tos.php");
if(isset($_POST["upload"])) {
    $NAME = $_POST["name"];
    $PRICE = $_POST["price"];
    $IMAGE = $_FILES["image"];
    
    $image_location = $_FILES["image"]["tmp_name"];
    $image_name = $_FILES["image"]["name"];
    $image_up = "images/" . $image_name; 
    
    $insert = "INSERT INTO prod (name, price, image) VALUES ('$NAME', '$PRICE', '$image_up')";
    
    if(mysqli_query($con, $insert)) {
        if(move_uploaded_file($image_location, 'images/' . $image_name)) {
            echo "<script>
                         addSucces();
                         toastr['success']('Prouduct added successfully', 'Add Product')
                </script>";
        } else {
            echo "<script>
                         addSucces();
                         toastr['warning']('Failed to upload image', 'Add Product')
            </script>";
        }
    } else {
        echo "<script>
                        addSucces();
                         toastr['warning']('Failed to insert product', 'Add Product')
            </script>";
    }

    header("Refresh:1; url=index.php");
}
?>
