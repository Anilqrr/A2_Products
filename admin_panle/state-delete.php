<?php
if(isset($_GET['s_id']))
{
    require 'database/_dbconnect.php';
  $s_id = $_GET['s_id'];
    $s_delete = "DELETE FROM state WHERE `state`.`id` = $s_id";
    $s_run = mysqli_query($conn,$s_delete);
    if($s_run)
    {
        echo "<script>alert('One State Name Is Delete')</script>";
        ?>
        <script>
            window.location.href='state.php';
            </script>
        <?php
    }
}

?>