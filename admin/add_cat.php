<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
?>

    <?php
    $name = $_SESSION['name'];
    require('include/header.php');

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $price = mysqli_real_escape_string($db->link, $_POST['price']);
        if (!isset($name) || $name == ''||!isset($price) || $price == '') {
            $_SESSION['error_cat'] = "Please Fill in your category name";
            header("location:add_cat.php");
            exit();
        } else {
            $query = "INSERT INTO category (name,price)
                    VALUES ('$name','$price')";
            $insert_row = $db->insert($query);
        }
    }
    ?>

    <form method="POST" action="add_cat.php">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Category Name">
        </div>
        <div class="form-group">
            <label>Category Price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter Category Price">
        </div>
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
            <a href="index.php" class="btn btn-primary">Cancel</a>
            <hr>
        </div>
    </form>

    <?php require('include/footer.php'); ?>
<?php else : ?>
    <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not allowed</strong></div>
<?php endif ?>