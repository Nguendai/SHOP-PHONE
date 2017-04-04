<?php
$sql = "SELECT * FROM vp_products  ORDER BY prod_id DESC LIMIT 4";
$resultNew = select_list($sql);
$sql = "SELECT *FROM vp_products Where number <10 ORDER BY prod_id LIMIT 4";
$resultDB = select_list($sql);
?>

<!-- 3 Column Banners Starts -->
<div class="col3-banners">
    <div class="container">
        <ul class="row list-unstyled">
            <li class="col-sm-4">
                <img src="img/mobile1.png" alt="banners" class="img-responsive">
            </li>
            <li class="col-sm-4">
                <img src="img/mobile4.png" alt="banners" class="img-responsive">
            </li>
            <li class="col-sm-4">
                <img src="img/mobile3.png" alt="banners" class="img-responsive">
            </li>
        </ul>
    </div>
</div>
<!-- 3 Column Banners Ends -->
<!-- Latest Products Starts -->
<section class="products-list">
    <div class="container">
        <!-- Heading Starts -->
        <h2 class="product-head">Latest Products </span></h2>
        <!-- Heading Ends -->
        <!-- Products Row Starts -->
        <div class="row">
          <?php
          foreach ($resultNew as $key => $value) {
            ?>

              <!-- Product #1 Starts -->
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                  <div class="thumbnail">
                      <div class="image" style="height: 253px">
                          <img src="img/<?php echo $value['prod_img']; ?>"
                               alt="product" class="img-responsive">
                      </div>
                      <div class="moive">
                         <img src="img/new.png" alt="">
                      </div>
                      <div class="caption">
                          <h4>
                              <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>"><?php echo $value['prod_name'] ?></a>
                          </h4>
                          <div class="description">
                                <?php   echo substr( $value['prod_description'],0,60).'...'; ?>
                          </div>
                          <div class="price">
                              <span class="price-new">$ <?php echo $value['prod_price']; ?></span>
                              <span class="price-old">$<?php echo $value['prod_price'] + $value['prod_price'] * 11 / 100; ?></span>
                          </div>
                          <div class="cart-button button-group">
                              <button type="button" class="btn btn-wishlist" data-toggle="tooltip" title="Thích">
                                  <i class="fa fa-heart"></i>
                              </button>
                              <button type="button" class="btn btn-compare" data-toggle="tooltip" title="Biểu đồ">
                                  <i class="fa fa-bar-chart-o"></i>
                              </button>
                              <button type="button" class="btn btn-cart" data-toggle="tooltip" title="Xem chi tiết">
                                  <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>">See details
                                      <i class="fa fa-eye" aria-hidden="true"></i></a>
                              </button>
                          </div>
                      </div>
                      <div class="politis">
                          <div class="title">
                              <h4>
                                  <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>"><?php echo $value['prod_name'] ?></a>
                              </h4>
                              <ul class="list-group">
                                  <li class="">Screen: 5.5", Retina HD</li>
                                  <li class="">OS: iOS 10</li>
                                  <li class="">CPU: Apple A10 Fusion 4 nhân</li>
                                  <li class="">RAM: 3 GB, ROM: 128 GB</li>
                                  <li class="">Camera : 12+2 MP, Selfie: 8MP</li>
                                  <li class="">RAM: 3 GB, ROM: 128 GB</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Product #1 Starts -->
            <?php
          } ?>
        </div>
    </div>
</section><!--  end product list -->
<!-- 2 Column Banners Starts -->
<div class="col2-banners">
    <div class="container">
        <ul class="row list-unstyled">
            <li class="col-sm-4">
                <img src="img/galaxy.png" alt="banners" class="img-responsive">
            </li>
            <li class="col-sm-8">
                <img src="img/banner.png" alt="banners" class="img-responsive">
            </li>
        </ul>
    </div>
</div>
<!-- 2 Column Banners Ends -->
<!-- SPECIALS Products Starts -->
<section class="products-list">
    <div class="container">
        <!-- Heading Starts -->
        <h2 class="product-head">SPECIALS PRODUCTS </h2>
        <!-- Heading Ends -->
        <!-- Products Row Starts -->
        <div class="row">
          <?php foreach ($resultDB as $key => $value) { ?>
              <!-- Product #1 Starts -->
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                  <div class="thumbnail">
                      <div class="image" style="height: 253px">
                          <img src="img/<?php echo $value['prod_img'] ?>" alt="product" class="img-responsive">
                      </div>
                          <div class="hot">
                            <img src="img/hot3.png" style="width:30%;" alt="">
                          </div>
                      <div class="caption">
                          <h4>
                              <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>"><?php echo $value['prod_name'] ?></a>
                          </h4>
                          <div class="description">

                              <?php if(strlen ($value['prod_description'])>50){   echo substr( $value['prod_description'],0,60).'...'; }else{
                                echo $value['prod_description'];
                                }?>
                          </div>
                          <div class="price">
                              <span class="price-new">$<?php echo $value['prod_price']; ?></span>
                              <span class="price-old">$<?php echo $value['prod_price'] + $value['prod_price'] * 11 / 100; ?></span>
                          </div>
                          <div class="cart-button button-group">
                              <button type="button" class="btn btn-wishlist" data-toggle="tooltip" title="Thích">
                                  <i class="fa fa-heart"></i>
                              </button>
                              <button type="button" class="btn btn-compare" data-toggle="tooltip" title="Biểu đồ">
                                  <i class="fa fa-bar-chart-o"></i>
                              </button>
                              <button type="button" class="btn btn-cart" data-toggle="tooltip" title="Xem chi tiết">
                                  <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>">See details
                                      <i class="fa fa-eye" aria-hidden="true"></i></a>
                              </button>
                          </div>
                      </div>
                      <div class="politis">
                          <div class="title">
                              <h4>
                                  <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>"><?php echo $value['prod_name']; ?></a>
                              </h4>
                              <ul class="list-group">
                                  <li class="">Screen: 5.5", Retina HD</li>
                                  <li class="">OS: iOS 10</li>
                                  <li class="">CPU: Apple A10 Fusion 4 nhân</li>
                                  <li class="">RAM: 3 GB, ROM: 128 GB</li>
                                  <li class="">RAM: 3 GB, ROM: 128 GB</li>
                                  <li class="">RAM: 3 GB, ROM: 128 GB</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Product #1 Starts -->
          <?php } ?>
        </div>
    </div>
    </div>

    </div>
</section>