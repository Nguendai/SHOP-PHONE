<?php
require('class.phpmailer.php');
require('class.smtp.php');
require('PHPMailerAutoload.php');
if (isset($_POST['submit'])) {

  $email_ss = $_SESSION['user1'];
  // echo $email_ss;
  $sql = "SELECT * FROM vp_users WHERE email='$email_ss'";
  // echo $sql;
  $row_kh = select_one($sql);
  // $name=input_post('name');

  $error = array();
  if ($_POST['email'] != $row_kh['email']) {
    $error[] = "Email không phải của bạn";
    // echo "123";
  } else {
    $email = input_post('email');
  }
  $phone = input_post('phone');
  $name = input_post('name');
  $dc = input_post('diachi');
  // die;
  $list = '';
  if (!empty($_SESSION['cart'])) {


    $arrayCart = array();
    foreach ($_SESSION['cart'] as $key => $value) {
      $arrayCart[] = $key;
    }
    $strId = implode(',', $arrayCart);
    $sql = "SELECT * FROM vp_products WHERE prod_id IN($strId) ORDER BY prod_id DESC";
    $list_cart = select_list($sql);


    if (isset($email) && isset($phone) && isset($name) && isset($dc)) {

  



      $list .= '<p>
        <b>Khách hàng:</b> ' . $name . '<br />
        <b>Email:</b> ' . $email . '<br />
        <b>Điện thoại:</b> ' . $phone . '<br />
        <b>Địa chỉ:</b> ' . $dc . '
        </p>';
      $list .= '<table border="1px" cellpadding="10px" cellspacing="1px"
            width="100%">
            <tr>
            <td align="center" bgcolor="#3F3F3F" colspan="4"><font
            color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
            </tr>
            <tr id="invoice-bar">
            <td width="45%"><b>Product Details</b></td>
            <td width="20%"><b>số luong</b></td>
            <td width="15%"><b>Price</b></td>
            <td width="20%"><b>Total</b></td>
            </tr>';
      $sub_total = 0;
      foreach ($list_cart as $key => $value) {
        $prod_id = $value['prod_id'];
        $soluong = $value['number'];

        $sl = $_SESSION['cart'][$prod_id];
        $slcon=$soluong-$sl;
        $total = $_SESSION['cart'][$prod_id] * $value['prod_price'];
           


        $list .= '<tr>
                <td class="prd-name">' . $value['prod_name'] . '</td>
                <td class="prd-number">' . $sl . '</td>
                <td class="prd-price"><font color="#C40000"> $' . $value['prod_price'] . '
                </font></td>
                
                <td class="prd-total"><font color="#C40000">' . $total . '
                </font></td>
                </tr>';
        $sub_total += $total;

      }
      $list .= '<tr>
            <td class="prd-name">Tổng giá trị hóa đơn là:</td>
            <td colspan="2"></td>
            <td class="prd-total"><b><font color="#C40000"> $' . $sub_total . '
           </font></b></td>
            </tr>
            </table>';
      // echo $email.$phone;
      $nFrom = "daimobile";    //mail duoc gui tu dau, thuong de ten cong ty ban
      $mFrom = 'dainv320@gmail.com';  //dia chi email cua ban
      $mPass = 'davias123';       //mat khau email cua ban
      $nTo = $name; //Ten nguoi nhan
      $mTo = $email;   //dia chi nhan mail
      $mail = new PHPMailer();
      $body = $list;   // Noi dung email
      $title = 'Hướng dẫn gửi mail bằng PHPMailer';   //Tieu de gui mail
      $mail->IsSMTP();
      $mail->CharSet = "utf-8";
      $mail->SMTPDebug = 0;   // enables SMTP debug information (for testing)
      $mail->SMTPAuth = true;    // enable SMTP authentication
      $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465;         // cong gui mail de nguyen
      // xong phan cau hinh bat dau phan gui mail
      $mail->Username = $mFrom;  // khai bao dia chi email
      $mail->Password = $mPass;              // khai bao mat khau
      $mail->SetFrom($mFrom, $nFrom);
      // $mail->AddReplyTo('info@freetuts.net', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
      $mail->Subject = $title;// tieu de email
      $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
      $mail->AddAddress($mTo, $nTo);
      // thuc thi lenh gui mail
      if (!$mail->Send()) {
        echo $mail->ErrorInfo;
        // echo $mail->ErrorInfo;
        echo !extension_loaded('openssl') ? "Not Available" : "Available";
        // echo $mail-> ERROR;
        echo 'Co loi!';

      } else {
        $data = array('number' =>$slcon );
        $query=data_to_sql_update('vp_products',$data).'where prod_id='.$prod_id;
        exec_update($query);
        unset($_SESSION['cart']);

        echo '<script>

            alert("Đặt hàng thành công mời bạn vào mail check");

        </script>';
      }
    }

  }
}



