<style>
.tao-main .glyphicon{font-size:20px;}
.tao-main .glyphicon-ok-circle{color:#2ecc71;}
.tao-main .glyphicon-remove-circle{color:#e74c3c;}
table tr.taotrselected{background-color: #f47920;}
table tr.etsytrselected{background-color: #f15a22;}
</style>
<div class="container">
    <div class="row">
        <form action="<?php echo site_url('connect/link');?>" method="post" role="linkForm">
            <div class="col-md-2 col-md-offset-3" id="tao_select">
                <img src="holder.js/50x50" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-2 col-md-offset-3" id="etsy_select">
                <img src="holder.js/50x50" alt="" class="img-thumbnail"/>
            </div>            
            <div class="col-md-2">
                <input type="hidden" name="tao_id" value="0" id="tao_id" />
                <input type="hidden" name="pe_tao_id" value="0" id="pe_tao_id" />
                <input type="hidden" name="etsy_id" value="0" id="etsy_id" />
                <input type="hidden" name="pe_etsy_id" value="0" id="pe_etsy_id" />
                <input type="submit" value="确定" class="btn btn-success" disabled="disabled" id="linkBtn">
            </div>
        </form>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-5 col-md-offset-1">
            <?php if($tao){?>
            <table class="table tao-main">
                <tbody>
                    <?php foreach($tao as $taoitem){?>
                    <tr data-info={"tao_id":"<?php echo $taoitem['tao_id'];?>","pe_tao_id":"<?php echo $taoitem['pe_tao_id'];?>"} class="tao_tr">
                        <td style="width:70px;">
                            <img src="<?php echo $taoitem['tao_img'];?>" style="width:50px;height:50px;" alt="" class="img-thumbnail"/>
                        </td>
                        <td>
                            <?php echo $taoitem['tao_title'];?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{ ?>
            <div class="alert alert-info">淘宝的商品已经全部关联了Etsy的商品</div>
            <?php }?>
        </div>
        <div class="col-md-5">
            <?php if($etsy){?>
            <table class="table tao-main">
                <tbody>
                    <?php foreach($etsy as $etsyitem){?>
                    <tr data-info={"etsy_id":"<?php echo $etsyitem['etsy_id'];?>","pe_etsy_id":"<?php echo $etsyitem['pe_etsy_id'];?>"} class="etsy_tr">
                        <td style="width:70px;">
                            <img src="<?php echo $etsyitem['etsy_img'];?>" style="width:50px;height:50px;" alt="" class="img-thumbnail"/>
                        </td>
                        <td>
                            <?php echo $etsyitem['etsy_title'];?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{ ?>
            <div class="alert alert-danger">所有的Etsy商品都已经关联淘宝,你可以继续<a href="<?php echo site_url('etsy/add');?>" class="btn btn-default">添加</a></div>
            <?php }?>
        </div>
    </div>
</div>