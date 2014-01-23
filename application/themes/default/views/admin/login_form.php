<div class="container">
    <h1 class="text-center">登陆后台系统</h1>
    <?php echo validation_errors(); ?>
    <?php if(isset($error)){echo $error;}?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="<?php echo site_url('user/login');?>" method="post" id="loginForm" role="form">
                <div class="form-group">
                    <input type="text" name="username" id="username" value="" class="form-control" placeholder="用户名">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="passowrd" class="form-control" placeholder="密码">
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="登陆" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
</div>