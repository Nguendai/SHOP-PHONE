<?php
$id = $_GET['id'];
$sql = "SELECT * FROM vp_products INNER JOIN vp_categories ON vp_products.prod_cate=vp_categories.cate_id Where prod_id=$id";
$row = select_one($sql);
$id_cate = $row['prod_cate'];
$name = $row['prod_name'];
$sql1 = "SELECT *From vp_products where prod_cate=$id_cate and prod_name like '%$name%' ORDER BY prod_id ASC LIMIT 3";
$list_p = select_list($sql1);

?>
    <link rel="stylesheet" href="css/chitiet.css">

<!-- conten -->
<div id="main-container" class="container">
    <div class="row">
        <div class="col-md-9">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php"><font><font>Home</font></font></a></li>
                <li><a href="index.php?page=chitiet&id=<?php echo $row['cate_id']; ?>"><font><font
                                    class=""><?php echo $row['cate_name'] ?></font></font></a></li>
                <li class="active"><font><font class=""><?php echo $row['prod_name'] ?></font></font></li>
            </ol>
            <div class="row product-info">
                <!-- Left Starts -->
                <div class="rowtop">
                    <h1><?php echo $row['prod_name'] ?></h1>
                </div>
                <div class="col-sm-5 images-block">
                    <p>
                        <img src="img/<?php echo $row['prod_img'] ?>" alt="hình ảnh" class="img-responsive thumbnail">
                    </p>
                </div>
                <!-- Right Starts -->
                <div class="col-sm-7 product-details">
                    <!-- Product Name Starts -->
                    <div class="price">
                        <span class="price-head"><font><font>Price: </font></font></span>
                        <span class="price-new"><font><font>$ <?php echo $row['prod_price'] ?></font></font></span>
                    </div>
                    <!-- Product Name Ends -->
                    <hr>
                    <!-- Manufacturer Starts -->
                    <ul class="list-unstyled manufacturer">
                        <li>
                            <span><font><font>Warranty : </font></font></span><font><font><?php echo $row['prod_warranty'] ?>
                                </font></font></li>
                        <li>
                            <span><font><font>Accessories: </font></font></span><font><font> <?php echo $row['prod_accessories'] ?></font></font>
                        </li>
                        <li>
                            <span><font><font>Promotion: </font></font></span><font><font> <?php echo $row['prod_promotion'] ?></font></font>
                        </li>

                        <li>
                            <span><font><font>AVAILABILITY: </font></font></span>
                          <?php if ($row['number'] == 0) {
                            echo '<strong class="label label-danger"><font><font>Out of stock  </font></font></strong>';
                          } else {
                            echo '<strong class="label label-success"><font><font>IN STOCK</font></font></strong>';
                          } ?>


                        </li>
                    </ul>
                    <!-- Manufacturer Ends -->
                    <hr>


                    <!-- Available Options Starts -->
                    <div class="options">
                        <div class="cart-button button-group">
                            <button type="button" class="btn btn-wishlist" data-toggle="tooltip" title="Thích">
                                <i class="fa fa-heart"></i>
                            </button>
                            <button type="button" class="btn btn-compare" data-toggle="tooltip" title="Biểu đồ">
                                <i class="fa fa-bar-chart-o"></i>
                            </button>
                            <button type="button" data-toggle="modal" id="add_cart" <?php if(isset($_SESSION['user1'])){
                              echo 'data-target=".bs-example-modal-sm" class="btn btn-cart" ';
                              }else{
                                echo 'data-target="#myModalDN" class="btn btn-cart myModal" ';
                                } ?> class="btn btn-cart "><font><font>
                                        Add to Card
                                    </font></font><i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Available Options Ends -->
                    <hr>
                </div>
                <!-- Right Ends -->
                <!-- Left Ends -->
            </div>
            <div class="product-info-box">
                <h4 class="heading">DESCRIPTION</h4>
                <div class="content panel-smart">
                    <p><font><font>
                          <?php echo $row['prod_description'] ?>
                            </font></font></p>
                </div>
            </div>
            <div class="product-info-box">
                <h4 class="heading"><font><font>RELATED PRODUCTS</font></font></h4>
                <!-- Products Row Starts -->
                <div class="row">
                  <?php
                  foreach ($list_p as $key => $value) {

                    ?>
                      <!-- Product #1 Starts -->
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                          <div class="thumbnail">
                              <div class="image">
                                  <img src="img/<?php echo $value['prod_img'] ?>" alt="product" class="img-responsive">
                              </div>
                              <div class="caption">
                                  <h4><a href=""><?php echo $value['prod_name'] ?></a></h4>
                                  <div class="description">
                                      Cơ hội trúng xe SH150i 2017 khi mua iPhone tại Hà Nội, Đà Nẵng .....
                                  </div>
                                  <div class="price">
                                      <span class="price-new">$ <?php echo $value['prod_price'] ?></span>
                                      <span class="price-old">$ <?php echo $value['prod_price'] * 10 / 100 ?></span>
                                  </div>
                                  <div class="cart-button button-group">
                                      <button type="button" class="btn btn-wishlist" data-toggle="tooltip"
                                              title="Thích">
                                          <i class="fa fa-heart"></i>
                                      </button>
                                      <button type="button" class="btn btn-compare" data-toggle="tooltip"
                                              title="Biểu đồ">
                                          <i class="fa fa-bar-chart-o"></i>
                                      </button>
                                      <button type="button" class="btn btn-cart">
                                          Xem chi tiết
                                          <i class="fa fa-shopping-cart"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div> <!-- Product #1 Ends -->
                    <?php
                  } ?>

                </div>
                <!-- Products Row Ends -->
            </div>
        </div> <!-- end  col 9 -->
        <!-- menu right -->
      <?php
      include('chucnang/menudoc.php');
      ?>
    </div>

</div>
<input id="prod_id" class="hide" value="<?php echo $id ?>">

<script type="text/javascript" src="js/index1.js"></script>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Thông báo</h4>
    </div>
    <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end conten-->