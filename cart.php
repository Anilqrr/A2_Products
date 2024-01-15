<?php
  
  session_start();

  //$_SESSION['username'];

  require_once('db and style_css/_dbconnect.php');

  require_once('component.php');

   require('get_data.php');

   if(isset($_POST['remove']))
   {
       if($_GET['action'] == 'remove')
       {
           foreach($_SESSION['cart'] as $key=>$value)
           {
              if($value["product_id"] == $_GET['id'])
              {
                  unset($_SESSION['cart'][$key]);
                  echo "<script>confirm('Are Your Sur remove this product')</script>";
                  echo "<script>header('location:cart.php')</script>";
              }
           }
       }
   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--css-->
    <link rel="stylesheet" href="./css/style.css" />

    <!--responesive-->
    <link rel="stylesheet" media="screen and (max-width:1170px)" href="/project/css/phone.css">

    <!--bootstrap css-->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
  
    <!--font awesome-->
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">

</head>
<body class="bg-light">
 <nav class="navbar navbar-expand-lg navbar-drak bg-dark">
        <div id="logo">
            <img src="./img/logo.jpg" alt="Admin-site">
        </div>
        <ul>
            <li class="item"><a href="index.php">Home</a></li>
            <li class="item"><a href="#">Tables</a></li>
        </ul>
        <input type="text" name="tableSearch" id="tableSearch" placeholder="Search Table Data" style ="margin-left:8px;"> 
        <button id="tableButton">Search</button>
        <button class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navabar-toggle-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="mr-auto"></div>
         <div class="navbar-nav">
           <a href="cart.php" class="nav-item nav-link active">
            <h5 class="px-5 cart">
              <i class="fas fa-shopping-cart"></i>Cart
        
        <?php
               if(isset($_SESSION['cart']))
               {
                 $count = count($_SESSION['cart']);
                 echo"<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
               }
               else
               {
                echo"<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";

               }
            ?>
          </h5>
            </a>
         </div>

      </div>
    </nav>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php 
                      $total = 0;
                      if(isset($_SESSION['cart']))
                      {
                           $p_id = array_column($_SESSION['cart'], "product_id");
                           print_r($_SESSION['cart']);
                           $result = getData();
                          while($row = mysqli_fetch_assoc($result))
                          {
                              foreach($p_id as $id)
                              {
                                  if($row['id'] == $id)
                                  {
                                       cartElement($row['p_image'], $row['p_name'], $row['p_price'], $row['id']);
                                       $total = $total+(int)$row['p_price'];
                                  }
                              }
                          }
                      }
                      else
                      {
                          echo"<h5>Cart is Empty</h5>";
                      }

                    ?>
                    
                </div>
            </div>
            <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
               <div class="pt-4">
                   <h6>PRICE DETAILS</h6>
                   <hr>
                   <div class="row price-details">
                       <div class="col-md-6">
                           <?php
                             if(isset($_SESSION['cart']))
                             {
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price($count items)</h6>";
                             }
                             else
                             {
                                echo "<h6>Price(0 items)</h6>";
                             }
                           ?>
                           <h6>Delivery Charges</h6>
                           <hr>
                           <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><?php echo "$".$total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php
                             echo $total;
                             ?></h6>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</body>
    <!--bootstrap js-->
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

</html>