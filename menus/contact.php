<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once '../db and style_css/_dbconnect.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  if (isset($_POST['submit'])) {
    if ($loggedin == true) {
      if ($_SESSION['username'] == $name) {


        if ($name == !"" && $email == !"" && $phone == !"" && $message == !"") {
          $query_insert = "INSERT INTO `feedback` (`name`, `email`, `phone`, `message`, `date`) VALUES ('$name', '$email', '$phone', '$message', current_timestamp());";
          $run_query = mysqli_query($conn, $query_insert);
          echo "<script>alert('Your Feedback is Sending')</script>";
        } else {
          echo "<script>alert('Your Data is Empty || Enter Your FeedBack')</script>";
        }
      } else {
        echo "<script>alert('Your Username is Not Exist Check Your Usename')</script>";
      }
    } else {
      echo "<script>alert('You are not login || to login in website')</script>";
      //echo"<a href='/project/login.php'>Click Login</a>";
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
  <title><?php if ($loggedin == true) {
            echo $_SESSION['username'];
          } else {
            echo "AK-Products";
          }  ?></title>

  <!--css-->
  <link rel="stylesheet" href="/project/css/style.css" />

  <!--responsive css-->
  <link rel="stylesheet" media="screen and (max-width:1170px)" href="/project/css/phone.css">

  <!--bootstrap-->
  <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">

  <!--fontawesome bootstrap-->
  <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.css">


</head>

<body>
  <?php
  echo '<nav class="navbar navbar-expand-lg navbar-drak bg-dark">
<div id="logo">
<img src="/project/img/logo.jpg" alt="AK-Computer" />
</div>

<ul>
<li class="item"><a href="/project/index.php">Home</a></li>';

  //not login user this time menus are show(signup and login)
  if (!$loggedin) {
    echo '<li class="item"><a href="/project/signup.php">signup</a></li>
  <li class="item"><a href="/project/login.php">login</a></li>';
  }

  //login time show logout menu
  if ($loggedin) {
    echo '<li class="item"><a href="/project/logout.php">Logout</a></li>';
  }
  echo '</ul> </nav>';
  ?>
  <div class="container">
    <h1 align="center">Feedback</h1>
    <form action="contact.php" method="post">
      <div class="form-group">
        <label>name</label><br>
        <input type="text" name="name" id="name" placeholder="Enter Your User Name">
      </div>
      <div class="form-group">
        <label>Email</label><br>
        <input type="email" name="email" id="email">
      </div>
      <div class="form-group">
        <label>Phone</label><br>
        <input type="phone" name="phone" id="phone">
      </div>
      <div class="form-group">
        Feedback:<textarea name="message" id="message" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" id="submit" value="submit">
      </div>
    </form>
  </div>
</body>

</html>