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
                <tr>
                    <td>
                        <input type="checkbox" name="pe_tao_id" id="1">
                    </td>
                    <td>
                        <img src="holder.js/50x50" alt="" class="img-thumbnail"/>
                    </td>
                    <td>TitleTitleTitleTitleTitleTitleTitleTitleTitleTitleTitle</td>
                    <td>￥8888</td>
                    <td>10</td>
                    <td><span class="glyphicon glyphicon-ok-circle"></span> <span class="glyphicon glyphicon-remove-circle"></span> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
</div>