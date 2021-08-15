<?php
require 'library/connection.php';
require('config/config.php');
$con = new Database();
session_start();
//check if form is submitted
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($con->link, $_POST['username']); //remove any harmfull inputs like html tags and others
  $d=$_POST['d'];
  $w=$_POST['w'];
  $m=$_POST['m'];
  $credit=$_POST['credit'];
  $cash=$_POST['cash'];
  $date = date('m/d/Y h:i:s', time());
  $email = mysqli_real_escape_string($con->link, $_POST['email']); //remove any harmfull inputs like html tags and others
  $password = mysqli_real_escape_string($con->link, $_POST['password']); //remove any harmfull inputs like html tags and others
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $role = "user";
  //validate
  if (!isset($username) || $username == '' || !isset($password) || $password == '' || !isset($email) || $email == ''||(!isset($d)&&!isset($w)&&!isset($m)) ||(!isset($credit)&&!isset($cash))) {
    $error = "Please fill in your Data";
    $_SESSION['error'] = $error;
    header("location:register.php");
    exit();
  } else {
    $sql = "SELECT * FROM users where email='$email'";
    $result = mysqli_query($con->link, $sql);
    $row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows >= 1) {
      $error = "this email is exist Please Login or use another email";
      $_SESSION['error'] = $error;
      header("location:register.php");
      exit();
    }
     else {
        if(isset($d)){
          // $query = "SELECT * FROM category WHERE name='Daily'";
          //  $categories = $db->select($query)->fetch_assoc();
          //  $price =$categories['price'];
            if(isset($credit)){
            $query = "INSERT INTO users (username,password,email,role,d,credit)
                      VALUES ('$username', '$hashed_password', '$email','$role',1,1)";
            }
            else if(isset($cash))
            {
              $query = "INSERT INTO users (username,password,email,role,d,cash)
              VALUES ('$username', '$hashed_password', '$email', '$role',1,1)";
            }
        }
     else if(isset($w)){
           $w=$_POST['ww'];
            if(isset($credit)){
            $query = "INSERT INTO users (username,password,email,role,w,credit)
                      VALUES ('$username', '$hashed_password', '$email', '$role',1,1)";
            }
            else if(isset($cash))
            {
              $query = "INSERT INTO users (username,password,email,role,w,cash)
              VALUES ('$username', '$hashed_password', '$email', '$role',1,1)";
            
            }
      }
    else if(isset($m)){
      $m=$_POST['mm'];
      if(isset($credit)){
        $query = "INSERT INTO users (username,password,email,role,m,credit)
                  VALUES ('$username', '$hashed_password', '$email', '$role',1,1)";
        }
        else if(isset($cash))
        {
          $query = "INSERT INTO users (username,password,email,role,m,cash)
          VALUES ('$username', '$hashed_password', '$email', '$role',1,1)";
        
        }
               
              }
     $_SESSION["name"]=$username;
     $_SESSION["email"]=$email;
     $_SESSION["role"]=$role;
     $_SESSION["seccess"]="Welcome !";
    $insert_row = $con->insert($query);
    }
  }
}