<?php
require 'database/_dbconnect.php';
if (isset($_GET['c_id'])) {
  $s_id = $_GET['c_id'];
  $s_query = "SELECT * FROM city WHERE id='$s_id'";
  $run = mysqli_query($conn, $s_query);
  if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
     $s_co_id =$row['s_id'];
      $s_name = $row['name'];
?>
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
          <h1>City Update</h1>

          <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Country</label>
              <input type="text" class="form-control" name="city" id="exampleFormControlInput1" value="<?php echo $row['name']; ?>" placeholder="Country">
            </div>
            <div class="mb-3">
              <select class="form-select" name="co_id" aria-label="Default select example">
                <option value="0">Open this select menu</option>
                <?php
                echo $s_co_id;
                  $co_query = "SELECT id,s_name FROM state";
                  $co_run = mysqli_query($conn,$co_query);
                   
                  if(mysqli_num_rows($co_run) > 0)
                  {
                  
                    while($co_row = mysqli_fetch_assoc($co_run))
                    {
                       if($s_co_id == $co_row['id'])
                       {
                         echo '<option selected value='.$co_row['id'].'>'.$co_row['s_name'].'</option>';

                       }
                       else
                       {
                        echo '<option value='.$co_row['id'].'>'.$co_row['s_name'].'</option>';
                       }
                      }
                  }

                 ?>
<!--                 
                <option value="2">Two</option>
                <option value="3">Three</option> -->
              </select>
            </div>
            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-info">Update</button>
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
    }
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // print_r($c_name);
  $city = trim($_POST['city']);
  $state = $_POST['co_id'];
  if (isset($_POST['submit'])) {
    if ($city == !"") {
         //  $select = "SELECT * FROM country WHERE country_name='$country'";
      //     $s_run = mysqli_query($conn,$select);
      //     $one = mysqli_num_rows($s_run);
      //     if($one > 0)
      //     {

      //         echo "<script>alert('Country Name Already Add')</script>";


      //  }
      //  else{
       $query = "UPDATE `city` SET `s_id` = '$state',`name` = '$city' WHERE `city`.`id` = $s_id"; 
        $s_run = mysqli_query($conn, $query);
       if($s_run){

         echo "<script>alert('$s_name City Name Is Change To $city')</script>";
         ?>
         <script>
          window.location.href = 'city.php';
      </script>
         <?php
       }
       else
       {
         echo "<script>alert('$s_name State Name Is Change To $city Not')</script>";
       }
  
      
    }
  } else {
    echo "<script>alert('City Name Is Empty')</script>";
  }
}

?>