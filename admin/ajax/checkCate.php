<?php
include('../lib/connect.php');

$cate_name = input_post('cate_name');
// echo $cate_name;
$sql = "SELECT * FROM vp_categories where cate_name='$cate_name'";
$row = select_one($sql);
$name1 = strtolower($row['cate_name']);
$name2 = strtolower($cate_name);
if ($name1 == $name2) {
  echo "bitrung";
} else {
  echo "ok";
}

// echo $sql;


?>