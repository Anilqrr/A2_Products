<?php 
//  database folder(database connection
   require 'database/_dbconnect.php';
   if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
  
    $query = "SELECT * FROM products WHERE id=$p_id";
    $run = mysqli_query($conn, $query);
  
    while($row = mysqli_fetch_assoc($run)) {
      $cat_id = $row['cat_id'];
      $p_name = $row['p_name'];
      $p_price = $row['p_price'];
      $p_image = $row['p_image'];
      $p_date = $row['date'];
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
    <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

   <!-- form -->
   <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="" class="form-label">Id</label>
    <input type="text" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>">
  </div>
  <div class="form control">
    <label for="" class="form-label">Categries</label>
    <select class="form-select" name="c_id" id="c_id">
      <option>Select...</option>
      <?php
          $cat_query = "SELECT cat_id,name FROM categries  order by name desc";
          $c_run = mysqli_query($conn, $cat_query);
     
          while($c_row = mysqli_fetch_assoc($c_run)){
            if($cat_id == $c_row['cat_id'])
            {
              
              echo " <option value=".$c_row['cat_id']." selected>".$c_row['name']."</option>";
            }
           else
           {
               echo " <option value=".$c_row['cat_id'].">".$c_row['name']."</option>";
           }
      
    }
  
    ?>
  <!-- <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option> -->
</select>
</div>
<div class="mb-3">
  <label for="" class="form-label">Product name</label>
  <input type="text" class="form-control" name="p_name" id="p_name" value="<?php echo $p_name; ?>">
</div>
<div class="mb-3">
  <label for=""  class="form-label">Price</label>
  <input type="text" class="form-control" name="p_price" id="p_price" value="<?php echo $p_price; ?>">
</div>
<div class="mb-3">
  <label for="" class="form-label">Image</label>
  <input type="file" class="form-control" name="p_image" id="p_image">
  <input type="hidden" name="p_old_image" id="" value="<?php 
                                                                echo $p_image;
                                                                
                                                                ?>">
          <!-- <input type="submit" name="upload" value="Upload"> -->
        <img src="<?php if (isset($_FILES['p_image'])) {
                    echo "hello";
                  } else {
                    echo $p_image;
                  } ?>" width="100px" height="100px" alt="" srcset="" name="p_img">

</div>
<!--<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>-->
<div class="mb-3">
  <button type="submit" name="p_update" id="p_update" class="btn btn-success">Update</button>
</div>
</form>
</body>
 <!-- bootstrap javaacript  -->
 <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

</html>
<?php
 
//  product update

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form variables
    $categriey = $_POST['c_id'];
    $p_name_u = $_POST['p_name'];
    $p_price_u = $_POST['p_price'];
    
    $p_old_image = $_POST['p_old_image'];
    $p_image_u = $_FILES['p_image']['name'];
    $p_image_type = $_FILES['p_image']['type'];
    $p_image_size = $_FILES['p_image']['size'];
    // $c_image = $_POST['c_img'];
    $p_image_tmp = $_FILES['p_image']['tmp_name'];
    $p_image_folder = "product_image/$p_id";
    
    // submit data(submit button)
    
    if (isset($_POST['p_update'])) {
     echo "update";
      // new image and old image(new is empty than old image path send database table)
      
      if($new_image != '')
       {
         $update_file = '/project/img/'.$_FILES['p_image']['name'];
       }
       else
       {
         $update_file = $p_old_image;
       }
       
          $update_p = "UPDATE `products` SET `cat_id` = '$categriey', `p_name` = '$p_name_u', `p_price` = '$p_price_u', `p_image` = '$update_file' WHERE `products`.`id` = '$p_id'";
             
          
          // update query run
          
          if ($update_p && ($p_image_size <=2504943) ) { 
  
            $run_update_p = mysqli_query($conn, $update_p);
            move_uploaded_file($p_image_tmp,$p_image_folder.$p_image);
            header('location:product.php');

          } else {
            echo "error";
            echo "<script>alert('update not successfully')</script>";
          }
       }
  
  
  
  
  
      }
  
?>