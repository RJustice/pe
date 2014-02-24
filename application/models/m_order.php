<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Order extends CI_Model {

    protected $_table;
    protected $_status = array();

    public function __construct()
    {
        parent::__construct();
        $this->_table = $this->db->dbprefix('trade');
        $this->_status = array(
            'TRADE_NO_CREATE_PAY' => '没有创建支付宝交易',
            'WAIT_BUYER_PAY' => '等待买家付款',
            'SELLER_CONSIGNED_PART' => '卖家部分发货',
            'WAIT_SELLER_SEND_GOODS' => '等待卖家发货',
            'WAIT_BUYER_CONFIRM_GOODS' => '等待买家确认收货',
            'TRADE_BUYER_SIGNED' => '买家已签收',
            'TRADE_FINISHED' => '交易成功',
            'TRADE_CLOSED' => '付款以后用户退款成功，交易自动关闭',
            'TRADE_CLOSED_BY_TAOBAO' => '付款以前，卖家或买家主动关闭交易',
        );
    }

    function updateTrade($data){

    }

    function addTrade(){

    }

    function updateTrades($data){
        $query = 'select tao_trade_id from '.$this->_table.' where tao_seller_nick = ?';
        $rs = $this->db->query($query,array($data[0]['seller_nick']));
        $tids = array();
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $tids[] = $row['tao_trade_id'];
            }
        }
        foreach($data as $trade){
            if(in_array($trade['tid'],$tids)){
                $query = 'update '.$this->_table.' set tao_trade_status = ?, tao_trade_payment = ?, tao_trade_received_payment = ? where tao_trade_id = ?';
                $this->db->query($query,array($trade['status'],$trade['payment'],$trade['tao_trade_received_payment'],$trade['tid']));
            }else{
                $insert_data = array(
                    'tao_trade_id' => $trade['tid'],
                    'tao_trade_status' => $this->_status[$trade['status']],
                    'tao_trade_payment' => $trade['payment'],
                    'tao_trade_received_payment' => $trade['received_payment'],
                    'tao_trade_post_fee' => $trade['post_fee'],
                    'tao_trade_receiver' => $this->_reveiverAdd(array(
                            'receiver_name' => $trade['receiver_name'],
                            'receiver_mobile' => isset($trade['receiver_mobile']) ? $trade['receiver_mobile'] : '',
                            'receiver_phone' => isset($trade['receiver_phone']) ? $trade['receiver_phone'] : '',
                            'receiver_state' => $trade['receiver_state'],
                            'receiver_city' => isset($trade['receiver_city']) ? $trade['receiver_city'] : '',
                            'receiver_district' => isset($trade['receiver_district']) ? $trade['receiver_district'] : '',
                            'receiver_address' => $trade['receiver_address'],
                            'receiver_zip' => $trade['receiver_zip'],
                        )),
                    'tao_trade_shipping_type' => $trade['shipping_type'],
                    'tao_trade_orders' => serialize($trade['orders']['order']),
                    'tao_trade_params' => '',
                    'tao_seller_nick' => $trade['seller_nick'],
                );
                $this->db->insert($this->_table,$insert_data);
            }
        }
    }

    function _reveiverAdd($data){
        return $data['receiver_name'].' '.$data['receiver_mobile'].' '.$data['receiver_phone'].' '.$data['receiver_state'].' '.$data['receiver_city'].' '.$data['receiver_district'].' '.$data['receiver_address'].' '.$data['receiver_zip'];
    }
}

/* End of file m_order.php */
/* Location: ./application/models/m_order.php */