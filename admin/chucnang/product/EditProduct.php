<?php
$id = $_GET['id'];
$sql2 = "SELECT * FROM vp_products where prod_id=$id ";
$row = select_one($sql2);
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
  // echo $ran;()
  $hinhanh = $ran . $_FILES['hinhanh']['name'];
  $hinhanh1 = $_FILES['hinhanh']['name'];
  $file = $_FILES['hinhanh']['tmp_name'];
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $date = date('Y-m-d-h-i-s');
  if ($hinhanh1 != null) {
    $check = $row['prod_name'];
    $sql = "SELECT * FROM vp_products Where prod_name !='$check' AND prod_name='$name'";
    $checkName = get_rows($sql);
    if ($checkName == 0) {
      if (preg_match('/(jpg)|(jpe)|(png)/', $hinhanh)) {
        $uploaded_file = move_uploaded_file($file, '../font/img/' . $hinhanh);
        $data = array('prod_name' => $name, 'prod_slug' => $slug, 'prod_price' => $price, 'prod_img' => $hinhanh, 'prod_warranty' => $warranty, 'prod_accessories' => $accessor, 'number' => $number, 'prod_promotion' => $promoyion, 'prod_status' => $sta, 'prod_description' => $description, 'prod_cate' => $cate, 'updated_at' => $date);
        $sql1 = data_to_sql_update('vp_products', $data) . ' where prod_id=' . $id;
        exec_update($sql1);
        $_SESSION['success'] = "<div class='alert alert-success'>Edit success</div>";
      } else {
        $_SESSION['error'] = "<div class='alert alert-danger'>Không đúng định dạng ảnh</div>";
      }
    } else {
      $_SESSION['error1'] = "<span style='color:red' >Tên đã tồn tại</span>";
    }
  } else {
    $data = array('prod_name' => $name, 'prod_slug' => $slug, 'prod_price' => $price, 'prod_warranty' => $warranty, 'prod_accessories' => $accessor, 'number' => $number, 'prod_promotion' => $promoyion, 'prod_status' => $sta, 'prod_description' => $description, 'prod_cate' => $cate, 'updated_at' => $date);
    $sql1 = data_to_sql_update('vp_products', $data) . ' where prod_id=' . $id;
    // echo $sql1;die;
    exec_update($sql1);
    $_SESSION['success'] = "<div class='alert alert-success'>Edit success</div>";
  }

}


?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small><?php if(isset($name)){echo $name;}else{ echo $row['prod_name'];} ?></small>
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

                <form action="" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="form-group">
                        <label>Category </label>
                        <select class="form-control" name="cate">
                          <?php foreach ($list as $key => $value) {
                            ?>
                              <option <?php if ($row['prod_cate'] == $value['cate_id']) {
                                echo "selected";
                              } ?>
                                      value=<?php echo $value['cate_id'] ?>><?php echo $value['cate_name'] ?></option>


                          <?php } ?>


                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label><?php if (isset($_SESSION['error1'])) {
                        echo $_SESSION['error1'];
                        unset($_SESSION['error1']);
                      } ?>
                        <input class="form-control" name="name" placeholder="Please Enter Name"
                               value="<?php if(isset($name)){echo $name;}else{ echo $row['prod_name'];} ?>" required/>

                    </div>
                    <div class="form-group">
                        <label>Name Slug</label>
                        <input class="form-control" name="slug" placeholder="Please Enter Name Slug"
                               value="<?php if(isset($slug)){echo $slug;}else{ echo $row['prod_slug'];} ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" name="price" placeholder="Please Enter Price"
                               value="<?php if(isset($price)){echo $price;}else{ echo $row['prod_price'];} ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input id="img" type="file" name="hinhanh" class="form-control hidden"
                               onchange="changeImg(this)" required>
                        <img id="avatar" class="thumbnail" width="300px"
                             src="../font/img/<?php  echo $row['prod_img']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Warranty</label>
                        <input class="form-control" name="warranty" placeholder="Please Enter Warranty" value="12 month"
                               value="<?php if(isset($warranty)){echo $warranty;}else{ echo $row['prod_warranty'];} ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Accessories</label>
                        <input class="form-control" name="accessor" placeholder="Please Enter Password" value="full-box"
                               value="<?php if(isset($accessor)){echo $accessor;}else{echo $row['prod_accessories'];} ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Number</label>
                        <input class="form-control" name="number" type="number" placeholder="Please Enter Password"
                               min="10" max="150" step="10" value="<?php if(isset($number)){echo $number;}else{ echo $row['number'];} ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Promotion</label>
                        <input class="form-control" name="promoyion" placeholder="Please Enter Password"
                               value="<?php if(isset($promoyion)){echo $promoyion;}else{ echo $row['prod_promotion'] ;}?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" value=""
                                  required><?php if(isset($description)){echo $description;}else{ echo $row['prod_description'];} ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <label class="radio-inline">
                            <input <?php if ($row['prod_status'] == 1) {
                              echo 'checked=checked';
                            } ?>
                                    name="sta" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="sta" <?php if ($row['prod_status'] == 0) {
                              echo 'checked=checked';
                            } ?> value="0" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Edit Product</button>
                    <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(reader);
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {
        $('#avatar').click(function () {
            $('#img').click();
        });
    });
</script>
<!-- /#page-wrapper -->
