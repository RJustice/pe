<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<?php if( ! $trade['confirm']){?>
<div class="alert alert-danger">没有确认订单,无法估算实际的利润值.请确认订单商品对应的货源商品.<a href="<?php echo site_url('order/confirmtrade/'.$trade['pe_trade_id']);?>" class="btn btn-default btn-xm">完成确认</a></div>
<?php } ?>
<div class="panel panel-primary">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
    Panel content
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
    Panel content
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
    Panel content
    </div>
</div>
<div class="panel panel-danger">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
    Panel content
    </div>
</div>