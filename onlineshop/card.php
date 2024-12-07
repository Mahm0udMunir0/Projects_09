<!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/main2.css">
      <title>My Cart</title>
   </head>
   <body>
   <div class="d-flex justify-content-between m-3">
        <a class="btn btn-primary" href="shop.php" style="text-decoration: none;" >
            <i data-feather="arrow-left-circle" ></i>
            Shop 
        </a>
        <a class="text-primary" href="card.php" style="text-decoration: none;" >
            <i data-feather="refresh-ccw" ></i>
        </a>
        </div>
     <?php
        include("config.php");
        $query_sql = "SELECT * FROM addcard;";
        $result = mysqli_query($con, $query_sql);
        while($row = mysqli_fetch_assoc($result)){
           echo " <div class='container'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Product Name</th>
                        <th scope='col'>Product Price</th>
                        <th scope='col'>Delte Product</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td><a href='del_card.php? id=$row[id]' class='btn btn-danger'> <i data-feather='trash' class='m-1'></i>Delete</a></td>
                    </tr>
                </tbody>
            </table>
          </div>
    
          <script src='./js/bootstrap.min.js'></script>
          <script src='./js/feather.min.js'></script>
    
          <script>feather.replace();
          </script>
        ";
        }
     
     
     
     
     
     
     
     
     ?>
   </body>
</html>