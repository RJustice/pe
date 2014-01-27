<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ATao extends CI_Model {

    protected $_token;
    protected $v = '2.0';
    protected $format = 'json';
    protected $params = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('rest');
        $this->rest->server('https://eco.taobao.com/router/');
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $this->params = array(
            'v' => $this->v,
            'format' => $this->format,
            );
    }

    function set($key,$value){
        $this->{$key} = $value;
    }

    function getSellerInfo($access_token){
        $this->params['access_token'] = $access_token;
        $this->params['method'] = 'taobao.user.seller.get';
        $this->params['field'] = 'user_id,uid,nick,avatar';
        $seller = $this->rest->get('rest',$this->params,'json');
        return $seller['user_seller_get_response']['user'];
    }

    //获取在售商品信息
    function getItemsOnsale($access_token,$page){
        $this->params['method'] = 'taobao.items.onsale.get';
        $this->params['access_token'] = $access_token;
        $this->params['page'] = $page;
        $this->params['fields'] = 'approve_status,cid,iid,num,price,title,props,nick,pic_url';
        $items = $this->rest->get('rest',$this->params,'json');
        // $this->rest->debug();
        if( ! isset($items['items_onsale_get_response'])){
            return false;
        }
        return $items['items_onsale_get_response'];
    }

    //获取商品详细信息
    function getItem(){
        $this->params['method'] = 'taobao.item.get';
    }

    //批量获取商品信息
    function getItems(){
        $this->params['method'] = 'taobao.items.list.get';
    }

    //批量更新库存
    function updateQuantity(){
        $this->params['method'] = 'taobao.item.quantity.update';
    }

    //获取订单信息
    function getTrade(){
        $this->params['method'] = 'taobao.trade.get';
    }

    function getShopInfo(){
        $this->params['method'] = 'taobao.shop.get';
    }

    //更新商品价格
    function updateItemPrice(){
        $this->params['method'] = 'taobao.item.price.update';
    }

    //获取商品的SKU信息
    function getItemSKU(){
        $this->params['method'] = 'taobao.item.skus.get';
    }

    //发布到淘宝
    function addItem(){
        $this->params['method'] = 'taobao.item.add';
    }
}

/* End of file tao_model.php */
/* Location: ./application/models/tao_model.php */