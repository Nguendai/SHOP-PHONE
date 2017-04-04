<?php
include('../../lib/connect.php')

  $cate = input_post('cate');
  $name = input_post('name');
  $slug = input_post('slug');
  $price = input_post('price');
  $warranty = input_post('warranty');
  $accessor = input_post('accessor');
  $promoyion = input_post('promoyion');
  $description = input_post('description');
  $number = input_post('number');
  $sta = input_post('sta');
  $ran = rand(1, 999);
  $hinhanh = $ran . $_FILES['hinhanh']['name'];
  $file = $_FILES['hinhanh']['tmp_name'];
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $date = date('Y-m-d-h-m-s');

  if (preg_match('/(jpg)|(jpe)|(png)/', $hinhanh)) {
    $uploaded_file = move_uploaded_file($file, '../font/img/' . $hinhanh);
    $data = array('prod_name' => $name, 'prod_slug' => $slug, 'prod_price' => $price, 'prod_img' => $hinhanh, 'prod_warranty' => $warranty, 'prod_accessories' => $accessor, 'number' => $number, 'prod_promotion' => $promoyion, 'prod_status' => $sta, 'prod_description' => $description, 'prod_cate' => $cate, 'created_at' => $date, 'updated_at' => $date);

    $_SESSION['success'] = "<div class='alert alert-success'>Add success</div>";
    header('localhost:index.php?page=product');
  } else {
    $_SESSION['error'] = "<div class='alert alert-danger'>Không đúng định dạng ảnh</div>";
     header('localhost:index.php?page=add_product');
  }



?>