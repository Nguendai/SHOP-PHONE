<?php
session_start();
if ($_SESSION['user1'] ) {
  session_destroy();
  header("location:../index.php");
} else {
  header("location:../index.php");
}
?>