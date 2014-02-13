<div class="container">
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
                <tr>
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
                        <p data-toggle="tooltip" data-html="true" data-placement="top" data-original-title='' title=''><span style="color:#f58220;"><?php echo $item['etsy_info']['etsy_currency'].' '.$item['etsy_info']['etsy_price'];?></span>+<span style="color:#5c7a29"><?php echo $item['etsy_info']['etsy_shipping'][0]['primary_cost'];?></span></p>
                    </td>
                    <?php }else{ ?>
                    <td colspan="2"></td>
                    <?php }?>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="container text-center">
            <?php echo $template['partials']['pagination'];?>
        </div>
</div>