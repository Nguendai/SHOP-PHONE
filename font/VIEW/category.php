<?php
$id_cate = $_GET['id'];
$sql1 = "SELECT * FROM vp_categories Where cate_id=$id_cate";
$rowone = select_one($sql1);

if (isset($_GET['p'])) {
  $p = $_GET['p'];
} else {
  $p = 1;
}
$row_per_page = 4;
$per_row = $p * $row_per_page - $row_per_page;
$sql = "SELECT * FROM vp_products INNER JOIN vp_categories ";
$sql .= "ON vp_products.prod_cate=vp_categories.cate_id";
$sql .= " Where prod_cate=$id_cate ";
$sql .= " ORDER BY prod_id DESC LIMIT $per_row, $row_per_page";
// echo $sql;
$list_pcate = select_list($sql);
$total_list = get_rows($sql);
// echo $total_list;
$sql2 = "SELECT * FROM vp_products Where prod_cate=$id_cate";
$total_row = get_rows($sql2);
$pageNum = ceil($total_row / $row_per_page);
//khai bao biến list p
$listPage = "";
if ($pageNum == 1) {
  $listPage = "";
} else {
  if ($p > 1) {
    $p1 = $p - 1;
    $listPage = '<a href="index.php?page=category&id=' . $id_cate . '&p=' . $p1 . '">&laquo;</a>';
    echo $listPage;

  }
  for ($i = 1; $i <= $pageNum; $i++) {

    if ($i == $p) {
      $listPage .= '<a href="#" class="active">' . $p . '</a>';
    } else {
      $listPage .= '<a href="index.php?page=category&id=' . $id_cate . '&p=' . $i . '">' . $i . '</a>';
    }
  }
  if ($p < $pageNum) {
    $p2 = $p + 1;
    $listPage .= "<a href='index.php?page=category&id=" . $id_cate . "&p=" . $p2 . "'>&raquo;</a>";

  }
}


?>


<!-- conten -->
<div id="main-container" class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Breadcrumb Starts -->
            <ol class="breadcrumb">
                <li><a href="index.php"><font><font>Home</font></font></a></li>
                <li><a href="index.php?page=category&id=<?php echo $rowone['cate_id'] ?>"><font><font
                                    class=""><?php echo $rowone['cate_name'] ?></font></font></a></li>

            </ol>

            <div class="product-info-box">
                <!-- Products Row Starts -->
                <div class="row">
                  <?php
                  if ($total_list == 0) {

                    echo ' <div class="alert alert-warning">
                              <strong>Warning!</strong> Indicates a warning that might need attention.
                            </div>';
                  } else {
                    foreach ($list_pcate as $key => $value) {
                      # code...
                      ?>
                        <!-- Product #1 Starts -->
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <div class="image">
                                    <img src="img/<?php echo $value['prod_img']; ?>"
                                         alt="product" class="img-responsive" style="height:250px">
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
                                        <span class="price-new">$ <?php echo $value['prod_price']; ?></span>
                                        <span class="price-old">$<?php echo $value['prod_price'] + $value['prod_price'] * 11 / 100; ?></span>
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
                                        <button type="button" class="btn btn-cart" data-toggle="tooltip"
                                                title="Xem chi tiết">
                                            <a href="index.php?page=chitiet&id=<?php echo $value['prod_id'] ?>">See
                                                details
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
                    }
                  } ?>
                    <!-- paginatiomn -->
                    <div class="pagination">

                      <?php
                      echo $listPage; ?>
                    </div>  <!-- end pag -->
                </div>
                <!-- Products Row Ends -->
            </div>
        </div> <!-- end  col 12 -->

    </div>

</div>
<!--end conten-->