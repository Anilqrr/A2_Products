<?php
require 'db and style_css/_dbconnect.php';
$id  = $_POST['id'];
$type = $_POST['type'];
if($type == 'city')
{

    $sql = "select id,name from city where s_id = $id";

    $s_run = mysqli_query($conn, $sql);
    $html = '';
    while($row = mysqli_fetch_assoc($s_run)){
    $html.= '<option value='.$row['id'].'>'.$row['name'].'</option>';
    }
}
else
{
    $sql = "select id,s_name from state where co_id = $id";
    $s_run = mysqli_query($conn, $sql);
    $html = '';
    while($row = mysqli_fetch_assoc($s_run)){
    $html.= '<option value='.$row['id'].'>'.$row['s_name'].'</option>';
}

}
//     $s_run = mysqli_query($conn, $sql);
//     $html = '';
//     while($row = mysqli_fetch_assoc($s_run)){
//     $html.= '<option value='.$row['id'].'>'.$row['name'].'</option>';
// }
echo $html;


?>