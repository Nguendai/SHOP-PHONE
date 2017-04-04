<?php
session_start();
include_once('lib/connect.php');

if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
  include_once('chucnang/quantri.php');

} else {
  include_once('chucnang/user/login.php');
}
?>