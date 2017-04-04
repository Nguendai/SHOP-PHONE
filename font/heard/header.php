<!DOCTYPE html>
<html lang="en">
<head>
    <title> NguyenDai MoBile </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="vendor/jquery.js"></script>
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <!-- <script type="text/javascript" src="js/index1.js"></script> -->
    <link rel="stylesheet" href="vendor/bootstrap.css">
    <link rel="stylesheet" href="vendor/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/category.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">
</head>
<body>
<!--header-->
<div class="header">
    <div class="khoi1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-6 col-xs-12 ">
                    <div class="right">
                        <ul>
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-home" title="Home"></i>
                                    <span class="hidden-sm hidden-xs ">
                             Home
                           </span>
                                </a>
                            </li>
                            <li>
                                <a <?php if(isset($_SESSION['user1'])){echo 'href="index.php?page=cart"';}else{
                                   echo 'data-toggle="modal" class="myModal" data-target="#myModalDN"';
                                  } ?> >
                                    <i class="fa fa-shopping-cart" title="Wish List"></i>
                                    <span class="hidden-sm hidden-xs ">
                            Cart
                           </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone" title="Wish List"></i>
                                    <span class="hidden-sm hidden-xs ">
                            Contact
                           </span>
                                </a>
                            </li>
                          <?php

                          if (isset($_SESSION['user1'])) {

                            include('heard/login_sussec.php');
                          } else {

                            include('login/login.php');
                            include('login/register.php');
                          }
                          ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top -->
  <?php include('chucnang/navCart.php');
  include('chucnang/menu.php');

  ?>

</div>