<?php
   include("javaScript_tos.php");
   include("config.php");
   $ID = isset($_GET['id']) ? intval($_GET['id']) : 0;
   if ($ID > 0) {
       $query_sql = "SELECT * FROM prod WHERE id=$ID";
       $up = mysqli_query($con, $query_sql);
       $data = mysqli_fetch_array($up);
   } else {
       $data = null;
   }
   
   
   
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/val.css">
      <title>Confirm Buying</title>
   </head>
   </head>
   <body>
      <?php
         include("javaScript_tos.php");
         include("config.php");
         $ID = isset($_GET['id']) ? intval($_GET['id']) : 0;
         if ($ID > 0) {
             $query_sql = "SELECT * FROM prod WHERE id=$ID";
             $up = mysqli_query($con, $query_sql);
             $data = mysqli_fetch_array($up);
         } else {
             $data = null;
         }
         
         
         
         
         
         ?>
      <!DOCTYPE html>
      <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css/bootstrap.min.css">
            <link rel="stylesheet" href="./css/main2.css">
            <title>Confirm Buying</title>
         </head>
         </head>
         <body>
            <div class="container">
                  <div class="main">
                  <div class="colop0">
                        <a class="text-primary a-po m-4" href="shop.php" >
                            <i data-feather="arrow-left-circle" ></i>
                            <span >Shop</span>
                          </a>
                          </div>
                    <form action="insert_card.php" method="post">
                    <center>
                        <h2>Confirm purchase</h2>
                        <br><br>
                        <div class="mb-3">
                             <input type="text" class="form-control inp-text"  name="id" autocomplete="off" value='<?php echo $data['id'];?>' hidden>
                        </div>
                        <div class="mb-3">
                             <input type="text" class="form-control inp-text"  name="name" autocomplete="off" value='<?php echo $data['name'];?>' hidden>
                        </div>
                        <div class="mb-3">
                             <input type="text" class="form-control inp-text "  name="price" autocomplete="off" value='<?php echo $data['price'];?>' hidden>
                        </div>
                        
                        <?php
            include("javaScript_tos.php"); 
            include("config.php");
            $result = mysqli_query($con,"SELECT * FROM prod WHERE id=$ID ");
            while($row = mysqli_fetch_array($result)){
                echo "
                    <div class='card-val'>
                        <div class='card ' style='width: 18rem;'>
                            <img src='$row[image]' class='card-img-top' >
                            <div class='card-body'>
                                <h5 class='card-title'>$row[name]</h5>
                                <p class='card-text'>$row[price]</p>
                                
                            </div>
                        </div>
                    </div>
                
                
                ";
            }
        ?>
                        <div class="colpo">
                        <button type="submit" class="btn btn-warning" name="add">Confirm Product</button>
                        </div>   
                        
                    </form>
                    </center>
                  </div>
                  
              
            </div>
            <script src="./js/feather.min.js"></script>
            <script>feather.replace();</script>
         </body>
      </html>
      <script src="./js/feather.min.js"></script>
      <script>feather.replace();</script>
   </body>
</html>