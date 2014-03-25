<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Tmc extends CI_Model {

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

    public function tmcUserPermit()
    {
        $this->_params['method'] = 'taobao.tmc.user.permit';
        $this->_params['topics'] = '';
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $rs = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($rs['tmc_user_permit_response'])){
            return FALSE;
        }
        return $rs['tmc_user_permit_response']['is_success'];
    }

    function tmcGroudAdd($nicks,$group_name='tmc_push'){
        $this->_params['method'] = 'taobao.tmc.group.add';
        $this->_params['group_name'] = $group_name;
        $this->_params['nicks'] = $nicks;
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $rs = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($rs['tmc_group_add_response'])){
            return FALSE;
        }
        return TRUE;
    }

    function tmcMessagesConsume($group='tmc_push'){
        $this->_params['method'] = 'taobao.tmc.messages.consume';
        $this->_params['group_name'] = $group;
        $this->_params['quantity'] = 50;
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $messages = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            // $this->rest->debug();
            return FALSE;
        }
        if(! isset($messages['tmc_messages_consume_response']['messages']['tmc_message'])){
            // $this->rest->debug();
            return FALSE;
        }
        return $messages['tmc_messages_consume_response']['messages']['tmc_message'];
    }

    function tmcMessagesConfirm($s_message_ids,$f_message_ids,$group = 'tmc_push'){
        $this->_params['method'] = 'taobao.tmc.messages.confirm';
        $this->_params['group_name'] = $group;
        $this->_params['s_message_ids'] = $s_message_ids;
        $this->_params['f_message_ids'] = $f_message_ids;
        $this->_formatParams();
        $this->rest->server($this->_api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $rs = $this->rest->get('rest',$this->_params,'json');
        if($this->rest->status() != '200'){
            return FALSE;
        }
        if( ! isset($rs['tmc_messages_confirm_response'])){
            return FALSE;
        }
        return $rs['tmc_messages_confirm_response']['is_success'];
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

    function doMessages($group = 'tmc_push'){
        $this->load->model('aorder');
        $this->load->model('atao');
        $this->load->model('m_order');
        $this->load->model('ltao');
        $messages = $this->tmcMessagesConsume($group);
        $flag = array();
        if( ! $messages){
            return;
        }
        echo "<pre>";
        var_dump($messages);
        echo "</pre>";
        foreach($messages as $message){
            $content = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', trim($message['content'])),TRUE);
            $topic = $message['topic'];
            $tmc_id = $message['id'];
            switch ($topic) {
                case 'taobao_trade_TradeCreate':
                    if( ! isset($flag['trade'][$tmc_id]) || ! in_array($content['tid'], $flag['trade'][$tmc_id])){
                        $this->doTradeCreated($content['tid']);
                        $flag['trade'][$tmc_id][] = $content['tid'];
                    }
                    break;
                case 'taobao_trade_TradeModifyFee':
                case 'taobao_trade_TradeCloseAndModifyDetailOrder':
                case 'taobao_trade_TradeMemoModified':
                case 'taobao_trade_TradeChanged':
                case 'taobao_trade_TradePartlySellerShip':
                     if( ! isset($flag['trade'][$tmc_id]) || ! in_array($content['tid'], $flag['trade'][$tmc_id])){
                        $this->doTradeChanged($content['tid']);
                        $flag['trade'][$tmc_id][] = $content['tid'];
                    }
                    break;
                case 'taobao_item_ItemAdd':
                    if( ! isset($flag['trade'][$tmc_id]) || ! in_array($content['tid'], $flag['trade'][$tmc_id])){
                        $this->doItemAdd($content['num_iid']);
                        $flag['trade'][$tmc_id][] = $content['num_iid'];
                    }
                    break;
                case 'taobao_item_ItemUpshelf':
                case 'taobao_item_ItemDownshelf':
                case 'taobao_item_ItemDelete':
                case 'taobao_item_ItemUpdate':
                    if( ! isset($flag['trade'][$tmc_id]) || ! in_array($content['tid'], $flag['trade'][$tmc_id])){
                        $this->doItemChanged($topic,$content);
                        $flag['trade'][$tmc_id][] = $content['num_iid'];
                    }
                    break;
            }
        }
    }

    function doTradeCreated($tid){
        $trade = $this->aorder->getTradeFullInfo($tid);
        $this->m_order->updateTrades(array($trade));
        $channel = strtolower(substr(md5($trade['seller_nick']),-10));
        add_notification('TRADECREATED',$tid,$channel);
    }

    function doTradeChanged($tid){
        $trade = $this->aorder->getTradeFullInfo($tid);
        $this->m_order->updateTrades(array($trade));
        $channel = strtolower(substr(md5($trade['seller_nick']),-10));
        add_notification('TRADECHANGED',$tid,$channel);
    }

    function doItemAdd($iid){
        $item = $this->atao->getItem($iid);
        echo "<pre>";
        var_dump($item);
        echo "</pre>";
        $this->ltao->updateTaoItems(array($item));
        $channel = strtolower(substr(md5($item['nick']),-10));
        add_notification('ITEMCREATED',$iid,$channel);
    }

    function doItemChanged($topic,$content){
        switch ($topic) {
            case 'taobao_item_ItemUpshelf':
                $data = array(
                    'state' => 1,
                    );
                break;
            case 'taobao_item_ItemDownshelf':
                $data = array(
                    'state' => 0,
                    );
                break;
            case 'taobao_item_ItemDelete':
                $data = array(
                    'state' => -1,
                    );
                break;
            case 'taobao_item_ItemUpdate':
                $item = $this->atao->getItem($content['num_iid']);
                $data = array(
                    'tao_title' => $item['title'],
                    'tao_price' => $item['price'],
                    'tao_qty' => $item['num'],
                    'tao_params' => serialize(array(
                            'approve_status' => $item['approve_status'],
                            'cid' => $item['cid'],
                            'props' => $item['props']
                        )),
                    'tao_img' => $item['pic_url'],
                    );
                break;
        }
        $this->db->update('tao',$data,array('tao_id'=>$content['num_iid']));
        $channel = strtolower(substr(md5($content['nick']),-10));
        add_notification('ITEMCHANGED',$content['num_iid'],$channel);
    }
}

/* End of file m_tmc.php */
/* Location: ./application/controllers/m_tmc.php */