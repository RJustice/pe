<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills">
                <li <?php echo (strtoupper($this->uri->segment(3)) == 'ALL') || $this->uri->segment(3)===FALSE ?'class="active"':''; ?>><a href="<?php echo site_url('order/showtrades/all');?>">所有订单</a></li>
                <li <?php echo strtoupper($this->uri->segment(3)) == 'UNCONFIRM'?'class="active"':''; ?>><a href="<?php echo site_url('order/showtrades/unconfirm');?>">未确认订单</a></li>
                <li <?php echo strtoupper($this->uri->segment(3)) == 'WAIT_BUYER_PAY'?'class="active"':''; ?>><a href="<?php echo site_url('order/showtrades/wait_buyer_pay');?>">等待买家付款</a></li>
                <li <?php echo strtoupper($this->uri->segment(3)) == 'WAIT_SELLER_SEND_GOODS'?'class="active"':''; ?>><a href="<?php echo site_url('order/showtrades/wait_seller_send_goods');?>">等待卖家发货</a></li>
                <li <?php echo strtoupper($this->uri->segment(3)) == 'WAIT_BUYER_CONFIRM_GOODS'?'class="active"':''; ?>><a href="<?php echo site_url('order/showtrades/wait_buyer_confirm_goods');?>">等待买家确认</a></li>
                <li <?php echo strtoupper($this->uri->segment(3)) == 'TRADE_FINISHED'?'class="active"':''; ?>><a href="<?php echo site_url('order/showtrades/trade_finished');?>">交易成功</a></li>
            </ul>
        </div>
    </div>
</div>