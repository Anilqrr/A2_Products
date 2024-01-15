<?php
session_start();
//component file
require('component.php');
//get_data file
require('get_data.php');


//login code
/* if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    
    header('location:login.php');
    exit;
  }*/


//login user yes or not 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}

//Add to cart login user than
if ($loggedin == true) {
  if (isset($_POST['add'])) {
    //print_r($_POST['product_id']);


    if (isset($_SESSION['cart'])) {
      $item_array_id = array_column($_SESSION['cart'], "product_id");


      if (in_array($_POST['product_id'], $item_array_id)) {
        echo "<script>alert('Product is already added in the cart..!')</script>";
        echo "<script>header('Location:index.php')</script>";
      } else {
        $count = count($_SESSION['cart']);
        $item_array = array('product_id' => $_POST['product_id']);

        $_SESSION['cart'][$count] = $item_array;
      }
    } else {
      $item_array = array('product_id' => $_POST['product_id']);

      $_SESSION['cart'][0] = $item_array;
    }
  }
} else {
  if (isset($_POST['add'])) {
    echo "<script>alert('Login In this website')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>welcome to A2-Products-<?php
                                if ($loggedin == true) {
                                  echo $_SESSION['username'];
                                } else {
                                  echo "A2-Products";
                                }  ?></title>
  <!--css-->
  <link rel="stylesheet" href="/project/css/style.css" />

  <!--resposive css-->
  <link rel="stylesheet" media="screen and (max-width:1170px)" href="./css/phone.css">

  <!--bootstrap css-->
  <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">

  <!--font awesome-->
  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">

  <!--font-->
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&family=Bree+Serif&display=swap" rel="stylesheet" />
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

  <span class="navabr-toggle-icon"></span>
  <section id="home">
    <h1 class="h-primary">Welcome to A2-Producrs <?php if ($loggedin == true) : echo $_SESSION['username'];
                                                  else : echo "";
                                                  endif; ?></h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt</p>
    <p>
      whenever you need to be sure to logout.<a href="/project/logout.php">using this link.</a>
    </p>
    <a href="order.php"><button class="btn btn-info" >Order Details</button></a>
  </section>
  <?php

  ?>


  <section id="services-container">
    <h1 class="h-primary center">Products</h1>
    <div class="container">
      <div class="row text-center py-5">
        <?php


        $run = getData();
        while ($row = mysqli_fetch_assoc($run)) {
          component($row['p_name'], $row['p_price'], $row['p_image'], $row['id']);
        }


        ?>
      </div>
    </div>
  </section>
  <section id="client-section">
    <h1 class="h-primary center">our clients</h1>
    <div id="clients">
      <div class="client-item">
        <img src="./img/logo2.jpg" alt="our client">
      </div>
      <div class="client-item">
        <img src="./img/logo2.jpg" alt="our client">
      </div>
      <div class="client-item">
        <img src="./img/logo2.jpg" alt="our client">
      </div>
      <div class="client-item">
        <img src="./img/logo2.jpg" alt="our client">
      </div>
    </div>
  </section>

  <section id="contact">
    <h1 class="h-primary center">Contact Us</h1>
    <div id="contact-box">
      <form action="index.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
          <label for="name">Email</label>
          <input type="text" name="email" id="email" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
          <label for="name">Phone number</label>
          <input type="text" name="phone_number" id="phone_number" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
          <label for="name">Message</label>
          <textarea name="" id="message" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" id="submit" name="submit" value="submit">
        </div>
      </form>
    </div>
  </section>

  <footer>
    <div class="center">
      copyright &copy; www.A2-Computer.com All right is reserved!
    </div>
  </footer>
</body>
<!-- bootstrap js -->
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<!-- jquery file -->
<script src="/project/jquery/jquery.js"></script>

<script>
  $(document).ready(function() {
    $('#searchbox').keyup(function() {
      var query = $(this).val();
      // alert(query);
      if (query != '') {
        $.ajax({
          url: "search.php",
          method: "post",
          data: {
            query: query
          },
          success: function(data) {
            $('#product-list').fadeIn();
            $('#product-list').html(data);
          }
        });
      }
    });
    $(document).on('click', 'a', function() {
      $('#searchbox').val($(this).text());
      // $('#searchbox').val($(this).text());
      $('#product-list').html('');
    });
  });
</script>


</html>