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
          <h1>Add State</h1>

          <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">State</label>
              <input type="text" class="form-control" name="state" id="exampleFormControlInput1"  placeholder="State">
            </div>
            <div class="mb-3">
              <select class="form-select" name="co_id" aria-label="Default select example">
                <option value="0">Open this select menu</option>
                <?php
                echo $s_co_id;
                  $co_query = "SELECT co_id,country_name FROM country";
                  $co_run = mysqli_query($conn,$co_query);
                   
                  if(mysqli_num_rows($co_run) > 0)
                  {
                  
                    while($co_row = mysqli_fetch_assoc($co_run))
                    {
                       if($s_co_id == $co_row['co_id'])
                       {
                         echo '<option selected value='.$co_row['co_id'].'>'.$co_row['country_name'].'</option>';

                       }
                       else
                       {
                        echo '<option value='.$co_row['co_id'].'>'.$co_row['country_name'].'</option>';
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
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
     $s_state = trim($_POST['state']);
      $co_id = $_POST['co_id'];
       if(isset($_POST['submit']))
       {
          if($s_state == !"")
          {
             $select = "SELECT * FROM state WHERE s_name='$s_state'";
             $s_run = mysqli_query($conn,$select);
             $one = mysqli_num_rows($s_run);
             if($one > 0)
             {

                 echo "<script>alert('State Name Already Add')</script>";
           
           
          }
        else
         {
            echo $one;
        $query = "INSERT INTO `state`(`co_id`,`s_name`) VALUES ('$co_id','$s_state')";
        $run = mysqli_query($conn,$query);
        echo "<script>alert('State Name Insert')</script>";
        ?>
         <script>
             window.location.href='state.php';
         </script>
        <?php
        }
    }
          else
          {
            echo "<script>alert('State Name is Empty')</script>";
            
            
        
            // echo "<script>header('add_country.php')</script>";
          }

       }
   }

?>