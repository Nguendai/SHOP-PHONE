<script type="text/javascript">
    function xoasanpham() {
        var conf = confirm("Bạn có muốn xóa không");
        return conf;
    }
</script>
<?php
$sql = "SELECT *FROM  vp_products INNER JOIN vp_categories on vp_products.prod_cate=vp_categories.cate_id ORDER BY  prod_id DESC ";
// INNER JOIN vp_sub_categories ON  vp_categories.cate_id=vp_sub_categories.sub_cate 
// echo $sql;
$list_product = select_list($sql);
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>

                </h1>
                <div class="add">

                </div>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Img</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($list_product as $key => $value) {

                  ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['prod_name']; ?></td>
                        <td><?php echo $value['prod_price']; ?></td>
                        <td><?php echo $value['cate_name']; ?></td>
                        <td><img src="../font/img/<?php echo $value['prod_img'] ?>" alt="" width="120px"
                                 class="thumbnail"></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xoasanpham();"
                                                                                  href="chucnang/product/delete_product.php?id=<?php echo $value['prod_id']; ?>">
                                Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="index.php?page=edit_product&id=<?php echo $value['prod_id']; ?>">Edit</a></td>
                    </tr>
                  <?php
                  $i++;
                } ?>

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
