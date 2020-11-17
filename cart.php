<?php
include 'include/common.php'; 
include 'include/_dbconnect.php';
if (!isset($_SESSION['email'])) 
{ 
    header('location: index.php'); 
} 
$user_id=$_SESSION['user_id'];
$id=$_GET['id'];
$sql="SELECT * FROM items WHERE user_id='$user_id' AND item_id='$id'";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life  Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- EDIT MODAL -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLable"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(255 210 136);">
                        <h5 class="modal-title" id="editModalLable">Reset Price or Stock no of a Iteam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='cart-add.php?id=<?php echo $id;?>' method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="snoEdit" id="snoEdit">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" id="price" required>
                            </div>
                            <div class="form-group">
                                <label for="stock">No of stocks</label>
                                <input type="number" name="stock" class="form-control" id="stock" required>
                            </div>
                        </div>
                        <div class="modal-footer d-block mr-auto">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'include/header.php'; ?>
        <?php
            if(mysqli_num_rows($result)==0)
            {
        ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin-bottom:35%">
                    <strong>Sorry!</strong> Add items to the cart first!
                    <button type="button" class="close" aria-label="Close">
                        <a href="products.php"><span aria-hidden="true">&times;</span></a>
                    </button>
                </div>
        <?php
            }
            else
            {
        ?>
        <div class="container-fluid" id="content">
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number </th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
        <?php
                $i=1;
                $j=array();
                while($row=mysqli_fetch_assoc($result))
                {
        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['price'];?></td>
                                <td><a href='Cart-remove.php?id=<?php echo $id;?>' class='remove_item_link'> Remove</a> </td>
                                <td><a style="cursor: pointer;" class="edit" class='remove_item_link'>Change Price/Stock</a></td>
                            </tr>
                        </tbody>                    
        <?php
                    $i+=1;
                }
        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <?php include 'include/footer.php'; ?>
        <script>
            edits = document.getElementsByClassName('edit');
            Array.from(edits).forEach((element) => {
                element.addEventListener("click", (e) => {
                    $('#editModal').modal("toggle");
                })
            })
        </script>
    </body>
</html>