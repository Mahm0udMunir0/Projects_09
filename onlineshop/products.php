<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/main2.css">
      <title>Products</title>
   </head>
   <body>
   <div class="d-flex justify-content-between m-3">
        <a class="text-primary" href="index.php" >
            <i data-feather="arrow-left-circle" class="m-4"></i>
        </a>
        <a class="text-primary" href="products.php" >
            <i data-feather="refresh-ccw" class="m-4"></i>
        </a>
        </div>
        
         <center>
            <h2 class="m-4 container "> Admin Page </h2>
         </center>
         
      <div class="container ">
        
        <?php
            include("javaScript_tos.php"); 
            include("config.php");
            $result = mysqli_query($con,"SELECT * FROM prod");
            while($row = mysqli_fetch_array($result)){
                echo "
                    <div>
                        <div class='card ' style='width: 18rem;'>
                            <img src='$row[image]' class='card-img-top' >
                            <div class='card-body'>
                                <h5 class='card-title'>$row[name]</h5>
                                <p class='card-text'>$row[price]</p>
                                <a href='delete.php? id=$row[id]' class='btn btn-danger'>Delete Product</a>
                                <a href='update.php? id=$row[id]' class='btn btn-primary'>Edit Product</a>
                            </div>
                        </div>
                    </div>
                
                
                ";
            }

        

        ?>











 
   </body>
</html>