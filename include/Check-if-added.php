<?php
    include 'include/_dbconnect.php'; 
    $user_id=$_SESSION['user_id'];
    $sql="SELECT * FROM items WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$sql);
    $result2=false;
    $num=mysqli_num_rows($result);
    if($num>=1)
    {
        $result2=true;
    }
    else
    {
        echo '
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <strong>Sorry!</strong> Your have not any items in your cart
                <a href="Add_items.php">Click here to add</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin: 0;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        ';
    }
?>