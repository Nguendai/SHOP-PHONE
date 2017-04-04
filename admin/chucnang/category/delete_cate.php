<?php
session_start();
include('../../lib/connect.php');

$id = $_GET['id'];

// echo $_SESSION['user'];
if (isset($_SESSION['user'])) {

  $sql = "DELETE FROM vp_categories WHERE cate_id=$id";
  echo $sql;
  exec_update($sql);
  header('location:../../index.php?page=cate_list');
}


?>