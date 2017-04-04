<?php include('../lib/connect.php');
$cate_name = input_post('cate_name');
$id = input_post('id_cate');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d-h-i-s');
$data = array('cate_name' => $cate_name,
    'updated_at' => $date,
);

$sql = data_to_sql_update('vp_categories', $data) . ' where cate_id=' . $id;
$abc = exec_update($sql);
//kiem tra thuc thi
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


?>