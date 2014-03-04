<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<style>
    #trades-data .row{height:40px;line-height:40px;margin:5px 0;}
</style>
<div class="container text-center" id="trades-data" style="padding-top:20px;">
    <?php if( ! $trades){?>
    <div class="alert alert-danger">
        没有订单
    </div>
    <?php }else{?>
        <div class="row">
            <div class="col-md-2">淘宝订单编号</div>
            <div class="col-md-2">创建时间</div>
            <div class="col-md-2">总付款</div>
            <div class="col-md-2">状态</div>
            <div class="col-md-2">联系买家</div>
            <div class="col-md-2">操作</div>
        </div>
        <?php foreach($trades as $trade){?>
        <div class="row">
            <div class="col-md-2">
                <?php echo $trade['tao_trade_id'];?>
            </div>
            <div class="col-md-2">
                <?php echo $trade['created'];?>
            </div>
            <div class="col-md-2">
                <?php echo $trade['tao_trade_payment'];?>
            </div>
            <div class="col-md-2">
                <?php echo $trade['tao_trade_status_x'];?>
            </div>
            <div class="col-md-2">
                <a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $trade['tao_buyer_nick'];?>&siteid=cntaobao&status=2&charset=utf-8" ><img border="0" src="http://amos.alicdn.com/online.aw?v=2&uid=<?php echo $trade['tao_buyer_nick'];?>&site=cntaobao&s=2&charset=utf-8" alt="联系买家" /><?php echo $trade['tao_buyer_nick']?></a>
            </div>
            <div class="col-md-2">
                <?php if( ! $trade['confirm']){ ?>
                <a href="<?php echo site_url('order/confirmtrade/'.$trade['pe_trade_id']);?>" class="btn btn-danger">确认订单</a>
                <?php }else{ ?>
                <a href="<?php echo site_url('order/trade/'.$trade['pe_trade_id']);?>" class="btn btn-info">订单详情</a>
                <?php } ?>
            </div>
        </div>
        <?php }?>
    <?php }?>
</div>
<div class="container text-center">
    <?php echo $template['partials']['pagination'];?>
</div>