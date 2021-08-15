<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
?>
    <?php
    $name = $_SESSION['name'];
    require('include/header.php');
    $query = "SELECT * FROM posts";
    $posts = $db->select($query);

    $query = "SELECT * FROM category";
    $categories = $db->select($query);

    $query = "SELECT * FROM users";
    $users = $db->select($query);
    ?>
    <?php if($posts):?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NewsLetter ID#</th>
                <th scope="col">NewsLetter title</th>
                <th scope="col">Categry</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $posts->fetch_assoc()) :
                $query = "SELECT * FROM users WHERE id=" . $row['user_id'];
                $user = $db->select($query)->fetch_assoc();
                $query = "SELECT * FROM category WHERE id=" . $row['category_id'];
                $category = $db->select($query)->fetch_assoc();
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NewsLetter ID#</th>
                <th scope="col">NewsLetter title
                <th scope="col">Author</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </tbody>
    </table>
   <?php endif ?>
   <?php if($categories):?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Category ID#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $categories->fetch_assoc()) : ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><a href="edit_cat.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                    <td><a href="edit_cat.php?id=<?php echo $row['id']; ?>"><?php echo $row['price']; ?></a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else : ?>
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Category ID#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Price</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                </tr>
        </tbody>
    </table>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">user ID#</th>
                <th scope="col">user Name</th>
                <th scope="col">user email</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = $users->fetch_assoc()) : ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php if ($row['role'] == "user") : ?><a href="edit_user.php?id=<?php echo $row['id']; ?>"><?php endif; ?><?php echo $row['username']; ?><?php if ($row['role'] == "user") : ?></a><?php endif; ?></td>
                    <th scope="row"><?php echo $row['email']; ?></th>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <?php require('include/footer.php'); ?>
<?php else : ?>
    <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not allowed</strong></div>
<?php endif ?>