?>

    <link rel="stylesheet" href="css/cart.css">
<!-- conten -->
<div id="main-container" class="container">
    <div class="row">
        <!-- menu left -->
      <?php
      include('chucnang/menudoc.php');
      ?>


        <!-- end menu left -->
        <!--  main-cart -->
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="index.php?page=home"><font><font>Home</font></font></a></li>
                <li><a href="#" class="active"><font><font class="">Cart</font></font></a></li>
                <!-- <li class="active"><font><font class="">Product</font></font></li> -->
            </ol>
            <div class="table-responsive shopping-cart-table">
              <?php if (!empty($_SESSION['cart'])) {
                

                $arrayCart = array();
                foreach ($_SESSION['cart'] as $key => $value) {
                  $arrayCart[] = $key;
                }
                $strId = implode(',', $arrayCart);
                $sql = "SELECT * FROM vp_products WHERE prod_id IN($strId) ORDER BY prod_id DESC";
                $list_cart = select_list($sql); ?>
                  <table class="table table-bordered">
                      <thead>
                      <tr>
                          <td class="text-center">
                              <p>Image</p>
                          </td>
                          <td class="text-center">
                              <p>Product Details</p>
                          </td>
                          <td class="text-center">
                              <p>Quantity</p>
                          </td>
                          <td class="text-center">
                              <p>Price</p>
                          </td>
                          <td class="text-center">
                              <p>Total</p>
                          </td>
                          <td class="text-center">
                              <p>Action</p>
                          </td>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sub_total = 0;
                      foreach ($list_cart as $key => $value) {
                        $prod_id = $value['prod_id'];
                        $sl = $_SESSION['cart'][$prod_id];
                        $total = $_SESSION['cart'][$prod_id] * $value['prod_price'];
                        
                        ?>
                          <tr>
                              <td class="text-center" style="width: 52%;"
                              >
                                  <a href="index.php?page=chitiet&id=<?php echo $prod_id; ?>">
                                      <img src="img/<?php echo $value['prod_img'] ?>" style="width: 230px;"
                                           alt="Product Name" title="Product Name" class="img-thumbnail">
                                  </a>
                              </td>
                              <input type="text" class="hide" id='prod_id' value="<?php echo $prod_id ?>">
                              <td class="text-center">
                                  <a href="index.php?page=chitiet&id=<?php echo $prod_id; ?>"><?php echo $value['prod_name'] ?></a>
                              </td>
                              <form method="post">
                              <td class="text-center">
                                  <div class="input-group btn-block">
                                      <input type="text" name="quantity" id="quantity" value="<?php echo $sl; ?>"
                                             size="1" class="form-control">
                                  </div>
                              </td>
                              <td class="text-center">
                                  $<?php echo $value['prod_price']; ?>
                              </td>
                              <td class="text-center">
                                  $<?php echo $total; ?>
                              </td>
                              <td class="text-center">
                                  <button type="submit" title="" name="update" id="update" class="btn btn-default tool-tip"
                                          data-original-title="Update">
                                      <i class="fa fa-refresh"></i>
                                  </button>
                                </form>
                                  <button type="button" title="" class="btn btn-default tool-tip"
                                          data-original-title="Remove">
                                      <a href="chucnang/delete_cart.php?id=<?php echo $prod_id; ?>"><i
                                                  class="fa fa-times-circle"></i></a>
                                  </button>
                              </td>
                          </tr>
                        <?php
                        $sub_total += $total;

                      }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                          <td colspan="4" class="text-right">
                              <strong>Total :</strong>
                          </td>
                          <td colspan="2" class="text-left">
                              $ <?php echo $sub_total; ?>
                          </td>
                      </tr>
                      </tfoot>
                  </table>
                <?php
              } else {
                echo ' <div class="alert alert-warning">
                              <strong>Warning!</strong> Indicates a warning that might need attention.
                            </div>';
              } ?>
            </div>
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Shipping &amp; Taxes
                    </h3>
                  <?php
                  if (!empty($error)) {
                    echo "<div class='alert alert-danger' >";
                    foreach ($error as $key => $value) {

                      echo $value . '</br>';
                    }
                    echo "</div>";
                  }

                  ?>
                </div>


                <div class="panel-body">


                    <!-- Form Starts -->
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label for="inputFname" class="col-sm-3 control-label">First Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputFname" name="name"
                                       placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="col-sm-3 control-label">Phone :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress1" class="col-sm-3 control-label">Address :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputAddress" placeholder="Address"
                                       name="diachi" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="submit" class="btn btn-warning">
                                    Pay Shopping
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Form Ends -->
                </div>
            </div>
        </div>
    </div>

</div>
<!--end conten-->
<script type="text/javascript" src="js/cart.js"></script>




  