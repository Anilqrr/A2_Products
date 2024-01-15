<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About to AK-Computer-<?php echo $_SESSION['username']; ?></title>
  <link rel="stylesheet" href="../css/style.css" />

  <link rel="stylesheet" media="screen and (max-width:1170px)" href="./css/phone.css">

   <!--bootstrap css-->
   <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">

<!--font awesome-->
<link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.css">
</head>

<body>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
?>
<nav class="navbar navbar-expand-lg navbar-drak bg-dark">
  <div id="logo">
    <img src="../img/logo.jpg" alt="AK-Computer" />
  </div>

  <ul>
    <li class="item"><a href="../project/index.php">Home</a></li>
    <li class="item"><a href="/project/menus/categries.php">categries</a></li>
    <li class="item"><a href="/project/menus/About.php">About</a></li>
    <li class="item"><a href="/project/menus/contact.php">Feedback</a></li>
    <?php
    if (!$loggedin) {
      echo '<li class="item"><a href="../project/signup.php">signup</a></li>
     <li class="item"><a href="../project/login.php">login</a></li>';
    }

    //login time show logout menu
    if ($loggedin) {
      echo '<li class="item"><a href="../project/logout.php">Logout</a></li>';
    }
    ?>
  </ul>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navabar-toggle-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="mr-auto"></div>
    <div class="navbar-nav">
      <a href="../project/cart.php" class="nav-item nav-link active">
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
    <a href="#user" target="home"><img src="../img/user_logo.jpg" alt="test" srcset=""></a>
    <?php
     if(isset($_SESSION['user'])):
    user_data();
     endif;
    ?>
  </div>
</nav>

      <p align="center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Voluptate accusamus iusto odit voluptatibus doloribus,
         earum molestias officia, velit asperiores, quia ducimus labore molestiae perferendis 
          natus totam architecto eum consequatur!</p>
    </div>
  </section>
</body>

</html>