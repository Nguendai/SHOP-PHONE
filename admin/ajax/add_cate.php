<?php

include('../lib/connect.php');
$cate_name = input_post('cate_name1');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$sql2 = "SELECT * FROM vp_categories Where cate_name='$cate_name'";
$row1 = select_one($sql2);
$name1 = strtolower($row1['cate_name']);
$name2 = strtolower($cate_name);
if ($name1 == $name2) {
  echo "123";
} else {
  $date = date('Y-m-d-h-i-s');
  $data = array('cate_name' => $cate_name, 'created_at' => $date, 'updated_at' => $date);
  $sql = data_to_sql_insert('vp_categories', $data);
  $abc = exec_update($sql);

  if ($abc == 1) {
    $sql1 = "SELECT * FROM vp_categories";
    $row = select_list($sql1);
    $list = "";
    $i = 1;
    foreach ($row as $key => $value) {
      $id = $value['cate_id'];
      $name = "'" . $value['cate_name'] . "'";
      $list .= '<tr class="odd gradeX" align="center">
	            <td>' . $i . '</td>
	            <td>' . $value['cate_name'] . '</td>
	            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xoasanpham();" href="chucnang/category/delete_cate.php?id= ' . $id . '"> Delete</a></td>
	            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a onclick="my_cate( ' . $id . ',' . $name . ');" href="#">Edit</a></td>
	        </tr>';
      $i++;
    }
    echo $list;
  } else {

    echo 'trung';
  }
}


?>