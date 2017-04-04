<?php
include('../lib/connect.php');

$name = input_post('name');
// echo $name;
$sql = "SELECT * FROM vp_products where prod_name='$name'";
$row = select_one($sql);
$name1 = strtolower($row['prod_name']);
$name2 = strtolower($name);
if ($name1 == $name2) {
  echo "bitrung";
} else {
  echo "ok";
}
// echo $sql;


?>