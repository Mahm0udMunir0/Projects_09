<?php 

include("config.php");
session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit();
}

$user_id = $_SESSION['user_id'];


if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/toastr.css">
    <title>home</title>
</head>
<body>

<div class="container con-home">
    <div class="profile">
        <?php 
            $select = mysqli_query($conn,"SELECT * FROM `user_form` WHERE id = '$user_id'") or die("Query Failed");
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
    
            }
            if ($fetch['image'] == ''){
                echo '<img src="./images/rb_2150049569.png" >';
            }else{
                echo '<img src="./uploaded_img/'.$fetch['image'].'">';
            }
        ?>
        <h3><?php echo $fetch['name'];?></h3>
            <a href="update_profile.php" class="btn update-btn">update profile</a>
            <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn btn">logout</a>
            <p>new<a href="login.php" > login</a> or <a href="register.php">register</a> </p>
    </div>
</div>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/feather.min.js"></script>
<script src="./js/toastr.min.js"></script>
</body>
</html>