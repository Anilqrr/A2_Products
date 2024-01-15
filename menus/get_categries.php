<?php
  session_start();
    require_once '../db and style_css/_dbconnect.php';

    require_once '../component.php';
    
      $id=$_GET['id'];

   /* $query = "select * from products where cat_id='$id'";

    $run = mysqli_query($conn, $query);

    if(mysqli_num_rows($run) > 0)
    {
        while($row = mysqli_fetch_assoc($run))
        {
           component($row['p_name'], $row['p_price'], $row['p_image'], $row['id']);
        }
    }*/

     //Add to cart login user than
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
     {
       $loggedin = true;
     }
     else
     {
       $loggedin = false;
     }

 if($loggedin == true){  
    if(isset($_POST['add']))
    {
//print_r($_POST['product_id']);


           if(isset($_SESSION['cart']))
           {
                $item_array_id = array_column($_SESSION['cart'],"product_id");


                if(in_array($_POST['product_id'],$item_array_id))
                {
                     echo "<script>alert('Product is already added in the cart..!')</script>";
                     echo "<script>header('Location:get_categries.php')</script>";
                }
               else
                {
                     $count = count($_SESSION['cart']);
                     $item_array = array ('product_id'=>$_POST['product_id']);

                     $_SESSION['cart'][$count] = $item_array;

                }
            }
          else
           {
                   $item_array = array ('product_id'=>$_POST['product_id']);

                  $_SESSION['cart'][0] = $item_array;

            }
       }
       
       
      }
      //echo"<script>alert('You are not login || login now')</script>";
      //echo"<script>header('location:../project/login.php')</script>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--css-->
    <link rel="stylesheet" href="/project/css/style.css" />

    <!--responsive-->
    <link rel="stylesheet" media="screen and (max-width:1170px)" href="/project/css/phone.css">

 
    <!--bootstrap-->
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">

    <!--fontawesome bootstrap-->
    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.css">


</head>
<body>
  <!--login time show and not show menu-->
  <?php

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
  } else {
    $loggedin = false;
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-drak bg-dark">
    <div id="logo">
      <img src="/project/img/logo.jpg" alt="AK-Computer" />
    </div>

    <ul>
      <li class="item"><a href="/project/index.php">Home</a></li>
      <li class="item"><a href="/project/menus/categries.php">categries</a></li>
      <li class="item"><a href="/project/menus/About.php">About</a></li>
      <li class="item"><a href="/project/menus/contact.php">Feedback</a></li>
      <?php
      if (!$loggedin) {
        echo '<li class="item"><a href="/project/signup.php">signup</a></li>
       <li class="item"><a href="/project/login.php">login</a></li>';
      }

      //login time show logout menu
      if ($loggedin) {
        echo '<li class="item"><a href="/project/logout.php">Logout</a></li>';
      }
      ?>
    </ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navabar-toggle-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="mr-auto"></div>
      <div class="navbar-nav">
        <a href="/project/cart.php" class="nav-item nav-link active">
          <h5 class="px-5 cart">
            <i class="fas fa-shopping-cart"></i>Cart
            <?php
            if (isset($_SESSION['cart'])) {
              $count = count($_SESSION['cart']);
              echo "<span id='cart_count' class='text-warning bg-light'>$count</span>";
            } else {
              echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
            }
            ?>
          </h5>
        </a>
      </div>
    </div>
  </nav>

<span class="navabr-toggle-icon"></span>
<section id="services-container">
    <h1 class="h-primary center">Products</h1>
    <div class="container">
      <div class="row text-center py-5">
           <?php
               
              
               $query = "select * from products where cat_id='$id'";

               $run = mysqli_query($conn, $query);
           
               if(mysqli_num_rows($run) > 0)
               {
                   while($row = mysqli_fetch_assoc($run))
                   {
                     component($row['p_name'], $row['p_price'], $row['p_image'], $row['id']);
                   }
               }
                
               

            ?>       
      </div>
    </div>
  </section>
    
</body>
</html>