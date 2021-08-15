<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
    $name = $_SESSION['name'];
    require('include/header.php');

    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id=" . $id;
    $user  = $db->select($query)->fetch_assoc();
    ?>

    <?php if (isset($_POST['submit'])) {
        if (isset($_SESSION['error_role'])) {
           ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error_role'];  ?></div>
            <?php
            unset($_SESSION['error_role']);
        } 
        else
         {
            $role = mysqli_real_escape_string($db->link, $_POST['role']);
            if (!isset($role) || $role == '') {
                $_SESSION['error_role'] = "Please Fill in your role ";
                header("location:edit_user.php?id=" . $id);
                exit();
            }
             else if ($role != 'admin' && $role != 'user') {
                $_SESSION['error_role'] = "Please Fill in your role with right only admin or user ";
                header("location:edit_user.php?id=" . $id);
                exit();
            } 
            else {
                $query = "UPDATE users SET
                role='$role'
                WHERE id=" . $id;
                $update_row = $db->update($query);
            }
        }
    }
    if (isset($_POST['delete'])) {
        $query = "DELETE FROM users WHERE id=" . $id;
        $delete_row = $db->delete($query);
    }
    ?>

    <form method="POST" action="edit_user.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label> <strong>User Role</strong> </label> <br>
            <small>Please wirte user or admin BE CARFUL case senetive</small>
            <input type="text" name="role" class="form-control" value="<?php echo $user['role']; ?>">
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