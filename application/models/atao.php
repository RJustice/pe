<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ATao extends CI_Model {

    protected $_v = '2.0';
    protected $_format = 'json';
    protected $_params = array();
    protected $_api_url = '';
    protected $_config;
    protected $_access_token;
    protected $_app_key;
    protected $_secret_key;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('rest');
        $this->load->config('oauth2');
        $this->_config = $this->config->item('oauth2');
        $this->_api_url = $this->_config['taobao']['gateways'];
        $this->_access_token = $this->session->userdata('user.bind.taobao.access_token');
        $this->_app_key = $this->_config['taobao']['app_key'];
        $this->_secret_key = $this->_config['taobao']['secret_key'];
    }

    function set($key,$value){
        $this->{$key} = $value;
    }

    function getSellerInfo($access_token){
        $this->_params['method'] = 'taobao.user.seller.get';
        $this->_params['field'] = 'user_id,uid,nick,avatar';
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $seller = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($items['user_seller_get_response'])){
            return FALSE;
        }
        return $seller['user_seller_get_response']['user'];
    }

    //获取在售商品信息
    function getItemsOnsale($page){
        $this->_params['method'] = 'taobao.items.onsale.get';
        $this->_params['page_no'] = $page;
        $this->_params['fields'] = 'approve_status,cid,iid,num,price,title,props,nick,pic_url,list_time';
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $items = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($items['items_onsale_get_response'])){
            return FALSE;
        }
        return $items['items_onsale_get_response'];
    }

    //获取商品详细信息
    function getItem($taoid){
        $this->_params['method'] = 'taobao.item.get';
        $this->_params['fields'] = 'approve_status,cid,iid,num,price,title,props,nick,pic_url,list_time';
        $this->_params['num_iid'] = $taoid;
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $item = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($item['item_get_response'])){
            return FALSE;
        }
        return $item['item_get_response']['item'];
    }

    //批量获取商品信息
    function getItems(){
        $this->_params['method'] = 'taobao.items.list.get';
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);

        if($this->rest->status() != '200'){
            return FALSE;
        }

    }

    //批量更新库存
    function updateQuantity(){
        $this->_params['method'] = 'taobao.item.quantity.update';
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);

        if($this->rest->status() != '200'){
            return FALSE;
        }

    }

    function getShopInfo(){
        $this->_params['method'] = 'taobao.shop.get';
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);

        if($this->rest->status() != '200'){
            return FALSE;
        }

    }

    //更新商品价格
    function updateItemPrice(){
        $this->_params['method'] = 'taobao.item.price.update';
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);

        if($this->rest->status() != '200'){
            return FALSE;
        }

    }

    //获取商品的SKU信息
    function getItemSKU(){
        $this->_params['method'] = 'taobao.item.skus.get';
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);

        if($this->rest->status() != '200'){
            return FALSE;
        }

    }

    //发布到淘宝
    function addItem(){
        $this->_params['method'] = 'taobao.item.add';
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);

        if($this->rest->status() != '200'){
            return FALSE;
        }
        
    }

    function _formatParams(){
        $this->_params['format'] = 'json';
        $this->_params['v'] = '2.0';

        if(preg_match('/https/',$this->_api_url)){
            $this->_params['access_token'] = $this->_access_token;
        }else{
            $this->_params['session'] = $this->_access_token;
            $this->_params['timestamp'] = date("Y-m-d H:i:s");
            $this->_params['app_key'] = $this->_app_key;
            $this->_params['sign_method'] = 'md5';
            $sign = $this->_secret_key;
            ksort($this->_params);
            foreach($this->_params as $k=>$v){
                $sign .= $k.$v;
            }
            $sign .= $this->_secret_key;
            $this->_params['sign'] = strtoupper(md5($sign));
        }
        return $this->_params;
    }
}

/* End of file tao_model.php */
/* Location: ./application/models/tao_model.php */