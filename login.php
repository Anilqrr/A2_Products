<?php
  //showe on alert box error and success
 $login = false;
 $showerror = false;

 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
   include 'db and style_css/_dbconnect.php';
   $username=$_POST['username'];
   $password=$_POST['password'];
   $exists=false;
  
   
        // $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
        $query = "SELECT * FROM `users` WHERE username='$username'";
        $run = mysqli_query($conn,$query);
        $num = mysqli_num_rows($run);
        if($num == 1)
        {
            while($row=mysqli_fetch_assoc($run)){
                if(password_verify($password, $row['password']))
                {
                    $login = true;
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = true;
                    header('location:index.php');

                }
                else
                {
                    $showerror = "Password was rong entare prafact password";
                }
            }
        }
       else
       {
            $showerror = "Inavaild account signup to account";
                
       }
 }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your Account | AK-Computer</title>
    <!--css-->
  <link rel="stylesheet" href="/project/db and style_css/style.css" />
  <!--resposive css-->
  <link rel="stylesheet" media="screen and (max-width:1170px)" href="./css/phone.css">

  <!--bootstrap css-->
  <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css"> -->

  <!--font awesome-->
  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">

</head>
<body>
<?php
     if($login)
     {
         echo"<script>
               alert('successfully! login to your account');
               </script>";
     }
     if($showerror)
     {
          echo"<script>
                alert('$showerror');
           </script>";
          echo"<script>header('location:signup.php')</script>";
     }

    ?>
    <div class="container">
         <h1 align="center">Login to our website</h1>
        <form action="/project/login.php" method="post">
            <div class="form-group">
                <label>Username</label><br>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label>Password</label><br>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <input type="submit" name="Signup" id="Signup" value="Login">
               <p>Create You new account?<a href="signup.php">click</a></p>
            </div>
        </form>
    </div>
</body>
</html>
