<?php 
$sql = "SELECT *FROM vp_categories";
$list = select_list($sql);
if (isset($_POST['submit'])) {
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
           $query= data_to_sql_insert('vp_products',$data);
           exec_update($query);
    $_SESSION['success'] = "<div class='alert alert-success'>Add success</div>";
    // header('localhost:index.php?page=product');
  } else {
    $_SESSION['error'] = "<div class='alert alert-danger'>Không đúng định dạng ảnh</div>";
     // header('localhost:index.php?page=add_product');
  }


}
 ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <div class="col-lg-7">
              <?php if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              } else if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
              } ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Category </label>
                        <select class="form-control" name="cate">
                            <option value="0">Please Choose Category</option>
                          <?php foreach ($list as $key => $value) {
                            echo "<option value='" . $value['cate_id'] . "'>" . $value['cate_name'] . "</option>";
                          } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <span id="check_name"></span>
                        <input class="form-control" name="name" id="name" placeholder="Please Enter Name" required/>

                    </div>
                    <div class="form-group">
                        <label>Name Slug</label>
                        <input class="form-control" name="slug" id="slug" placeholder="Please Enter Name Slug"
                               required/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" name="price" placeholder="Please Enter Price"
                               required/>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input id="img" type="file" name="hinhanh" class="form-control hidden"
                               onchange="changeImg(this)" required>
                        <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
                    </div>
                    <div class="form-group">
                        <label>Warranty</label>
                        <input class="form-control" name="warranty" placeholder="Please Enter Warranty" value="12 month"
                               required/>
                    </div>
                    <div class="form-group">
                        <label>Accessories</label>
                        <input class="form-control" name="accessor" placeholder="Please Enter Password" value="full-box"
                               required/>
                    </div>
                    <div class="form-group">
                        <label>Number</label>
                        <input class="form-control" name="number" type="number" placeholder="Please Enter Password"
                               min="10" max="150" step="10" required/>
                    </div>
                    <div class="form-group">
                        <label>Promotion</label>
                        <input class="form-control" name="promoyion" placeholder="Please Enter Password" required/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <label class="radio-inline">
                            <input name="sta" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="sta" value="2" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<script type="text/javascript" src="js/product.js"></script>