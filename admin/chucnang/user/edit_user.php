<?php
$id_user = $_GET['id'];
// echo $id_user;
$sql = "SELECT * FROM vp_users Where id=$id_user";
$query = query($sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
  $name = input_post('name');
  $phone = input_post('phone');
  $password = input_post('password');
  $re_pass = input_post('re-password');
  if (isset($name) && isset($phone) && isset($password) && isset($re_pass)) {
    if ($password == $re_pass) {
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $date = date('Y-m-d:h-m-s ');

      $sql = "UPDATE vp_users SET Name='$name',phone='$phone',password='$re_pass',updated_at='$date' Where id=$id_user";
      query($sql);

      header('location:index.php?page=edit_user&id=' . $id_user);
      $_SESSION['success'] = "<div class='alert alert-success'>Đã cập nhật thành công</div>";
    } else {
      $erro = "<span style='color:red'>Mat khau chua khớp</span>";
    }
  }


}
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Users
                    <small><?php echo $row['Name']; ?></small>
                </h1>
            </div>
            <div class="col-lg-7">
              <?php if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
              }

              ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Please Enter Category Name"
                               value="<?php echo $row['email'] ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Please Enter Category Name"
                               value="<?php echo $row['Name'] ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" type="number" placeholder="Please Enter Phone"
                               value="<?php echo $row['phone'] ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Pasword</label>
                        <input class="form-control" type="password" name="password" placeholder="Please Enter Password"
                               value="<?php echo $row['password'] ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Re-password <?php if (isset($erro)) {
                            echo $erro;
                          } ?></label>
                        <input class="form-control" type="password" name="re-password"
                               placeholder="Please Enter Password" value="<?php echo $row['password'] ?>" required/>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
    </div>