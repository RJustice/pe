<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ATao extends CI_Model {

    protected $_token;
    protected $v = '2.0';
    protected $format = 'json';
    protected $params = array();
    protected $api_url = 'https://eco.taobao.com/router/';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('rest');
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
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $seller = $this->rest->get('rest',$this->params,'json');
        return $seller['user_seller_get_response']['user'];
    }

    //获取在售商品信息
    function getItemsOnsale($access_token,$page){
        $this->params['method'] = 'taobao.items.onsale.get';
        $this->params['access_token'] = $access_token;
        $this->params['page_no'] = $page;
        $this->params['fields'] = 'approve_status,cid,iid,num,price,title,props,nick,pic_url';
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $items = $this->rest->get('rest',$this->params,'json');
        // $this->rest->debug();
        if( ! isset($items['items_onsale_get_response'])){
            return false;
        }
        return $items['items_onsale_get_response'];
    }

    //获取商品详细信息
    function getItem($access_token,$taoid){
        $this->params['method'] = 'taobao.item.get';
        $this->params['access_token'] = $access_token;
        $this->params['fields'] = '';
        $this->params['num_iid'] = $taoid;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    //批量获取商品信息
    function getItems(){
        $this->params['method'] = 'taobao.items.list.get';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    //批量更新库存
    function updateQuantity(){
        $this->params['method'] = 'taobao.item.quantity.update';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    //获取订单信息
    function getTrade(){
        $this->params['method'] = 'taobao.trade.get';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    function getShopInfo(){
        $this->params['method'] = 'taobao.shop.get';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    //更新商品价格
    function updateItemPrice(){
        $this->params['method'] = 'taobao.item.price.update';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    //获取商品的SKU信息
    function getItemSKU(){
        $this->params['method'] = 'taobao.item.skus.get';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }

    //发布到淘宝
    function addItem(){
        $this->params['method'] = 'taobao.item.add';
        $this->params['access_token'] = $access_token;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }
}

/* End of file tao_model.php */
/* Location: ./application/models/tao_model.php */