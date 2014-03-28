<?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
<div class="container">
    <?php foreach($notifications as $notification){ 
            switch (strtolower($notification['type'])) {
                case 'item':
                    $link = site_url('taobao/item/'.$notification['bind_id']);
                    break;
                case 'etsy':
                    $link = site_url('etsy/listing/'.$notification['bind_id']);
                    break;
                case 'trade':
                    $link = site_url('order/trade/'.$notification['bind_id']);
                    break;
                default :
                    $link = site_url('notification/view/'.$notification['nid']);
                    break;
            }
    ?>
    <div class="col-md-4">
        <p><a href="<?php echo $link;?>"><?php echo $notification['title']; ?></a></p>
    </div>
    <?php } ?>
</div>