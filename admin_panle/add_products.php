<?php
//   database folder
require 'database/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // variables
    $categriey = $_POST['c_id'];
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp = $_FILES['p_image']['tmp_name'];
    $p_image_size = $_FILES['p_image']['size'];

    if(isset($_POST['submit']))
    {
        
        if($categriey == !"" && $p_name == !"" && $p_price == !"" && $p_image == !"")
        {
            $p_query = "INSERT INTO `products` (`cat_id`, `p_name`, `p_price`, `p_image`, `date`) VALUES ('$categriey', '$p_name', '$p_price', '/project/img/$p_image', current_timestamp())";
            $p_query_run = mysqli_query($conn, $p_query);
            move_uploaded_file($p_image_tmp,$p_image_folder.$p_image);
            header('location:product.php');

        }
        else
        {
            echo "<script>alert('Your Data is Empty')</script>";
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
    <title>Document</title>
    <!-- bootstrap css -->
     <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form control">
    <label for="" class="form-label">Categries</label>
    <select class="form-select" name="c_id" id="c_id">
      <option>Select...</option>
      <?php
          $cat_query = "SELECT cat_id,name FROM categries  order by name desc";
          $c_run = mysqli_query($conn, $cat_query);
     
          while($c_row = mysqli_fetch_assoc($c_run)){
              echo " <option value=".$c_row['cat_id'].">".$c_row['name']."</option>";
    }
  
    ?>
  <!-- <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option> -->
</select>
</div>

        <div class="mb-3">
            <label for="" class="form-label">Product Name:</label>
            <input type="text" class="form-control" id="p_name" name="p_name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Product Price</label>
            <input type="text" name="p_price" class="form-control" id="p_price">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="p_image" name="p_image">
        </div>
        <div class="">
           <button type="submit" class="btn btn-success" name="submit" id="submit">Add</button>
        </div>
    </form>
</body>
 <!-- bootstrap js  -->
  <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</html>