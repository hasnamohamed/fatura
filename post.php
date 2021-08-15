<?php
session_start();
if (isset($_SESSION['email'])) :
?>

  <?php
  $myvar = "Test Blog | NewsLetter";
  $name = $_SESSION['name'];
  require('include/header.php');
  $id = $_GET['id'];
  $query = "SELECT * FROM posts WHERE id=" . $id;
  $post  = $db->select($query)->fetch_assoc();

  $query = "SELECT * FROM category";
  $categories = $db->select($query);

  $query = "SELECT * FROM users WHERE id=" . $post['user_id'];
  $user = $db->select($query)->fetch_assoc();
  ?>

  <div class="blog-post">
    <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
    <p class="blog-post-meta"><?php echo $post['date']; ?> by <a href="#"><?php echo $user['username']; ?></a></p>
    <p><?php echo $post['body']; ?></p>
  </div>


  <?php require('include/footer.php'); ?>
<?php else : ?>
  <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not
      allowed</strong></div>
<?php endif ?>