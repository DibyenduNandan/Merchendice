<?php
$err=false;
$showerror=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'include/_dbconnect.php';
    $username=mysqli_real_escape_string($conn,$_POST['name']);
    $password = md5($_POST['password']);
    $email =mysqli_real_escape_string($conn,$_POST['e-mail']);
    $con=$_POST['contact'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $existSql= "SELECT * FROM `users` WHERE email='$email'";
    $result=mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows > 0){
        $showerror="Email already exists";
    }
    else
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $sql  = "INSERT INTO `users`(`name`,`email` ,`password`,`contact`,`city`,`address`) VALUES ('$username','$email','$password','$con','$city','$address')";
            $result=mysqli_query($conn,$sql);
            $id=mysqli_insert_id($conn);
            if($result)
            {
                session_start();
                $_SESSION['user_id']=$id;
                $_SESSION['email']=$email;
                header("location:products.php");
            }
        }
        else
        {
            $showerror="Email is not valid";
            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <strong>Error!</strong>'.$showerror.'
            <a href="settings.php">Click Here</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
}
?>