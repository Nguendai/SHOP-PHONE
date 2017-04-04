<?php
include("heard/header.php");
if (isset($_GET['page'])) {
  switch ($_GET['page']) {
    case 'cate_list':
      include('category/Category.php');
      break;
    case 'add_cate':
      include('category/AddCategory.php');
      break;
    case 'edit_cate':
      include('category/EditCategory.php');
      break;
    case 'product':
      include('product/product.php');
      break;
    case 'add_product':
      include('product/AddProduct.php');
      break;
    case 'edit_product':
      include('product/EditProduct.php');
      break;
    case 'edit_user':
      include('user/edit_user.php');
      break;
    case 'list_user':
      include('user/user.php');
      break;
    default:
      include_once('user/user.php');
      break;

  }
} else {
  include_once('user/user.php');
}

include("heard/footer.php")
?>
