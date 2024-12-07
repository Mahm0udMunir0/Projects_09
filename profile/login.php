<?php
include("config.php");
session_start();

if(isset($_POST["submit"])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['password']));

    $sql_cli = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' ";
    $select = mysqli_query($conn,$sql_cli) or die("Query Failed");

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        
        $_SESSION['user_id'] = $row['id'];  
        header('location:home.php');
        exit;
    }else{
        $message[] = "incorrect email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/toastr.css">
</head>
<body>
    <div class="container form-container-main">
        <form action="" method="post" enctype="multipart/form-data" class="form-container">
            <h3>Login in</h3>
            <?php
                if(isset($message)){
                    foreach($message as $msg){
                        echo  "<div class='message'>$msg</div>";
                    }
                }
            ?>
            <div class="mb-3">
                <input type="email" class="form-control box" name="email" placeholder="enter email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control box" name="password" placeholder="enter password" required>
            </div>
            <input type="submit"  class="btn btn-primary" name="submit" value="login">
            <p>don't have an account?<a href="register.php">register</a></p>
        </form>
    </div>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/feather.min.js"></script>
<script src="./js/toastr.min.js"></script>
</body>
</html>