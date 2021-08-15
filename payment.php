<?php
session_start();
if (isset($_SESSION['email'])) : 
  $myvar = "Test Blog | Home";
  $name = $_SESSION['name'];
  require('include/header.php');
  $email=$_SESSION['email'];
  $query = "SELECT * FROM users WHERE email='$email'";
  $user = $db->select($query)->fetch_assoc();
  if($user['credit']==1){
      ?>
    <form  method="POST" action="index.php" >
    <div class="form-group">
      <label for="exampleInputPassword1">Credit number</label>
      <input type="text" class="form-control" name="credit_name" placeholder="123 094 234 12-45">
    </div>
            <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="true">
            <label class="form-check-label" >Check me if the data is ok</label>
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <?php 
  }
  else if($user['cash']==1)
  {
    ?>
    <form method="POST" action="index.php" >
    <div class="form-group">
      <label for="exampleInputPassword1">Address</label>
      <input type="text" class="form-control" name="address" placeholder="25 street Oct way">
    </div>
        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="true">
        <label class="form-check-label" >Check me if the data is ok</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <?php 
  }
  ?> 
  <?php require('include/footer.php'); ?>
  <?php else : ?>
    <div class="danger" style="background-color: darkred; color:aliceblue; width:200px; height:30px;"> <strong>You are not
        allowed</strong></div>
  <?php endif ?>