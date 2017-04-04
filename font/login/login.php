<li>
    <a data-toggle="modal" class="myModal" data-target="#myModalDN">
        <i class="fa fa-lock" title="Login"></i>
        <span class="hidden-sm hidden-xs">
         Login
    </a>
    <!-- Modal -->
    <div class="modal fade" id="myModalDN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                                                                                   class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                <div class="row modal-body">
                    <div class="col-md-12">
                        <div class="alert alert-danger check1">
                            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p class="loginUser">Login</p>
                            <hr>
                            <form action="" method="post" id="login_form">
                                <div class="input-group" id="lg1">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <input type="email" id="username" name="username" class="form-control"
                                           placeholder="Tên đăng nhập" required>
                                    <span id="check_e1"></span>
                                </div>
                                <div class="input-group" id="lg2">
                                    <span class="glyphicon glyphicon-lock"></span>
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Mật khẩu">
                                    <span id="check_e"></span>
                                </div>
                                <div class="col-md-6 block_rad">
                                    <input type="radio">Remember
                                </div>
                                <button type="button" name="submit" id="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>

                        <div class="col-md-6 cache">
                            <img src="img/loginFB.png" alt="">
                            <img src="img/loginGG.png" alt="">
                        </div>

                    </div>
                </div><!-- row modal-body -->

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal fade -->
</li>
<script src="js/login.js">
</script>