<?php
//showe on alert box error and success
$showalert = false;
$showerror = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db and style_css/_dbconnect.php';
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confri_password = $_POST['confri_pass'];
    $exists = false;

    if (isset($_POST['Signup'])) {
        if ($username == !"" && $password == !"" && $confri_password == !"") {
            //check to username in  table exists
            $existSql = "SELECT * FROM `users` WHERE username='$username'";
            $run = mysqli_query($conn, $existSql);
            $numexitsrows = mysqli_num_rows($run);
            if ($numexitsrows > 0) {
                // $exists = true;
                $showerror = "Username Already Exists";
            } else {
                //$exists = false;

                if (($password == $confri_password) && $exists == false) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
                    $run = mysqli_query($conn, $query);

                    if ($run) {
                        $showalert = true;
                    }
                } else {
                    $showerror = "Password do not match";
                }
            }
        } else {
            echo "<script>alert('Your Data is Empty || Enter Your Data')</script>";
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
    <title>Signup to AK-Computer</title>
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
    if ($showalert) {
        echo "<script>
               alert('success! signup you can login to your account');
               </script>";
        header('location:login.php');
    }
    if ($showerror) {
        echo "<script>
               alert('$showerror');
          </script>";
        //   header('location:login.php');
    }

    ?>
    <div class="container">
        <h1 align="center">Signup to our website</h1>
        <form action="/project/signup.php" method="post">
            <div class="form-group">
                <label>Username</label><br>
                <input type="text" maxlength="11"  name="username" id="username">
            </div>
            <div class="form-group">
                <label>Password</label><br>
                <input type="password" maxlength="8" name="password" id="password">
            </div>
            <div class="form-group">
                <label>confirm Password</label><br>
                <input type="password" maxlength="8" name="confri_pass" id="confri_pass">
            </div>
            <div class="form-group">
                <input type="submit" name="Signup" id="Signup" value="Signup">
            </div>
        </form>
    </div>
</body>

</html>