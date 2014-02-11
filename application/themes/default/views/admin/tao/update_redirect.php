<div class="container">
    <?php echo isset($template['partials']['submenu'])?$template['partials']['submenu']:'';?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-info">
                总数<?php echo $total?>,已经更新到第<?php echo $page;?>页. 5秒后更新下一页,请勿刷新.
            </div>
        </div>
    </div>
</div>