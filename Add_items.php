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
        <title>Add Items | Life Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'include/header.php'; ?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>Add New Items</h2>
                        <form role="form" action="Add_items_scripy.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name of product" name="name" id="name"  required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control"  placeholder="price" id="price"  name="price" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control"  placeholder="No of Stock" id="stock"  name="stock" required>
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Image</label>
                                <input class="form-control" type="file" name="file" id="file">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </body>
</html>