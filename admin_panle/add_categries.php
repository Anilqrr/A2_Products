<?php
// database folde
$size = false;
$catexist = false;
require 'database/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['cat_name'];
  //  $image = $_POST['c_image'];
  $cat_img = $_FILES['cat_image']['name'];
  $c_image_tmp = $_FILES['cat_image']['tmp_name'];
  $image_size = $_FILES['cat_image']['size'];
  $c_image_folder = 'img_admin/';

   if(isset($_POST['submit']))
   {

      if ($image_size <= 2504943) {
        
        if (($name == !"" && $cat_img == !"")) {
          $c_query = "INSERT INTO `categries` (`name`, `image`, `date`) VALUES ('$name', '/project/img/$cat_img', current_timestamp())";
          $run_c_query = mysqli_query($conn, $c_query);
          move_uploaded_file($c_image_tmp, $c_image_folder . $image);
           header('location:categriey.php');
        } else {
          echo "<script>alert('You data is empty || Enter Data')</script>";
        }
      } else {
        $size = true;
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
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<?php if($catexist == true){
        echo "<script>Categriey Name Alreay Exist</script>";
    } ?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">categriey Name:</label>
      <input type="text" class="form-control" name="cat_name" id="cat_name">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">categriey Iamge:</label>
      <input type="file" class="form-control" accept="image/png,image/jpeg" name="cat_image" id="cat_image">

      <img src="<?php echo $cat_img; ?>" width="100px" height="100px" alt="" srcset="">
    </div>
    <input type="submit" name="submit" value="submit">
    <div> <?php if ($size == true) {
          echo "only png and jpg file uplaod || file size 2,504,943(small or equal not bigger) byte enter";
        } ?></div>
  </form>
</body>
<!-- javascript -->
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<b>first image upload</b>

</html>
<script src="">

</script>