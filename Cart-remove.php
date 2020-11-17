<?php
include 'include/common.php'; 
include 'include/_dbconnect.php';
if (!isset($_SESSION['email'])) 
{ 
    header('location: login.php'); 
} 
$user_id=$_SESSION['user_id'];
$item_id=$_GET['id'];
$sql="DELETE FROM `items` WHERE user_id='$user_id' AND item_id='$item_id'";
$result=mysqli_query($conn,$sql);
if($result)
{
    header("location: products.php");
}
else
{
    echo "Error occure during removal";
}
?>