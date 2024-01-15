<?php
// database folder
 require 'database/_dbconnect.php';
// delete produts..

if($_GET['p_id'])
{
      $p_id = $_GET['p_id'];
      $delete_p = "DELETE FROM products WHERE id = $p_id";
      $run_delete_p = mysqli_query($conn, $delete_p);
      // $location = 'index.php';
      if($run_delete_p)
      {
        echo "<script>alert('Data Delete')</script>";
         header('location:product.php');
      }
      else
      {
        echo"<script>record not deleted</script>";
      }
    
}


?>