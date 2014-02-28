<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills">
                <?php if($this->router->method() == 'showtrades'){?>
                <li <?php strtoupper($this->uri->segment('3')) == 'ALL' ?>><a href="<?php echo site_url('order/showtrades/all');?>">所有订单</a></li>
                <?php }elseif($this->router->method() == 'showtrades'){?>
                <li <?php strtoupper($this->uri->segment('3')) == 'ALL' ?>><a href="<?php echo site_url('order/showtrades/all');?>">所有订单</a></li>
                <?php }else{ ?>
                <li></li>
                <li></li>
                <li></li>
                <?php } ?> 
            </ul>
        </div>
    </div>
</div>