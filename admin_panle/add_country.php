<?php require 'database/_dbconnect.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container">
    <h1>Add Country</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Country</label>
            <input type="text" class="form-control" name="country" id="exampleFormControlInput1" placeholder="Country">
        </div>
        <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-info">Add</button>
        </div>
    </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
     $country = trim($_POST['country']);

       if(isset($_POST['submit']))
       {
          if($country == !"")
          {
             $select = "SELECT * FROM country WHERE country_name='$country'";
             $s_run = mysqli_query($conn,$select);
             $one = mysqli_num_rows($s_run);
             if($one > 0)
             {

                 echo "<script>alert('Country Name Already Add')</script>";
           
           
          }
        else
         {
            echo $one;
        $query = "INSERT INTO `country`(`country_name`) VALUES ('$country')";
        $run = mysqli_query($conn,$query);
        echo "<script>alert('Country Name Insert')</script>";
        ?>
         <script>
             window.location.href='add_country.php';
         </script>
        <?php
        }
    }
          else
          {
            echo "<script>alert('Country Name is Empty')</script>";
            
            
        
            // echo "<script>header('add_country.php')</script>";
          }

       }
   }

?>