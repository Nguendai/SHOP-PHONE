<?php
include('../lib/connect.php');
$email = input_post("email1");
$sql = "SELECT * FROM vp_users Where email='$email'";
$row = get_rows($sql);
if ($row > 0) {
  echo " tai khoan đã tồn tại";
} else {
  echo "ok";
}
?>