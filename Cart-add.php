<?php
include 'include/common.php';
include 'include/_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $item_id=$_GET['id'];
    $user_id=$_SESSION['user_id'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $sql="UPDATE `items` SET `price`='$price',`stocks`='$stock' WHERE user_id='$user_id' AND item_id='$item_id'";
    $result=mysqli_query($conn,$sql);
    if($result)
        {
            header("location:products.php");
        }
    else
        {
        echo "Probleam in result variable";
        }
}
?>