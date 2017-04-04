<?php
session_start();
include('../lib/connect.php');
$username = input_post("USERNAME");
$password = input_post("PASSWORD");
$password1 = md5($password);

$sql = "SELECT * FROM vp_users WHERE email='$username' and password='$password1' and level=2";
$row = get_rows($sql);
if ($row > 0) {
  $_SESSION['user1'] = $username;
  $_SESSION['pass1'] = $password;
  echo "ok";
} else {
  echo "tài khoản không tồn tại";
}


?>