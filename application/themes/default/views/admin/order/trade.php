<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<?php if( ! $trade['confirm']){?>
    <div class="alert alert-danger">未确认订单内的商品对应的货源商品,无法确认订单产品利润.请<a href="<?php echo site_url('order/confirmtrade'.$trade['pe_trade_id']);?>" class="btn btn-xm btn-info">确认订单</a></div>
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