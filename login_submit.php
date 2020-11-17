<?php
include 'include/_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email= mysqli_real_escape_string($conn,$_POST['e-mail']);
    $password =md5($_POST['password']);
    $sql  = "SELECT `user_id`,`email` FROM users  where email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $login=true;
            session_start();
            $_SESSION["user_id"]=$row['user_id'];
            $_SESSION["email"]=$email;
            header("location:products.php");
        }
    }
    else
    {
        $showerror="Check your Password or email donot match";
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