$(function($){
    chrome.tabs.query({"active":true}, function(tabs){
        var $url,$model,$id;
        $url = tabs[0].url;
        if($url.search(/trade.taobao.com/) > 0){
            $model = 'trade';
            $id = $url.match(/bizOrderId=\d+/);
            $id = $id[0].substr(11);
        }
        if($url.search(/item.taobao.com/) > 0){
            $model = 'item';
            $id = $url.match(/id=\d+/);
            $id = $id[0].substr(3);
        }
        if($url.search(/item.tbsandbox.com/) > 0){
            $model = 'item';
            $id = $url.match(/id=\d+/);
            $id = $id[0].substr(3);
        }
        if($url.search(/trade.tbsandbox.com/) > 0){
            $model = 'trade';
            $id = $url.match(/bizOrderId=\d+/);
            $id = $id[0].substr(11);
        }
        $.ajax({
            url:"http://pe.example.com/ajax/getinfo",
            data:{model:$model,id:$id},
            dataType:"json",
            type:"get",
            success:function(data){
                console.log(JSON.parse(data));
                // for(var item in data){
                //     for(i=0;i<data[item].etsy_images.length;i++){
                //         $(".a").append('<img src="'+data[item].etsy_images[i][170]+'">');
                //     }
                //     $(".a").append("<hr />");
                // }
            },
            error:function(data){
                console.log('error');
            }
        });
    });
});