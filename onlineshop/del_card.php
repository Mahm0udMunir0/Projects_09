<?php 
include("javaScript_tos.php");
include("config.php");
$ID = $_GET['id'];
$sql_so = "DELETE FROM addcard WHERE id=$ID";
// $query_sql = mysqli_query($con,query: $sql_so);
// header("location: card.php");



if (mysqli_query($con, $sql_so)) {
    echo "<script>
                    addSucces();
                    toastr['success']('Product deleted successfully', 'Update Product');
                  </script>";
        } else {
            echo "<script>
                    addSucces();
                    toastr['warning']('Failed to delete  product', 'Update Product');
                  </script>";
        }

        // Redirect after updating
        header("Refresh:0; url=card.php");
        exit;
    
?>
