<?php
$sql = "SELECT * FROM vp_categories";
$list = select_list($sql);
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-md-5 add">
                <div class="panel-heading">Thêm danh mục</div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group " id="form_a">
                            <label>Category Name:</label>
                            <input class="form-control" name="cate" id="cate_name2"
                                   placeholder="Please Enter Category Name" required/>

                        </div>
                        <div class="add_cate" id="add_cate"><i class="fa fa-plus" aria-hidden="true"></i>ADD</div>
                        <div class="edit_cate" id="edit_cate"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 table_cate">
                <div class="panel-heading">Danh sách</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody id="result">
                        <?php
                        $i = 1;

                        foreach ($list as $key => $value) {
                          $id = $value['cate_id'];
                          $name = "'" . $value['cate_name'] . "'";
                          ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['cate_name']; ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xoasanpham();"
                                                                                          href="chucnang/category/delete_cate.php?id=<?php echo $id; ?>">
                                        Delete</a></td>
                                <td class="center"><a onclick="my_cate(<?php echo $id . ',' . $name; ?>);"
                                                      href="#">Edit</a></td>
                            </tr>
                          <?php
                          $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript" src="js/category.js"></script>