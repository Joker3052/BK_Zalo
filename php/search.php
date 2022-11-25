<?php
session_start();
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
$outgoing_id = $_SESSION['unique_id'];
// echo $searchTerm;
// $output ="Result: ";
if(isset($_POST['fullname '])){
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
}

$output ="";
$sql =mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fullname LIKE '%{$searchTerm}%' ) ");
if(mysqli_num_rows($sql)>0)
{
    include_once('data.php');
}
else{
    $output .="not found";
}
echo $output;