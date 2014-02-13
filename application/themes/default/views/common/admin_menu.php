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
        <p class="navbar-text navbar-right"><?php echo $this->session->userdata('user.nick');?></p>
    </div>
</nav>