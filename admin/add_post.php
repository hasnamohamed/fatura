<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
?>

    <?php
    $name = $_SESSION['name'];
    require('include/header.php');
    $query = "SELECT * FROM category";
    $categories = $db->select($query);
    ?>
    <?php
    if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category_id = mysqli_real_escape_string($db->link, $_POST['category_id']);
        $user_id = mysqli_real_escape_string($db->link, $_POST['user_id']);
        if (!isset($title) || $title == '' || !isset($body) || $body == '' || !isset($category_id) || $category_id == '') {
            $_SESSION['error_post'] = "Please Fill in your NewsLetter data";
            header("location:add_post.php");
            exit();
        } else {
            $query = "INSERT INTO posts (title,body,category_id,user_id)
                  VALUES ('$title','$body','$category_id','$user_id')";
            $insert_row = $db->insert($query);
        }
    }

    ?>
    <form method="POST" action="add_post.php">
        <div class="form-group">
            <label>NewsLetter title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Your NewsLetter title ">
        </div>
        <div class="form-group">
            <label>NewsLetter body</label>
            <textarea class="form-control" name="body" placeholder="Enter Your NewsLetter Body">
    </textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <?php while ($row = $categories->fetch_assoc()) :
                    if ($row['id'] == $post['category_id'])
                        $selected = 'selected';
                    else
                        $selected = '';
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="hidden" class="form-control" name="user_id" value=" <?php echo $_SESSION['id'] ?> ">
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add NewsLetter">
            <a href="index.php" class="btn btn-primary">Cancel</a>
            <hr>
        </div>
    </form>

    <?php require('include/footer.php'); ?>
<?php else : ?>
    <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not allowed</strong></div>
<?php endif ?>