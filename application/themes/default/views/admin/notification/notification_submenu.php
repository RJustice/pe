<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-pills">
                <li <?php if(strtolower($this->uri->segment(3)) == false) echo 'class="active"';?>><a href="<?php echo site_url('notification');?>">所有消息</a></li>
                <li <?php if(strtolower($this->uri->segment(3)) == 'item') echo 'class="active"';?>><a href="<?php echo site_url('notification/index/item');?>">淘宝商品信息</a></li>
                <li <?php if(strtolower($this->uri->segment(3)) == 'trade') echo 'class="active"';?>><a href="<?php echo site_url('notification/index/trade');?>">交易信息消息</a></li>
                <li <?php if(strtolower($this->uri->segment(3)) == 'etsy') echo 'class="active"';?>><a href="<?php echo site_url('notification/index/etsy');?>">ETSY消息</a></li>
            </ul>
        </div>
        <?php if(strtolower($this->uri->segment(3)) == 'item'){?>
        <div class="col-md-12" style="margin:10px 0;">
            <a href="<?php echo current_url().'/0'?>"><span class="label label-info">商品更新</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">商品下架</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">商品上架</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">商品删除</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">商品新增</span></a>            
        </div>
        <?php } ?>
        <?php if(strtolower($this->uri->segment(3)) == 'trade'){?>
        <div class="col-md-12" style="margin:10px 0;">
            <a href="<?php echo current_url().'/0'?>"><span class="label label-info">新增交易</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">修改价格</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">交易关闭</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">更新留言</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">发货</span></a>            
        </div>
        <?php } ?>
        <?php if(strtolower($this->uri->segment(3)) == 'etsy'){?>
        <div class="col-md-12" style="margin:10px 0;">
            <a href="<?php echo current_url().'/0'?>"><span class="label label-info">修改价格</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">修改运费</span></a>
            <a href="<?php echo current_url().'/1'?>"><span class="label label-info">已售完</span></a>       
        </div>
        <?php } ?>
    </div>
</div>