<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<style>
    #trade{margin:5px;background-color: #d3d7d4;}
</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-3">订单号: <a href="" target="_blank" class="text-danger"><?php echo $trade['tao_trade_id'];?></a></div>
            <div class="col-md-3">
                创建时间: <?php echo $trade['created'];?>
            </div>
            <div class="col-md-3">
                交易状态: <?php echo $trade['tao_trade_status'];?>
            </div>
            <div class="col-md-3">
                交易金额: <?php echo $trade['tao_trade_payment'];?>
            </div>
        </div>  
    </div>
    <div class="panel-body">
        
    </div>
</div>
<div class="row" id="trade">
    <div class="col-md-3"><?php echo $trade['tao_trade_id'];?></div>
    <div class="col-md-3"><?php echo $trade['created'];?></div>
</div>
<div class="row" id="trade_orders">
    <?php foreach($trade['tao_trade_orders'] as $order){ ?>
    <div class="col-md-2">
        <img src="<?php echo $order['pic_path'];?>" alt="" class="img-thumbnail"/>
    </div>
    <div class="col-md-8">
        <p>名称:<?php echo $order['title'];?></p>
        <p>价格:<?php echo $order['price'];?></p>
        <p>修改:<?php echo $order['adjust_fee'];?></p>
        <p>总计:<?php echo $order['total_fee'];?></p>
        <p>状态:<?php echo $order['status'];?></p>
    </div>
    <div class="col-md-2">
        
    </div>
    <div class="clearfix"></div>
    <?php } ?>
</div>
<?php foreach($listings as $iid=>$listing){ ?>
<div class="row" id="listings_<?php echo $iid;?>" style="margin-bottom:10px;border:1px solid #4e72b8;">
    <?php foreach($listing as $item){?>
    <div class="row" style="margin-bottom:5px;border-bottom:2px solid #f58220;">
        <?php foreach($item['etsy_images'] as $image){ ?>
        <div class="col-md-2">
            <img src="<?php echo $image['170'];?>" class="img-thumbnail" />
        </div>
        <?php } ?>
    </div>
    <?php }?>
</div>
<?php }?>