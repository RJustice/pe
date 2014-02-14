<div class="container-fluit">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
    <style>
        .tao-main .glyphicon{font-size:20px;}
        .tao-main .glyphicon-ok-circle{color:#2ecc71;}
        .tao-main .glyphicon-remove-circle{color:#e74c3c;}
        /*table.tao-main tr td{line-height: 50px;}*/
        </style>
        
        <table class="table table-hover tao-main">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th style="width:70px;">Img</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Currency</th>
                    <th>CNY Price</th>
                    <th>SKU</th>
                    <th>Linked</th>
                    <th>Tao</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item){?>
                <tr>
                    <td>
                        <input type="checkbox" name="pe_etsy_id[]" id="<?php echo $item['pe_etsy_id'];?>">
                    </td>
                    <td>
                        <img src="<?php echo $item['etsy_img'];?>" style="width:50px;height:50px;" alt="" class="img-thumbnail"/>
                    </td>
                    <td><?php echo $item['etsy_title'];?></td>
                    <td><?php echo $item['etsy_price'];?></td>
                    <td><?php echo $item['etsy_currency'];?></td>
                    <td><?php echo $item['cny_price'];?></td>
                    <td><?php echo $item['etsy_qty'];?></td>
                    <td>
                        <?php if($item['linked']){?>
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        <?php }else{?>
                        <span class="glyphicon glyphicon-remove-circle"></span>
                        <?php }?>
                    </td>
                    <td></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="container text-center">
            <?php echo $template['partials']['pagination'];?>
        </div>
</div>