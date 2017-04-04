<!DOCTYPE html>
<html lang="en">
<head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/bootstrap.css">
    <link rel="stylesheet" href="vendor/font-awesome.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/dataTable.css">
    <link rel="stylesheet" type="text/css" href="css/product_list.css">
    <script type="text/javascript" src="vendor/jquery.js"></script>
    
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Admin Nguyễn Đại</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php if (isset($_SESSION['user'])) {
                          echo $_SESSION['user'];
                        } ?></a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="chucnang/user/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="index.php?page=cate_list"><i class="fa fa-bar-chart-o fa-fw"></i> Category</a>

                    </li>
                    <li>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i
                                    class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level panel-collapse collapse" id="collapseTwo" role="tabpanel"
                            aria-labelledby="headingTwo">
                            <li>
                                <a href="index.php?page=product">List Product</a>
                            </li>
                            <li>
                                <a href="index.php?page=add_product">Add Product</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                           aria-controls="collapseExample"><i class="fa fa-bar-chart-o fa-fw"></i> User<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="collapseExample"
                        ">
                    <li>
                        <a href="index.php?page=list_user">List Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
                </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Page Content -->