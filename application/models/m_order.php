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
            'ALL' => '',
            'UNCONFIRM' => ''
        );
    }

    function getTrades($status,$page = 1,$limit = 20){
        $status = strtoupper($status);
        if( ! isset($this->_status[$status])){
            return FALSE;
        }
        if($status == 'ALL'){
            $where = ' where ? ';
            $status = 1;
        }elseif($status == 'UNCONFIRM'){
            $where = ' where confirm = ? ';
            $status = 0;
        }else{
            $where = ' where tao_trade_status = ? ';
        }
        $query = 'select SQL_CALC_FOUND_ROWS * from '.$this->_table. $where .' limit ? ,?';
        $rs = $this->db->query($query,array($status,($page-1)*$limit,$limit));
        if($rs->num_rows() > 0){
            foreach ($rs->result_array() as $row) {
                $row['tao_trade_orders'] = unserialize($row['tao_trade_orders']);
                $row['tao_trade_params'] = unserialize($row['tao_trade_params']);
                $row['linked_listings'] = unserialize($row['linked_listings']);
                $row['tao_trade_status_x'] = $this->_status[$row['tao_trade_status']];
                $items[] = $row;
            }
            return $items;
        }
        return FALSE;
    }

    function getTotal(){
        $query = 'select FOUND_ROWS() as total';
        $rs = $this->db->query($query);
        return $rs->row()->total;
    }

    function getTrade($pe_trade_id){
        $query = 'select * from '.$this->_table.' where pe_trade_id = ? ';
        $rs = $this->db->query($query,array($pe_trade_id));
        if($rs->num_rows() > 0){
            $trade = $rs->row_array();
            $orders = unserialize($trade['tao_trade_orders']);
            foreach($orders as $order){
                $iids[] = $order['num_iid'];
            }
            $trade['tao_trade_params'] = unserialize($trade['tao_trade_params']);
            $trade['tao_trade_orders'] = $orders;
            $trade['iids'] = $iids;
            return $trade;
        }
        return FALSE;
    }

    function getTradeAllListings($iids){
        if( ! is_array($iids)){
            $iids = array($iids);
        }
        $this->load->model('letsy');
        $listings = array();
        foreach($iids as $iid){
            $listings[$iid] = $this->letsy->getTaoLinkedListingsByTaoID($iid);
        }
        return $listings;
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
            $trade['pay_time'] = isset($trade['pay_time'])?$trade['pay_time']:'0000-00-00 00:00:00';
            if(in_array($trade['tid'],$tids)){
                $query = 'update '.$this->_table.' set tao_trade_status = ?, tao_trade_payment = ?, tao_trade_received_payment = ?, modified = ? ,pay_time = ?  where tao_trade_id = ?';
                $this->db->query($query,array($trade['status'],$trade['payment'],$trade['received_payment'],$trade['tid'],$trade['modified'],$trade['pay_time']));
            }else{
                $insert_data = array(
                    'tao_trade_id' => $trade['tid'],
                    'tao_trade_status' => $trade['status'],
                    //'tao_trade_status' => $this->_status[$trade['status']],
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
                    'tao_buyer_nick' => $trade['buyer_nick'],
                    'created' => $trade['created'],
                    'modified' => $trade['created'],
                    'pay_time' => $trade['pay_time'],
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