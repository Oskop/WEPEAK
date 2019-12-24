<?php
// Initialize the session
session_start();
require_once 'controller/log_helper.php';
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if ($_SESSION['role'] == "user") {
    header('location: public/');
    exit;
  } else {
    header('location: view/');
    exit;
  }
} else {
  header("location: public/");
  exit;
}
?>
