<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<?php if( ! $trade['confirm']){?>
    <div class="alert alert-danger">未确认订单内的商品对应的货源商品,无法确认订单产品利润.请<a href="<?php echo site_url('order/confirmtrade'.$trade['pe_trade_id']);?>" class="btn btn-xm btn-info">确认订单</a></div>
<?php } ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-3">订单号: <a href="" target="_blank" class="text-danger"><?php echo $trade['tao_trade_id'];?></a></div>
            <div class="col-md-3">
                创建时间: <?php echo $trade['created'];?>
            </div>
            <div class="col-md-3">
                交易状态: <?php echo trade_status($trade['tao_trade_status']);?>
            </div>
            <div class="col-md-3">
                交易金额: <?php echo $trade['tao_trade_payment'];?>
            </div>
        </div>  
    </div>
    <div class="panel-body trade_normal_info" style="position:relative;">
        <div class="row">
            <div class="col-md-1"><p>订单备注: </p></div>
            <div class="col-md-5"><p><?php echo $trade['tao_trade_params']['trade_memo'];?></p></div>
            <div class="col-md-1"><p>卖家备注:</p></div>
            <div class="col-md-5"><p><?php echo $trade['tao_trade_params']['seller_memo'];?></p></div>
        </div>
        <h4>买家留言:</h4>
        <p class="text-danger"><?php echo $trade['tao_trade_params']['buyer_message'];?></p>
        <?php if($trade['tao_trade_status'] == 'TRADE_FINISHED'){ ?><span class="glyphicon glyphicon-ok-circle" style="color:#45b97c;font-size:72px;position:absolute;right:20px;top:10px;"></span><?php } ?>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">订单详情</div>
    <div class="panel-body">
        <?php foreach($trade['tao_trade_orders'] as $order){ ?>
        <div class="row">
            <div class="col-md-1"><img src="<?php echo $order['pic_path']?>" alt="" class="img-thumbnail"></div>
            <div class="col-md-1"><?php echo $order['price'];?> * <?php echo $order['num'];?></div>
            <div class="col-md-1"><?php echo $order['discount_fee'];?></div>
            <div class="col-md-1"><?php echo $order['adjust_fee'];?></div>
            <div class="col-md-3"><?php //echo $order['sku_properties_name'];?></div>
            <div class="col-md-1"><?php echo $order['total_fee'];?></div>
            <div class="col-md-1"><img src="<?php echo $listings[$trade['linked_listings'][$order['num_iid']]['pe_etsy_id']]['etsy_images'][0]['75'];?>" class="img-thumbnail" alt="" /></div>
            <div class="col-md-3"></div>
        </div>
        <hr />
        <?php }?>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">追踪</div>
    <div class="panel-body">
        <div class="row">商品1的快递追踪</div>
        <div class="row">商品2的快递追踪</div>
        <div class="row">商品3的快递追踪</div>
        <hr>
        <div class="row">
            订单快递追踪
        </div>
    </div>
</div>
<div class="panel panel-danger">
    <div class="panel-heading">总计</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">成本:</div>
            <div class="col-md-3">运费:</div>
            <div class="col-md-3">售价:</div>
            <div class="col-md-3">利润:</div>
        </div>
    </div>
</div>