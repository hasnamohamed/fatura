<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :

    $name = $_SESSION['name'];
    require('include/header.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM category WHERE id=" . $id;
    $category  = $db->select($query)->fetch_assoc();
     if (isset($_POST['submit'])) {
        if (isset($_SESSION['error_cat'])) {
        ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error_cat'];  ?></div>
        <?php
         unset($_SESSION['error_cat']);
        }
        else{
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $price = mysqli_real_escape_string($db->link, $_POST['price']);
            if (!isset($name) || $name == ''|| !isset($price) || $price == '') {
                $_SESSION['error_cat'] = "Please Fill in your categry ";
                header("location:edit_cat.php?id=" . $id);
                exit();
            } else {
                $query = "UPDATE category SET
                    name='$name',
                    price='$price'
                    WHERE id=" . $id;
                $update_row = $db->update($query);
            }
        }
    }
    if (isset($_POST['delete'])) {
        $query = "DELETE FROM category WHERE id=" . $id;
        $delete_row = $db->delete($query);
    }
    ?>


    <form method="POST" action="edit_cat.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $category['name']; ?>">
        </div>
        <div class="form-group">
            <label>Category Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo $category['price']; ?>">
        </div>
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Edit">
            <a href="index.php" class="btn btn-primary">Cancel</a>
            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
            <hr>
        </div>
    </form>

    <?php require('include/footer.php'); ?>
<?php else : ?>
    <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not allowed</strong></div>
<?php endif ?>