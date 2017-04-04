<li>
    <a data-toggle="modal" class="myModal" data-target="#myModalDK">
        <i class="fa fa-unlock" title="Register"></i>
        <span class="hidden-sm hidden-xs">
         Register
       </span>
    </a>
    <div class="modal fade" id="myModalDK" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                                                                                   class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                </div>
                <div class="row modal-body">
                    <div class="col-md-12 ">
                        <div class="erro">
                        </div>

                    </div>
                    <form action="" method="post">
                        <div class="col-md-12 col-md-offset-3">
                            <div class="input-group" id="us1">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="username_dk" id="username_dk" class="form-control"
                                       placeholder="Họ và tên">
                                <span id="check_ten">  </span>
                            </div>
                            <div class="input-group" id="us2">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="password" name="password_dk" id="password_dk" class="form-control"
                                       placeholder="Mật khẩu ( 6- 15 ) ">
                                <span id="check_pass"></span>

                            </div>
                            <div class="input-group" id="us3">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="password" name="re_pass" id="re_pass" class="form-control"
                                       placeholder="Nhập lại mật khẩu">
                                <span id="check_pass2"></span>
                            </div>
                            <div class="input-group" id="us4">
                                <span class="glyphicon glyphicon-earphone"></span>
                                <input type="number" name="phone" id="phone" class="form-control"
                                       placeholder="Nhập số điện thoại">
                                <span id="check_sdt"></span>
                            </div>
                            <div class="input-group" id="us5">
                                <span class="glyphicon glyphicon-envelope"></span>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Nhập email">
                                <span id="check_email"></span>
                            </div>
                            <button type="button" id="submit1" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div><!-- row modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal fade -->
</li>
<script src="js/register.js">
   
</script>
