<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-pills">
                <li <?php if($this->router->method == 'items'){echo 'class="active"';}?>><a href="<?php echo site_url('taobao/items');?>">Items</a></li>
                <li <?php if($this->router->method == 'updatetaoitems'){echo 'class="active"';}?>><a href="<?php echo site_url('taobao/updatetaoitems');?>">更新所有本地商品</a></li>
                <li><a href="#">Coming soon</a></li>
            </ul>
        </div>
    </div>
</div>