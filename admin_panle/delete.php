<?php
  require 'database/_dbconnect.php';
  // user table data delete
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $delete = "DELETE FROM users WHERE id = $id";
    $run_delete = mysqli_query($conn, $delete);
    // $location = 'index.php';
    if($run_delete)
    {
      echo "<script>alert('Data Delete')</script>";
       header('location:main.php');
    }
    else
    {
      echo"record not deleted";
    }
  }
  else
  {
    echo "id not set";
  }
  

  // categriey data delete

  if(isset($_GET['c_id']))
  {
    $c_id = $_GET['c_id'];
    $delete_c = "DELETE FROM categries WHERE cat_id = $c_id";
    $run_delete_c = mysqli_query($conn, $delete_c);
    // $location = 'index.php';
    if($run_delete_c)
    {
      echo "<script>alert('Data Delete')</script>";
       header('location:categriey.php');
    }
    else
    {
      echo"record not deleted";
    }
  }
  else
  {
    echo "id not set";
  }
    
?>