<div class="container-fluit">
    <div class="row" style="margin:15px 0;">
        <form action="#" method="post" id="homologyForm">
            <div class="col-md-6 col-md-offset-3">
                <input type="hidden" name="homology" value="" id="homology" />
                <input type="submit" value="Submit" class="btn btn-info btn-lg btn-block">
            </div>
        </form>
    </div>
    <style>
    .listing-homology .selected{position:absolute;top:0;right:13px;color:#1d953f;font-size:20px;display:none;}
    .listing-homology .has-homology{position:absolute;color:#d71345;top:0;left:13px;font-size:20px;display:none;}
    .homology-selected span.selected{display:block;}
    </style>
    <div class="row">
        <?php foreach($listings as $listing){ ?>
            <div class="col-md-2 listing-homology" style="margin-bottom:10px;position:relative;" data-info={"listing_id":"<?php echo $listing['pe_etsy_id'];?>"}>
                <img src="<?php echo $listing['etsy_params']['images'][0]['170'];?>" class="img-thumbnail" />
                <span class="glyphicon glyphicon-bookmark has-homology" style="<?php if($listing['has_homology'] > 1){ echo 'display:block;'; }?>"></span>
                <span class="glyphicon glyphicon-ok selected"></span>
            </div>
        <?php } ?>
    </div>
</div>

