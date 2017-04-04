<!-- <li> -->
<!-- <ul class="nav navbar-top-links navbar-right"> -->
<!-- /.dropdown -->
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="#"><i class="fa fa-user fa-fw"></i><?php if (isset($_SESSION['user1'])) {
              echo $_SESSION['user1'];
            } ?> </a>
        </li>
        <li class="divider"></li>
        <li><a href="login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</<!-- ul>
</li> -->