<?php
session_start();
require 'db and style_css/_dbconnect.php';

require 'component.php';

require 'get_data.php';

// require 'header.php'; 


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    $login = true;
    $user=$_SESSION['username'];
    $select = "SELECT * FROM `users` Where username='$user'"; 
    $run=mysqli_query($conn,$select);
    $query_run=mysqli_fetch_assoc($run);

   $u_id=$query_run["id"];
   // echo $user;

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

<!--resposive css-->
<link rel="stylesheet" media="screen and (max-width:1170px)" href="./css/phone.css">

<!--bootstrap css-->
<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">

<!--font awesome-->
<link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
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
    <img src="./img/logo.jpg" alt="AK-Computer" />
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
  <div>

    <div class="search">
      <input type="text" name="" id="searchbox">
      <input type="button" value="Search">
    </div>
    <div class="product-list">

    </div>
  </div>
  <div id="user">
    <a href="#user" target="home"><img src="img/user_logo.jpg" alt="test" srcset=""></a>
    <?php
     if(isset($_SESSION['user'])):
    user_data();
     endif;
    ?>
  </div>
</nav>
<div class="brand">
        <div class="container">

        </div>
        <div class="brand-bg">
            <div class="container">
                <div class="row">

                    <?php
                       
                     $select = "SELECT * FROM `payment` Where user_id='$u_id'";
                     $s_run=mysqli_query($conn,$select);
                    if(mysqli_num_rows($s_run))
                    {
                    while ($row = mysqli_fetch_assoc($s_run)) {
                       echo $id = $row['p_id'];
                        $p_name=$row['p_name'];
                        $p_price=$row['p_price'];
                        $p_img=$row['p_image'];
                    
                    ?>
                    <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
        <img src="<?php echo $p_img; ?>" alt="" class="mx-2">
        <div class="pt-4">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="row price-details">
                <div class="col-md-6">
                    <h6>Product Name:</h6>
                    
                    <hr>
                    <h6>Amount Payable</h6>
                </div>
                <div class="col-md-6">
                    <h6><?php echo $p_name; ?></h6>
                    <hr>
                    <h6><?php echo $p_price; ?></h6>
                    <form actio="" method="post">
                    <button type='submit' class='btn btn-warning' name='cancle'><i class='fas fa-shopping-cart'></i>Cancle</button>         
                    <!-- <button type="submit" name="cancle">Cancle</button> -->
                </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
}
else
{
    echo "you are not product ordered <a href='/project/menus/categries.php'>Order Now</a>";
}
}
 ?>
</body>
</html>
<?php


if(isset($_POST['cancle']))
{
    // echo $id;
    $query = "DELETE FROM payment WHERE `payment`.`p_id` = '$id' AND user_id='$u_id'";
    // echo $query;
    $run = mysqli_query($conn,$query);
    if($run){
      echo "<script>alert('Order Cancle')</script>";
      ?>
      <script>window.location.href='index.php';</script>
      <?php
    }
        // header('location:index.php');
    // header('location:index.php');
}

?>