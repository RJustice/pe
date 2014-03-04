<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AOrder extends CI_Model {

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


    function getTradesSold(){
        $this->_params['method'] = 'taobao.trades.sold.get';
        $this->_params['fields'] = 'tid,status,title,total_fee,created,pay_time,modified,end_time,buyer_nick,buyer_area,has_buyer_message,step_trade_status,step_paid_fee,shipping_type,trade_from,receiver_city,receiver_district,pic_path,payment,post_fee,receiver_name,receiver_state,receiver_address,receiver_zip,receiver_mobile,receiver_phone,consign_time,received_payment,orders,seller_nick,adjust_fee';
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $trades = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($trades['trades_sold_get_response'])){
            return FALSE;
        }
        return $trades['trades_sold_get_response'];
    }

    //获取订单信息
    function getTrade($tid){
        $this->_params['method'] = 'taobao.trade.get';
        $this->_params['fields'] = 'seller_nick, buyer_nick, title, type, created, tid, seller_rate, buyer_rate, status, payment, discount_fee, adjust_fee, post_fee, total_fee, pay_time, end_time, modified, consign_time, buyer_obtain_point_fee, point_fee, real_point_fee, received_payment, commission_fee, buyer_memo, seller_memo, alipay_no, buyer_message, pic_path, num_iid, num, price, cod_fee, cod_status, shipping_type,orders';
        $this->_params['tid'] = $tid;
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $trade = $this->rest->get('rest',$this->_params,'json');
        return $trade;
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

/* End of file aorder.php */
/* Location: ./application/models/aorder.php */