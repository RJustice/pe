<nav class="navbar navbar-inverse" role="navigation">
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="<?php if($this->router->class == 'admin'){echo 'active';}?>"><a href="<?php echo site_url('admin/panel');?>">Panel</a></li>
            <li class="<?php if($this->router->class == 'taobao'){echo 'active';}?>"><a href="<?php echo site_url('taobao')?>">Tao</a></li>
            <li class="<?php if($this->router->class == 'etsy'){echo 'active';}?>"><a href="<?php echo site_url('etsy')?>">Etsy</a></li>
            <li class="<?php if($this->router->class == 'connect'){echo 'active';}?>"><a href="<?php echo site_url('connect')?>">关联</a></li>
            <li class="<?php if($this->router->class == 'order'){echo 'active';}?>"><a href="<?php echo site_url('order')?>">订单</a></li>
            <li class="<?php if($this->router->class == 'track'){echo 'active';}?>"><a href="<?php echo site_url('track')?>">追踪</a></li>
            <li class="<?php if($this->router->class == 'bookkeeping'){echo 'active';}?>"><a href="<?php echo site_url('bookkeeping')?>">账簿</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="keyword" />
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <a href="<?php echo site_url('user/logout');?>" class="btn btn-danger navbar-btn navbar-right">退出</a>
        <p class="navbar-text navbar-right"><?php echo $this->session->userdata('user.nick');?></p>
        <?php if(is_taooauth_expires()){ ?>
        <a href="<?php echo site_url('user/bandtao');?>" class="btn btn-warning navbar-btn navbar-right">重新登录淘宝</a>
        <?php }else{ ?>
        <a href="<?php echo site_url('user/refresh_token');?>" class="btn btn-warning navbar-btn navbar-right">手动刷新Token</a>
        <?php }?>
    </div>
</nav>