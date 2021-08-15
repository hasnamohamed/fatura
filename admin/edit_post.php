<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :

    $name = $_SESSION['name'];
    require('include/header.php');

    $id = $_GET['id'];
    $query = "SELECT * FROM posts WHERE id=" . $id;
    $post  = $db->select($query)->fetch_assoc();
    $query = "SELECT * FROM category";
    $categories = $db->select($query);

    if (isset($_POST['submit'])) {
        if (isset($_SESSION['error_post'])) {
?>
            <div class="alert alert-danger"><?php echo $_SESSION['error_post'];  ?></div>
    <?php
            unset($_SESSION['error_post']);
        } else {
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            $category_id = mysqli_real_escape_string($db->link, $_POST['category_id']);
            if (!isset($title) || $title == '' || !isset($body) || $body == '' || !isset($category_id) || $category_id == '') {
                $_SESSION['error_post'] = "Please Fill in your post data";
                header("location:edit_post.php?id=" . $id);
                exit();
            } else {
                $query = "UPDATE posts SET
         title='$title',
         body='$body',
         category_id='$category_id'
         WHERE id=" . $id;
                $update_row = $db->update($query);
            }
        }
    }

    if (isset($_POST['delete'])) {
        $query = "DELETE FROM posts WHERE id=" . $id;
        $delete_row = $db->delete($query);
    }
    ?>

    <form method="POST" action="edit_post.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label>NewsLetter title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
        </div>
        <div class="form-group">
            <label>NewsLetter Body</label>
            <textarea class="form-control" name="body">
        <?php echo $post['body']; ?>
    </textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <?php

                while ($row = $categories->fetch_assoc()) :
                    if ($row['id'] == $post['category_id'])
                        $selected = 'selected';
                    else
                        $selected = '';

                ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo $selected ?>><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="hidden" class="form-control" name="user_id" value="<?php $_SESSION['id'] ?>">
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