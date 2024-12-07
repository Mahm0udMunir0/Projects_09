<?php 

include("config.php");
session_start();

// يجب التأكد من وجود  $_SESSION['user_id'] قبل استخدامها
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit(); // تأكد من إيقاف تنفيذ البرنامج بعد إعادة التوجيه
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/toastr.css">
    <title>home</title>
</head>
<body>

<div class="container">
    <div class="profile">
        <?php 
            $select = mysqli_query($conn,"SELECT * FROM `user_form` WHERE id = '$user_id'") or die("Query Failed");
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
                //  التحقق من وجود  $fetch['name'] قبل استخدامه
                if (isset($fetch['name'])) {
                    echo "<h3>" . $fetch['name'] . "</h3>"; 
                } else {
                    echo "<h3> اسم المستخدم غير موجود </h3>";
                }
            } else {
                echo "<h3> لم يتم العثور على المستخدم </h3>";
            }
        ?>
    </div>
</div>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/feather.min.js"></script>
<script src="./js/toastr.min.js"></script>
</body>
</html>