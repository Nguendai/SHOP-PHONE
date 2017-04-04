<?php
include('../lib/connect.php');
$name_dk = input_post("name_dk");
$pass_dk = input_post("pass_dk");
$phone = input_post("phone");
$email = input_post("email");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d:h-m-s ');
$sql = "INSERT INTO vp_users(email,phone,Name,password,level,created_at,updated_at) VALUES('$email','$phone','$name_dk',md5($pass_dk),2,'$date','$date')";
$query = query($sql);
if ($query == 1) {
  echo "ok";
} else {
  echo "không thuc thi duoc";
}


?>