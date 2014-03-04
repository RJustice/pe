<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
</div>
<table class="table">
    <?php foreach($trades as $trade){ ?>
    <tr>
        <td><?php echo $trade['buyer_nick'];?></td>
        <td><img src="<?php echo $trade['pic_path'];?>" style="width:80px;height:80px;" /></td>
        <td><?php echo $trade['total_fee'];?></td>
        <td><?php echo $trade['post_fee'];?></td>
        <td><?php echo $trade['receiver_address'].'-'.$trade['receiver_city'].'-'.$trade['receiver_district'].'-'.$trade['receiver_mobile'].'-'.$trade['receiver_name'];?></td>
        <td><?php echo $trade['status'];?></td>
        <td><?php echo $trade['tid'];?></td>
        <td>
            <?php foreach($trade['orders']['order'] as $order){ ?>
            <p style="padding:0;margin:0;height:16px;line-height:20px;font-size:12px;">
                <?php echo $order['title'];?> -- <?php echo $order['price'];?> -- <?php echo $order['status'];?> -- <?php echo $order['total_fee'];?>
            </p>
            <?php }?>
        </td>
    </tr>
    <?php }?>
</table>