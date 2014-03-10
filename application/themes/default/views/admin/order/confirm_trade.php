<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<style>
    #trade{margin:5px;background-color: #d3d7d4;}
    .order_info p{font-size:12px;width:100%;height:20px;line-height: 20px;overflow: hidden;margin-bottom: 3px;}
    .order_listings{display: none;}
    .trade_order{position: relative;margin:10px 0;}
    .trade_order .glyphicon{font-size: 72px;position: absolute;top:0px;right:30px;color: #45b97c;display: none;}
    .trade_order_selected .glyphicon{display: block;}
    .order_listings_selected{display: block;}
</style>
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
    <div class="panel-body">
        <form action="<?php echo site_url('order/confirmTrade/'.$this->uri->segment(3,0));?>" method="post" id="tradeConfirmForm">
        <?php foreach ($trade['tao_trade_orders'] as $order) { ?>
        <div class="row trade_order" data-info={"iid":"<?php echo $order['num_iid']; ?>"} id="trade_order_<?php echo $order['num_iid']; ?>">
            <div class="col-md-2">
                <img src="<?php echo $order['pic_path'];?>" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-4">
                <div class="order_info">
                    <p>名称:<?php echo $order['title'];?></p>
                    <p>价格:<?php echo $order['price'];?></p>
                    <p>修改:<?php echo $order['adjust_fee'];?></p>
                    <p>总计:<?php echo $order['total_fee'];?></p>
                    <p>状态:<?php echo trade_status($order['status']);?></p>
                </div>
            </div>
            <div class="col-md-2" id="listing_img_<?php echo $order['num_iid'];?>">
                <?php if( ! $trade['confirm']){ ?>
                    <img src="holder.js/150x125" alt="" class="img-thumbnail" />
                <?php }else{ ?>
                    <img src="<?php echo $listings[$order['num_iid']][$trade['linked_listings'][$order['num_iid']]['pe_etsy_id']]['etsy_images'][0]['170'];?>" alt="" class="img-thumbnail" /> 
                <?php }?>
            </div>
            <div class="col-md-4">
                备注: <textarea name="trade_confirm_memo[]" id="trade_confirm_memo_<?php echo $order['num_iid'];?>" cols="25" rows="5"><?php echo $trade['confirm']?$trade['linked_listings'][$order['num_iid']]['trade_confirm_memo']:''; ?></textarea>
                <input type="hidden" name="trade_order_iid[]" value="<?php echo $order['num_iid'];?>" id="trade_order_iid_<?php echo $order['num_iid'];?>"/>
                <input type="hidden" name="trade_order_listing[]" value="<?php echo $trade['confirm']?$trade['linked_listings'][$order['num_iid']]['pe_etsy_id']:0; ?>" id="trade_order_listing_<?php echo $order['num_iid'];?>" class="trade_order_listing"/>
            </div>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <input type="hidden" name="trade_id" value="<?php echo $trade['tao_trade_id']?>" />
                <input type="submit" id="trade_submit" name="trade_submit" value="完成" class="btn btn-primary btn-block"/>
            </div>
        </div>
    </form>
    </div>
</div>
<?php if( ! $trade['confirm']){?>
<div class="panel panel-info">
    <div class="panel-heading">
        货源商品
    </div>
    <div class="panel-body">
        <?php foreach($listings as $iid=>$listing){ ?>
        <div class="row order_listings" id="order_listings_<?php echo $iid; ?>">
            <?php foreach($listing as $item){ ?>
            <div class="col-md-2">
                <img src="<?php echo $item['etsy_images'][0]['170'];?>" class="img-thumbnail" data-info={"pe_etsy_id":"<?php echo $item['pe_etsy_id'];?>","iid":"<?php echo $iid;?>"} />
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>