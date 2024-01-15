<?php
// database folder
require 'db and style_css/_dbconnect.php';

if(isset($_POST['query']))
{
    $search_text = $_POST['query'];
    $query = "SELECT p_name FROM products WHERE p_name LIKE '%$search_text%'";
    $run = mysqli_query($conn, $query);
    if(mysqli_fetch_assoc($run) > 0)
    {
       while($row = mysqli_fetch_assoc($run))
       {
           echo "<a href='#' bg-light>".$row['p_name']."</a>";
       }
    }
    else
    { 
         echo "<p>Product Not Found</p>";
    }
}


?>