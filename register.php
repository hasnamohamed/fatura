<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <title>"Test Blog | Register""</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>
    <div id="frm">
        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
            </div>
        <?php
        }
        unset($_SESSION['error']);
        ?>
        <?php 
        // require('library/connection.php');
        // $con = new Database();
        // $query = "SELECT * FROM category";
        // $categories = $con->select($query)->fetch_assoc();
         ?>
        <form method="POST" action="registerProcess.php">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            Please till us the interval you want
            <div class="form-group">
                <input type="checkbox" aria-label="Checkbox for following text input" name="d">
                <label>Daily </label>
                <button type="button" class="btn btn-primary" name="dd"><?php echo rand(10, 30);  ?></button>
            </div>
            <div class="form-group">
                <input type="checkbox" aria-label="Checkbox for following text input" name="w">
                <label>Weekly </label>
                <button type="button" class="btn btn-primary" name="ww"><?php echo rand(30, 60); ?></button>
            </div>
            <div class="form-group">
                <input type="checkbox" aria-label="Checkbox for following text input" name="m">
                <label>Monthly </label>
                <button type="button" class="btn btn-primary" name="mm"><?php echo rand(60, 100); ?></button>
            </div>
            Please till us the way to pay
            <div class="form-group">
                <input type="checkbox" aria-label="Checkbox for following text input" name="credit">
                <label>Credit With discount 20%</label>
                <br>
                <input type="checkbox" aria-label="Checkbox for following text input" name="cash">
                <label>Cash </label>
            </div>
            <input class="btn btn-primary" type="submit" value="Register" name="submit" id="submit">
        </form>
    </div>
    <footer class="blog-footer">
        <p>Test Blog built for <strong>FATURA</strong> . &copy 2021</p>
    </footer>
</body>

</html>