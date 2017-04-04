<?php
$sql = "SELECT *FROM vp_categories";
$lisst_cate = select_list($sql);
?>
<!-- Main Menu Starts -->
<nav id="main-menu" class="navbar" role="navigation">
    <div class="container">
        <!-- Nav Header Starts -->
        <div class="navbar-header">
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-cat-collapse">
                <span class="sr-only">Phone Shop</span>
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Nav Header Ends -->
        <!-- Navbar Cat collapse Starts -->
        <div class="collapse navbar-collapse navbar-cat-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Phone &amp; Shop</a></li>
              <?php foreach ($lisst_cate as $key => $value) {
                ?>
                  <li>
                      <a href="index.php?page=category&id=<?php echo $value['cate_id'] ?>"><?php echo $value['cate_name'] ?></a>
                  </li>
                <?php
              } ?>
                <li><a href="">Accessories </a></li>

            </ul>
        </div>
        <!-- Navbar Cat collapse Ends -->
    </div>
</nav>
<!-- Main Menu Ends -->