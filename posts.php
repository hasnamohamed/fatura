<?php
session_start();
if (isset($_SESSION['email'])) :
?>

    <?php
    $myvar = "Test Blog | Home";
    $name = $_SESSION['name'];
    require('include/header.php');

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $query = "SELECT * FROM posts WHERE category_id =" . $category;
        $posts = $db->select($query);
    } else {
        $query = "SELECT * FROM posts";
        $posts = $db->select($query);
    }
    $query = "SELECT * FROM category";
    $categories = $db->select($query);
    ?>

    <?php if ($posts) :
        while ($row = $posts->fetch_assoc()) :
            $query = "SELECT * FROM users WHERE id=" . $row['user_id'];
            $user = $db->select($query)->fetch_assoc();
    ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                <p class="blog-post-meta"><?php echo $row['date']; ?> by <a href="#"><?php echo $user['username']; ?></a></p>
                <p><?php echo shortenText($row['body']); ?></p>
                <a href="post.php?id=<?php echo urlencode($row['id']); ?>" class="readmore">Read More</a>
            </div><!-- /.blog-post -->
        <?php
        endwhile;
    else : ?>
        <p>There are no NewsLetter yet</p>
    <?php endif; ?>
    <?php require('include/footer.php'); ?>
<?php else : ?>
    <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not
            allowed</strong></div>
<?php endif ?>