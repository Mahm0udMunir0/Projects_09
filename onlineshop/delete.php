<?php

function delete_item(){
    include("javaScript_tos.php");
    include("config.php");

    $ID = $_GET['id'];
    $sql_true = mysqli_query($con, "DELETE FROM prod WHERE id=$ID");

    if ($sql_true) {
        
        ?>
        <script>
            toastr.success('Product deleted successfully', 'Success');
            
            setTimeout(function() {
                window.location.href = 'products.php'; 
            }, 1000);
        </script>
        <?php
    } else {
        echo "Error deleting record: " . mysqli_error($con);
        ?>
        <script>
            toastr.success('Product Not deleted ', 'warning');
            
            setTimeout(function() {
                window.location.href = 'products.php'; 
            }, 1000);
        </script>
        <?php
    }
}

delete_item();
?>
