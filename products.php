<?php
include 'include/common.php'; 
include 'include/_dbconnect.php';
if (!isset($_SESSION['email'])) 
{ 
    header('location: login.php'); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | Life Store</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php?>
    <?php include 'include/header.php'; ?>
    <?php include 'include/Check-if-added.php'; ?>

    <div class="container" id="content">

        <!-- Jumbotron Header -->
        <div class="jumbotron home-spacer" id="products-jumbotron">
            <h1>Welcome to our Lifestyle Store!</h1>
        </div>
        <hr>
        <marquee style="color: red;">Click the button "Click here" to delete items or change the price or click Cart to add new items</marquee>
        <div class="row text-center" id="cameras">
            <?php
            if ($result2==true)
            {
                while ($num!=0)
                {
                    $row=mysqli_fetch_assoc($result);
                    echo '
                    <div class="col-md-3 col-sm-6 home-feature">
                        <div class="thumbnail">
                            <img src="'.$row['location'].'" alt="">
                            <div class="caption">
                                <h3>'.$row['name'].'</h3>
                                <p>Price: .'.$row['price'].' </p>
                                <p>Stock: .'.$row['stocks'].' </p>
                                    <p>
                                        <a href="cart.php?id='.$row['item_id'].'" role="button"
                                            class="btn btn-primary btn-block">Click here</a>
                                    </p>
                            </div>
                        </div>
                    </div>
                    ';
                    $num-=1;
                }
            }
            ?>
            </div>
        </div>
        <hr>
    </div>
    <footer>
        <div class="container">
            <center>
                <p>Copyright &copy; Lifestyle Store. All Rights Reserved | Contact Us: +91 90000 00000</p>
            </center>
        </div>
    </footer>
</body>

</html>