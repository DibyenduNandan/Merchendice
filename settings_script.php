<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings | Life Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
<?php
include 'include/_dbconnect.php';
include 'include/common.php'; 
if (!isset($_SESSION['email'])) 
{ 
    header('location: index.php'); 
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $password = $_POST['old-password'];
    $npassword = $_POST['password'];
    $repassword = $_POST['password1'];
    $user_id=$_SESSION['user_id'];
    $Sql= "SELECT `password` FROM `users` WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$Sql);
    $row=mysqli_fetch_assoc($result);
    if(strcmp(md5($password),$row['password'])==0){
        if(strcmp($npassword,$repassword)==0){
            $hash=md5($npassword);
            $sql  = "UPDATE `users`SET `password` = '$hash' WHERE user_id='$user_id'";
            $result=mysqli_query($conn,$sql);
            $err="Password changed";
            $_SESSION['err']=$err;
            header("location:products.php");
        }
        else{
            $showerror="Please correctly enter confirm password";
            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <strong>Error!</strong>'.$showerror.'
                        <a href="settings.php">Click Here</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
        }
    }
    else
    {
        $showerror="Password dosenot matched! Please enter correct password";
        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <strong>Error!</strong>'.$showerror.'
                        <a href="settings.php">Click Here</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
    }
}
?>
</body>
</html>