<?php
include("config.php");
if(isset($_POST["submit"])){
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $pass = (md5($_POST['password']));
    $cpass = (md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name =  $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
    $sql_cli = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' ";
    $select = mysqli_query($conn,$sql_cli) or die("Query Failed");
    if(mysqli_num_rows($select) > 0){
        $message[] = "user already exist";
    }else{
        if($pass != $cpass){
            $message[] = "Confirm Password not matched!";

        }elseif($image_size > 20000000){
            $message[] = "image size is too large!";

        }else{
            $sql_ins = "INSERT INTO user_form(name, email, password, image) VALUES('$name','$email','$pass','$image')";
            $insert = mysqli_query($conn,$sql_ins) or die("Qurey Failed");
            if($insert){
                move_uploaded_file($image_tmp_name,$image_folder);
                $message[] = "registered successfully";
                header('location:login.php');
            }else{
                $message[] = "registeration failed";

            }
        }
    }
}














?>
















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/toastr.css">


</head>
<body>
        <div class="container form-container-main">
            <form action="" method="post" enctype="multipart/form-data" class="form-container">
                <h3>register now</h3>
                 <?php
                    if(isset($message)){
                        foreach($message as $msg){
                          echo   "<div class='message'>$msg</div>";
                    }}
                 
                 ?>
            <div class="mb-3">
                    <input type="text" class="form-control box" name="name" placeholder="enter username" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control box" name="email" placeholder="enter email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control box" name="password" placeholder="enter password" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control box" name="cpassword" placeholder="confirm password" required>
                </div>
                <div class="mb-3">
                     <input class="form-control box" type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                </div>
                <input type="submit"  class="btn btn-primary" name="submit" value="register">
                 <p>already have an account?<a href="login.php">login</a></p>

            </form>
        </div>











<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/feather.min.js"></script>
<script src="./js/toastr.min.js"></script>

</body>
</html>