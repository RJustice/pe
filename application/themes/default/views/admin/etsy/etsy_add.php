<?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
<div class="container">
    <div class="row" style="margin-top:20px;">
        <div class="col-md-8 col-md-offset-2">
            <?php echo validation_errors(); ?>
            <?php if(isset($message)){echo $message;}?>
            <form action="<?php echo site_url('etsy/add');?>" method="post" id="etsyAddForm" role="form" class="form-inline">
                <div class="form-group col-md-12">
                    <label for="homology"><input type="checkbox" value="<?php echo $homology;?>" name="homology" id="homology">是否与之前同源</label>
                </div>
                <div class="form-group col-md-11">
                    <input type="text" name="etsy_key" id="etsy_key" value="" class="form-control" placeholder="Etsy的链接或者Etsy商品ID" required />
                </div>
                <div class="form-group text-center col-md-1">
                    <input type="submit" value="添加" class="btn btn-default">
                </div>
            </form>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <p>数字即为ID</p>
            <p><img src="<?php echo base_url('application/themes/default/assets/images/etsy_listing_id.jpg');?>" alt="" /></p>
        </div>
    </div>
</div>