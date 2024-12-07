<?php
include("config.php");
session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    // تحديث الاسم والبريد الإلكتروني
    mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die("Query Failed");

    // تحديث كلمة المرور
    $old_pass = isset($_POST['old_pass']) ? $_POST['old_pass'] : '';
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = "Old password does not match!";
        } elseif ($confirm_pass != $new_pass) {
            $message[] = "Confirm password does not match new password!";
        } else {
            mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die("Query Failed");
            $message[] = "Password updated successfully!";
        }
    }

    // تحديث الصورة
    $update_image = isset($_FILES['update_image']['name']) ? $_FILES['update_image']['name'] : '';
    $update_image_size = isset($_FILES['update_image']['size']) ? $_FILES['update_image']['size'] : 0;
    $update_image_tmp_name = isset($_FILES['update_image']['tmp_name']) ? $_FILES['update_image']['tmp_name'] : '';
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 20000000) {
            $message[] = 'Image is too large (maximum 20MB).';
        } else {
            $image_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die(mysqli_error($conn));
            if ($image_query) {
                if (move_uploaded_file($update_image_tmp_name, $update_image_folder)) {
                    $message[] = "Image updated successfully!";
                } else {
                    $message[] = "Failed to move the uploaded file!";
                }
            } else {
                $message[] = "Failed to update the image in the database!";
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
    <link rel="stylesheet" href="./css/update.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/toastr.css">
    <title>Update</title>
</head>
<body>
<div class="update-profile container">
    <?php 
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die("Query Failed");
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }

    if ($fetch['image'] == '') {
        echo '<img src="./images/rb_2150049569.png">';
    } else {
        echo '<img src="./uploaded_img/' . $fetch['image'] . '">';
    }

    if (isset($message)) {
        foreach ($message as $msg) {
            echo "<div class='message'>$msg</div>";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="flex">
            <div class="inputBox">
                <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box form-control">
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box form-control">
                <input type="file" name="update_image" class="box form-control" accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                <input type="password" name="update_pass" placeholder="Enter previous password" class="box form-control">
                <input type="password" name="new_pass" placeholder="Enter new password" class="box form-control">
                <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box form-control">
            </div>
        </div>
        <input type="submit" value="Update Profile" name="update_profile" class="btn">
        <a href="home.php" class="delete-btn btn">Go Back</a>
    </form>
</div>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/feather.min.js"></script>
<script src="./js/toastr.min.js"></script>
</body>
</html>