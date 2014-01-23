<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ATao extends CI_Model {

    protected $_token;
    protected $v = '2.0';
    protected $format = 'json';
    protected $params = array();

    public function __construct()
    {
        parent::__construct();
        $this->params = array(
            'v' => $this->v,
            'format' => $this->format,
            );
    }

    function getSellerInfo($access_token,$field){
        $$this->params['access_token'] = $access_token;
        $$this->params['method'] = 'taobao.user.seller.get';
        $$this->params['field'] = $field;
        $seller = $this->rest->get('rest',$$this->params,'json');
        return $seller['user_seller_get_response']['user'];
    }

    //获取在售商品信息
    function getItemsOnsale(){
        $this->params['method'] = 'taobao.items.onsale.get';
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
}

/* End of file tao_model.php */
/* Location: ./application/models/tao_model.php */