<div class="nava">
    <div class="container">
        <div class="main-head">
            <div class="row">
                <!-- Logo Starts -->
                <div class="col-md-6">
                    <div id="logo">
                        <a href="#"><img src="img/logo1.png" title="Spice Shoppe" alt="Spice Shoppe"
                                         class="img-responsive"></a>
                    </div>
                </div>
                <!-- Logo Starts -->
                <!-- Search Starts -->
                <div class="col-md-3">
                  <?php

                  include('chucnang/search.php');

                  ?>
                </div>
                <!-- Search Ends -->
                <!-- Shopping Cart Starts -->
                <div class="col-md-3" id="nav_cart">
                    <div id="cart" class="btn-group btn-block">
                        <button type="button" data-toggle="dropdown" class="btn btn-block btn-lg dropdown-toggle">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="hidden-md">Cart:</span>
                            <span id="cart-total"><?php if (isset($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                              } else {
                                echo '0';
                              } ?> item(s)</span>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                          <?php if (!empty($_SESSION['cart'])){
                          $arrayCart = array();
                          foreach ($_SESSION['cart'] as $key => $value) {
                            $arrayCart[] = $key;
                          }
                          $strId = implode(',', $arrayCart);
                          $sql = "SELECT * FROM vp_products WHERE prod_id IN($strId) ORDER BY prod_id DESC";
                          $list_cart = select_list($sql);
                          // var_dump($_SESSION['cart']);
                          ?>
                            <li>
                                <table class="table table-striped hcart">
                                    <tbody id="result">
                                    <?php
                                    $sub_total = 0;
                                    foreach ($list_cart as $key => $value) {
                                      $prod_id = $value['prod_id'];
                                      $sl = $_SESSION['cart'][$prod_id];
                                      $total = $_SESSION['cart'][$prod_id] * $value['prod_price'];
                                      ?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="index.php?page=chitiet&id=<?php echo $prod_id; ?>">
                                                    <img src="img/<?php echo $value['prod_img'] ?>" alt="image"
                                                         title="image"
                                                         class="img-thumbnail img-responsive">
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <a href="index.php?page=chitiet&id=<?php echo $prod_id; ?>">
                                                  <?php echo $value['prod_name'];
                                                  ?>

                                                </a>
                                            </td>
                                            <td class="text-right1">
                                                <span>x <?php if (isset($_SESSION['cart'][$prod_id])) {
                                                    echo $sl;
                                                  } ?></span></td>
                                            <td class="text-right">$<?php echo $total; ?></td>
                                            <!--  <td class="text-center">
                                                 <i class="fa fa-times" id="deleCart"></i>
                                             </td> -->
                                        </tr>
                                      <?php
                                      $sub_total += $total;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </li>
                            <li>
                                <table class="table table-bordered total">
                                    <tbody id="result1">
                                    <tr>
                                        <td class="text-right"><strong>Total</strong></td>
                                        <td class="text-left">$<?php echo $sub_total; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                              <?php } else {
                                // var_dump($_SESSION['cart']);
                                ?>
                                  <table class="table table-striped hcart">
                                      <tbody id="result">
                                      </tbody>
                                  </table>
                                  <table class="table table-bordered total">
                                      <tbody id="result1">
                                      <tr>
                                          <td class="text-right"><strong>Total</strong></td>
                                          <td class="text-left">$ 0</td>
                                      </tr>
                                      </tr>
                                      </tbody>
                                  </table>
                              <?php } ?>
                                <p class="text-right btn-block1">
                                    <a href="index.php?page=cart">
                                        View Cart
                                    </a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Shopping Cart Ends -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/cart.js"></script>
