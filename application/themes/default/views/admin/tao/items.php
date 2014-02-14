<div class="container-fluit">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
    <style>
        .tao-main .glyphicon{font-size:20px;}
        .tao-main .glyphicon-ok-circle{color:#2ecc71;}
        .tao-main .glyphicon-remove-circle{color:#e74c3c;}
        table.tao-main tr td{line-height: 50px;}
        </style>
        
        <table class="table table-hover tao-main">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Img</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>SKU</th>
                    <th>Linked</th>
                    <th>Etsy</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item){?>
                <tr data-info={"pe_tao_id":"<?php echo $item['pe_tao_id'];?>"} class="show_more">
                    <td>
                        <input type="checkbox" name="pe_tao_id[]" id="<?php echo $item['pe_tao_id'];?>">
                    </td>
                    <td>
                        <img src="<?php echo $item['tao_img'];?>" style="width:50px;height:50px;" alt="" class="img-thumbnail"/>
                    </td>
                    <td><?php echo $item['tao_title'];?></td>
                    <td><?php echo $item['tao_price'];?></td>
                    <td><?php echo $item['tao_qty'];?></td>
                    <td>
                    <?php if($item['linked']){?>
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        <?php }else{?>
                        <span class="glyphicon glyphicon-remove-circle"></span>
                        <?php }?>
                    </td>
                    <?php if($item['linked']){?>
                    <td><a href="#"><img src="<?php echo $item['etsy_info']['etsy_img'];?>" style="width:50px;height:50px;" alt="" class="img-thumbnail"></a></td>
                    <td>
                        <p><?php echo $item['etsy_info']['etsy_currency']?>&nbsp;<span style="color:#f58220;"><?php echo $item['etsy_info']['etsy_price'];?></span>+<span style="color:#ed1941"><?php echo $item['etsy_info']['etsy_shipping'][0]['primary_cost'];?></span></p>
                    </td>
                    <?php }else{ ?>
                    <td colspan="2"></td>
                    <?php }?>
                </tr>
                <?php if($item['linked']){?>
                <tr id="extra_<?php echo $item['pe_tao_id'];?>" style="display:none;">
                    <td colspan="8" style="line-height:16px;">
                    <?php 
                            $line_height = 16;
                            $count = count($item['etsy_info']['etsy_shipping']);
                            $nstyle="height:".$line_height.'px;line-height:'.$line_height.'px;font-size:12px;font-weight:600;';
                            $lstyle="height:".$line_height*$count.'px;line-height:'.$line_height*$count.'px;font-size:12px;font-weight:600;';
                        ?>
                        <div class="row text-center" style="background-color:#afdfe4;margin-bottom:5px;">
                            <div class="col-md-3" style="<?php echo $nstyle;?>">Etsy价格</div>
                            <div class="col-md-3" style="<?php echo $nstyle;?>">由<span style="color:#00ae9d;font-weight:600;"><?php echo $item['etsy_info']['etsy_shipping'][0]['origin_country_name'];?></span>发往</div>
                            <div class="col-md-1" style="<?php echo $nstyle;?>">运费</div>
                            <div class="col-md-1" style="<?php echo $nstyle;?>">+1</div>
                            <div class="col-md-4" style="<?php echo $nstyle;?>">利润</div> 
                        </div>
                        <div class="row text-center">
                            <div class="col-md-3" style="<?php echo $lstyle;?>"><?php echo $item['etsy_info']['etsy_currency']?>&nbsp;<span style="color:#f58220;"><?php echo $item['etsy_info']['etsy_price'];?></span></div>
                            <?php foreach ($item['etsy_info']['etsy_shipping'] as $sp) { ?>
                                <div class="col-md-3" style="<?php echo $nstyle;?>"><?php echo $sp['destination_country_name'];?></div>
                                <div class="col-md-1" style="<?php echo $nstyle;?>"><?php echo $sp['primary_cost'];?></div>
                                <div class="col-md-1" style="<?php echo $nstyle;?>"><?php echo $sp['secondary_cost'];?></div>
                                <div class="col-md-4" style="<?php echo $nstyle;?>">CNY: <span style="color:#d71345"><?php echo $item['tao_price'] - ($item['etsy_info']['cny_price'] + $sp['primary_cny_price']);?></span></div>
                            <?php }?>
                        </div>
                    </td>
                </tr>
                <?php }?>
            <?php }?>
            </tbody>
        </table>
        <div class="container text-center">
            <?php echo $template['partials']['pagination'];?>
        </div>
</div>