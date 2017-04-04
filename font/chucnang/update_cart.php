<?php
include('../lib/connect.php');
session_start();
$quantity = input_post('quantity');
$prod_id = input_post('prod_id');
if ($quantity == 0) {
  unset($_SESSION['cart'][$prod_id]);
} else {

  $_SESSION['cart'][$prod_id] = $quantity;
}
var_dump($_SESSION['cart']);


?>