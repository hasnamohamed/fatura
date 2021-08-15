<?php
session_start();
require('library/connection.php');
require('config/config.php');
$con = new Database();
if (isset($_SESSION["id"])) {
    header("Location:index.php");
} else {
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con->link, $_POST['email']); //remove any harmfull inputs like html tags and others
        $password = mysqli_real_escape_string($con->link, $_POST['password']); //remove any harmfull inputs like html tags and others
        //validate

        if (!isset($email) || $email == '' || !isset($password) || $password == '') {
            $error = "Please fill in your Data";
            $_SESSION['error'] = $error;
            header("location:login.php");
            exit();
        } else {
            if(!empty($_POST["remember"])) {
                setcookie ("email",$_POST["email"],time() +(10 * 365 * 24 * 60 * 60));
                setcookie ("password",$_POST["password"],time() +(10 * 365 * 24 * 60 * 60));
            } else {
                setcookie("email","");
                setcookie("password","");
            }
            $sql = "SELECT * FROM users WHERE email = '$email'" ;
            $user = $con->select($sql)->fetch_assoc();
            $result =  $con->select($sql);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row
            if ($count == 1  && password_verify($_POST['password'], $user['password']) ) {
                if (is_array($row)) {
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["name"] = $row['username'];
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["role"] = $row['role'];
                }
                $_SESSION['success'] = "Welcome Back!";
                header("location:index.php");
            } 
            else {
                $error = "Your Login Name or Password is invalid";
                $_SESSION['error'] = $error; 
              
                header("location:login.php");
            }
        
        }
        
    }
}
