<?php 
include("config.php");
include("javaScript_tos.php");

if(isset($_POST["add"])){
    $NAME = $_POST["name"];
    $PRICE = $_POST["price"];
    $insert = "INSERT INTO addcard (name, price) VALUES ('$NAME', '$PRICE')";

    if(mysqli_query($con, $insert)){
        $status = "success";
        $message = "Product added successfully";
    } else {
        $status = "warning";
        $message = "Failed to upload image";
    }
} else {
    $status = "warning";
    $message = "Failed to insert product";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/toastr.css">
</head>
<body>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/toastr.min.js"></script>

<script>
    
    <?php if(isset($status)): ?>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

       
        toastr["<?php echo $status; ?>"]("<?php echo $message; ?>", "Add Product");
        
        
        setTimeout(function(){
            window.location.href = "card.php";
        }, 1000); 
    <?php endif; ?>
</script>

</body>
</html>
