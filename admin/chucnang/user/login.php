<!DOCTYPE html>
<html lang="en">
<head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <link rel="stylesheet" href="vendor/bootstrap.css">
    <link rel="stylesheet" href="vendor/font-awesome.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body>
<?php
// echo "a";
if (isset($_POST['submit1'])) {
  $email = input_post('email');
  $password = input_post('password');
  $password1 = md5($password);
  $sql = "SELECT * FROM vp_users WHERE email='$email'and level=1";
  $row = select_one($sql);
  if ($email != $row['email']) {
    $_SESSION['erro'] = '<div class="alert alert-danger">Tài khoản không hợp lệ </div>';
  } else if ($password1 != $row['password']) {
    $_SESSION['erro'] = '<div class="alert alert-danger">Mật khẩu không hợp lệ </div>';

  } else {
    $_SESSION['user'] = $email;
    $_SESSION['pass'] = $password;
    header('location:index.php');
  }


  // if($row >0){
  // 	$_SESSION['user']=$email;
  // 	$_SESSION['pass']=$password;
  // 	header('location:index.php');
  // }else{
  // 	$erro='<div class="alert alert-danger">Tài khoản không hợp lệ </div>';
  // }

  // header('location:chucnang/quantri.php');
}


?>


<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                          <?php if (isset($_SESSION['erro'])) {
                            echo $_SESSION['erro'];
                            unset($_SESSION['erro']);
                          } ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" id="email"
                                       required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       required>
                            </div>

                            <button name="submit1" class="btn btn-primary">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>

</body>
</html>
