<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION['email']);
unset($_SESSION["role"]);
unset($_SESSION["success"]);
header("Location:login.php");
