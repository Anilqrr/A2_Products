<?php
if(isset($_GET['c_id']))
{
    require 'database/_dbconnect.php';
  $c_id = $_GET['c_id'];
    $c_delete = "DELETE FROM city WHERE `city`.`id` = $c_id";
    $c_run = mysqli_query($conn,$c_delete);
    if($c_run)
    {
        echo "<script>alert('One City Name Is Delete')</script>";
        ?>
        <script>
            window.location.href='city.php';
            </script>
        <?php
    }
}

?>