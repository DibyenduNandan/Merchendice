<?php
include 'include/common.php'; 
include 'include/_dbconnect.php';
if (!isset($_SESSION['email'])) 
{ 
    header('location: login.php'); 
} 
$err=false;
$showerror=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $product=$_POST['name'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $file_name=$_FILES['file']['name']; 
    $temp_name=$_FILES["file"]["tmp_name"]; 
    $imgtype=$_FILES["file"]["type"];
    include 'include/_image.php';
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time().$ext; 
    $target_path = "image/".$imagename; 
    if(move_uploaded_file($temp_name, $target_path))
    {
        $id=$_SESSION["user_id"];
        $sql  = "INSERT INTO `items`(`user_id`,`stocks`,`name`,`price` ,`location`) VALUES ('$id','$stock','$product','$price','$target_path')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header("location:products.php");
        }
        else
        {
            echo "Error in updating in database";
        }
    }
    else
    {
        echo "Error in Image loading";
    }
}
?>