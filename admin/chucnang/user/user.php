<script type="text/javascript">
    function xoasanpham() {
        var conf = confirm("Bạn có muốn xóa không");
        return conf;

    }
</script>
<?php
$sql = "SELECT *FROM  vp_users Where level=2";
$list_user = Select_list($sql);
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
                <div class="add">

                </div>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Level</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($list_user as $key => $value) {

                  ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['Name'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['phone'] ?></td>
                        <td>
                          <?php
                          if ($value['level'] == 1) {
                            echo "admin";
                          } else {
                            echo "user";

                          }
                          ?>
                        </td>

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xoasanpham();"
                                                                                  href="chucnang/user/delete_user.php?id=<?php echo $value['id']; ?>">
                                Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="index.php?page=edit_user&id=<?php echo $value['id']; ?>">Edit</a></td>
                    </tr>
                  <?php $i++;
                } ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
