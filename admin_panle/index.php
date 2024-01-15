<?php 
  session_start();
//  database connection file
 require 'database/_dbconnect.php';

 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
  header('location:login.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css_admin/style.css">
    <title>Hello, world!</title>
  </head>
  <body>

    <!--navbar-->
     
      <?php require 'header.php'; ?>

    <!-- main -->
    <section id="home">
    <h1 class="h-primary">Welcome to A2-Producrs Admin-Panel</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt</p>
    <p>
      whenever you need to be sure to logout.<a href="/project/logout.php">using this link.</a>
    </p>
  </section>
      
      <!-- <?php  ?> -->
       <div class="cotainer">
        <h1>About Us</h1>
       E-commerce Website. A website that allows people to buy and sell physical goods, services, and digital products over the internet rather than at a brick-and-mortar location. Through an e-commerce website, a business can process orders, accept payments, manage shipping and logistics, and provide customer service.

       </div>
    <!-- footer -->

      <?php require 'footer.php'; ?>
  </body>
  <!-- javascript -->
  <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</html>