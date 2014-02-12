</div>
<?php echo add_theme_js(array('assets/js/jquery.min.js','assets/js/bootstrap.min.js'))?>
<?php if(isset($template['partials']['footer'])){echo $template['partials']['footer'];} ?>
    <script src="http://cdn.bootcss.com/holder/2.0/holder.min.js"></script>
    <script>
    $(function(){
        $('.tao_tr').bind('click',function(){
            var taodata = $(this).data('info');
            $('.tao_tr.taotrselected').removeClass('taotrselected');
            $(this).addClass('taotrselected');
            $('#tao_select').html($(this).find('img').clone());
            $('#tao_id').val(taodata.tao_id);
            $('#pe_tao_id').val(taodata.pe_tao_id);
            if($('#etsy_id').val() != 0){
                $('#linkBtn').prop('disabled',false);
            }
        });
        $('.etsy_tr').bind('click',function(){
            var etsydata = $(this).data('info');
            $('etsy_tr.etsytrselected').removeClass('etsytrselected');
            $(this).addClass('etsytrselected');
            $('#etsy_select').html($(this).find('img').clone());
            $('#etsy_id').val(etsydata.etsy_id);
            $('#pe_etsy_id').val(etsydata.pe_etsy_id);            
            if($('#tao_id').val() != 0){
                $('#linkBtn').prop('disabled',false);
            }
        });
    });
    </script>
</body>
</html>