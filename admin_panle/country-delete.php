<?php

 if(isset($_GET['co_id']))
 {
    require 'database/_dbconnect.php';
    $co_id = $_GET['co_id'];
    $co_delete = "DELETE FROM country WHERE `country`.`co_id` = $co_id";
    $co_run = mysqli_query($conn,$co_delete);
    if($co_run)
    {
        echo "<script>alert('One Country Name Is Delete')</script>";
        ?>
        <script>
            window.location.href='country.php';
            </script>
        <?php
    }
 }

?>