<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-pills">
                <li <?php if($this->router->method == 'add'){echo 'class="active"';}?>><a href="<?php echo site_url('etsy/add');?>">增加</a></li>
                <li <?php if($this->router->method == 'updateetsyitems'){echo 'class="active"';}?>><a href="<?php echo site_url('etsy/updateetsyitems');?>">更新商品信息</a></li>
                <li><a href="#">Coming soon</a></li>
            </ul>
        </div>
    </div>
</div>