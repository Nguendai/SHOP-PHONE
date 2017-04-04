<?php
session_start();

include('lib/connect.php');
include('heard/header.php');
if (isset($_GET['page'])) {

  switch ($_GET['page']) {

    case 'cart':
      // include('heard/slide.php');
      include('VIEW/cart.php');
      break;

    case 'category':
      // include('heard/slide.php');
      include('VIEW/category.php');
      break;
    case 'chitiet':
      include('VIEW/chitiet.php');
      break;
    case 'search':
      // include('heard/slide.php');
      include('VIEW/search.php');
      break;

    default:
      include('heard/slide.php');
      include('VIEW/home.php');
      break;
  }
} else {
  include('heard/slide.php');
  include('VIEW/home.php');

}


include('heard/footer.php');
?>


