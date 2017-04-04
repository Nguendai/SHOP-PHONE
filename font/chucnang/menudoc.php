<?php
$sql = "SELECT * FROM vp_categories";
$list_cate = select_list($sql);
$sql1 = "SELECT * FROM vp_products Where prod_status=1 ORDER BY prod_id LIMIT 1";
$rowNew = select_one($sql1);
$sql2 = "SELECT * FROM vp_products Where number <10 ORDER BY prod_id DESC LIMIT 1";
$rowDB = select_one($sql2);
?>


<!-- menu right -->
<div class="col-md-3">
    <h3 class="side-heading"><font><font>Category</font></font></h3>
    <ul class="list-group">
      <?php foreach ($list_cate as $key => $value) {
        ?>

          <li class="list-group-item"><a href="index.php?page=category&id=<?php echo $value['cate_id']; ?>"><i
                          class="fa fa-chevron-right"></i>
              <?php echo $value['cate_name'] ?> </a></li>
        <?php
      } ?>
    </ul>


    <div class="product-new">

        <!-- Product #1 Starts -->
        <h3 class="side-heading"><font><font>Product New</font></font></h3>
        <div class="thumbnail heading">
            <div class="image">
                <a href="index.php?page=chitiet&id=<?php echo $rowNew['prod_id']; ?>"> <img
                            src="img/<?php echo $rowNew['prod_img']; ?>" alt="product" class="img-responsive"></a>
            </div>
            <div class="caption">
                <h4>
                    <a href="index.php?page=chitiet&id=<?php echo $rowNew['prod_id']; ?>"><?php echo $rowNew['prod_name'] ?></a>
                </h4>
                <div class="description">
                   <?php   echo $rowNew['prod_description'] ?>
                </div>
                <div class="moive">
                   <img src="img/new.png" alt="">
                </div>
                <div class="price">
                    <span class="price-new">$ <?php echo $rowNew['prod_price'] ?></span>
                    <span class="price-old">$<?php echo $rowNew['prod_price'] * 10 / 100; ?></span>
                </div>
                <div class="cart-button button-group">
                    <button type="button" class="btn btn-wishlist" data-toggle="tooltip" title="Thích">
                        <i class="fa fa-heart"></i>
                    </button>
                    <button type="button" class="btn btn-compare" data-toggle="tooltip" title="Biểu đồ">
                        <i class="fa fa-bar-chart-o"></i>
                    </button>
                    <button type="button" class="btn btn-cart">
                        <a href="index.php?page=chitiet&id=<?php echo $rowNew['prod_id'] ?>">See details
                            <i class="fa fa-eye" aria-hidden="true"></i></a>
                    </button>
                </div>
            </div>
        </div> <!-- Product #1 Ends -->

    </div>
    <div class="product-hot">

        <!-- Product #1 Starts -->
        <h3 class="side-heading"><font><font>BESTSELLERS</font></font></h3>
        <div class="thumbnail heading">
            <div class="image">
                <a href="index.php?page=chitiet&id=<?php echo $rowDB['prod_id'] ?>"> <img
                            src="img/<?php echo $rowDB['prod_img'] ?>" alt="product" class="img-responsive"></a>
            </div>
            <div class="caption">
                <h4>
                    <a href="index.php?page=chitiet&id=<?php echo $rowDB['prod_id'] ?>"><?php echo $rowDB['prod_name'] ?></a>
                </h4>
                <div class="description">
                    Cơ hội trúng xe SH150i 2017 khi mua iPhone tại Hà Nội, Đà Nẵng .....
                </div>
                <div class="hot">
                    <img src="img/hot3.png" style="width:30%;" alt="">
                </div>
                <div class="price">
                    <span class="price-new">$<?php echo $rowDB['prod_price'] ?></span>
                    <span class="price-old">$<?php echo $rowDB['prod_price'] * 10 / 100 ?></span>
                </div>
                <div class="cart-button button-group">
                    <button type="button" class="btn btn-wishlist" data-toggle="tooltip" title="Thích">
                        <i class="fa fa-heart"></i>
                    </button>
                    <button type="button" class="btn btn-compare" data-toggle="tooltip" title="Biểu đồ">
                        <i class="fa fa-bar-chart-o"></i>
                    </button>
                    <button type="button" class="btn btn-cart">
                        <a href="index.php?page=chitiet&id=<?php echo $rowDB['prod_id'] ?>">See details
                            <i class="fa fa-eye" aria-hidden="true"></i></a>
                    </button>
                </div>
            </div>
        </div> <!-- Product #1 Ends -->

    </div>
</div>