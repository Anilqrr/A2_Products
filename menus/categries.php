<?php
  session_start();
    require_once '../db and style_css/_dbconnect.php';

    require_once '../get_data.php';
    
    require_once '../component.php';
     
   /* $id = $_GET['id'];
     if($id)
     {
        $q = "select * from products where cat_id = $id";

        $r = mysqli_query($conn, $q);
        
        if(mysqli_num_rows($r) > 0)
        {
            while($rw = mysqli_fetch_assoc($r))
            {
                component($row['p_name'], $row['p_price'], $row['p_image'],$row['id']);
            }
        }
    
     }*/
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
  {
    $loggedin = true;
  }
  else
  {
    $loggedin = false;
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
    <link rel="stylesheet" href="/project/css/style.css" />

    <!--responsive css-->
    <link rel="stylesheet" media="screen and (max-width:1170px)" href="/project/css/phone.css">


    <!--bootstrap-->
    <link rel="stylesheet" href="/project/bootstrap-5.1.3-dist/css/bootstrap.min.css">

    <!--fontawesome bootstrap-->
    <link rel="stylesheet" href="/project/fontawesome-free-6.1.1-web/css/all.css">


</head>
<body>
<?php    
echo'<nav class="navbar navbar-expand-lg navbar-drak bg-dark">
<div id="logo">
<img src="/project/img/logo.jpg" alt="AK-Computer" />
</div>

<ul>
     <li class="item"><a href="/project/index.php">Home</a></li>
      <li class="item"><a href="/project/menus/About.php">About</a></li>
      <li class="item"><a href="/project/menus/contact.php">Contact</a></li>';

      //not login user this time menus are show(signup and login)
      if(!$loggedin){
      echo'<li class="item"><a href="/project/signup.php">signup</a></li>
       <li class="item"><a href="/project/login.php">login</a></li>';
     }

     //login time show logout menu
      if($loggedin)
      {
        echo '<li class="item"><a href="/project/logout.php">Logout</a></li>';
      }  
      echo'</ul>
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
           <a href="/project/cart.php" class="nav-item nav-link active">
            <h5 class="px-5 cart">
              <i class="fas fa-shopping-cart"></i>Cart';
              ?>
              <?php
               if(isset($_SESSION['cart']))
               {
                 $count = count($_SESSION['cart']);
                 echo"<span id='cart_count' class='text-warning bg-light'>$count</span>";
               }
               else
               {
                echo"<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";

               }
          echo'  </h5>
          </a>
         </div>

      </div>
  </nav>';
?>
<section id="services-container">
    <h1 class="h-primary center"></h1>
    <div class="container">
      <div class="row text-center py-5">
        <?php
    
             $run =  cat_getData();
    
             while($row = mysqli_fetch_assoc($run))
             {
                 get_categries($row['name'], $row['image'], $row['cat_id']);
    
              }
    

        ?>
      </div>
    </div>
</section>
</body>
</html>