<?php
session_start();
include('../lib/connect.php');
if(!isset($_SESSION['user1'])){

echo "chua_dang_nhap";
die;

}else{
$prod_id = input_post("prod_id");
$sql1 = "SELECT *FROM vp_products WHERE prod_id=$prod_id";
$row = select_one($sql1);
$abc = $row['number'];
if ($abc > 0) {


  if (isset($_SESSION['cart'][$prod_id])) {
    // $_SESSION['gio_hang']=2;
    $_SESSION['cart'][$prod_id] = $_SESSION['cart'][$prod_id] + 1;
  } else {
    $_SESSION['cart'][$prod_id] = 1;

  }
  //so lượng sản phâm
  $leght = count($_SESSION['cart']) . ' item(s)';
  $res = "";

  $arrayCart = array();
  foreach ($_SESSION['cart'] as $key => $value) {
    $arrayCart[] = $key;

  }
  $strId = implode(',', $arrayCart);
  $sql = "SELECT * FROM vp_products WHERE prod_id IN($strId) ORDER BY prod_id DESC";
  $list_cart = select_list($sql);
  $sub_total = 0;

  foreach ($list_cart as $key => $value) {
    $prod_id1 = $value['prod_id'];
    $sl = $_SESSION['cart'][$prod_id];
    $total = $_SESSION['cart'][$prod_id] * $value['prod_price'];
    $res .= '
    	<tr>
            <td class="text-center">
                <a href="#">
                    <img src="img/' . $value['prod_img'] . '" alt="image" title="image"
                         class="img-thumbnail img-responsive">
                </a>
            </td>
            <td class="text-left">
                <a href="#">' . $value['prod_name']
        . '</a>
            </td>
            <td class="text-right1"><span>x ' . $sl . '</span></td>
            <td class="text-right">$' . $total . '</td>
            
        </tr>';
    $sub_total += $total;
  }
  $pus = '<tr>
        <td class="text-right"><strong>Sub-Total</strong></td>
        <td class="text-left">$' . $sub_total . '</td>
	    </tr>';

  $arr = array();
  $arr['item'] = $leght;
  $arr['data'] = $res;
  $arr['pus'] = $pus;
  echo json_encode($arr);
} else {
  echo "ok";
}
}

// echo $leght. ' item(s)';

?>