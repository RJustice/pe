<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('aorder');
        $this->load->model('m_order');
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->set_partial('submenu','admin/order/order_submenu');
    }

    public function index()
    {
        // echo "<pre>";
        // var_dump($this->aorder->getTrade('192339471440229'));
        // echo "</pre>";
        $this->template->build('admin/order/main',array('trades'=>array()));
    }

    function updateSoldTrades(){
        $trades = $this->aorder->getTradesSold();
        if($trades == FALSE){
            exit('ERROR');
        }
        $total = $trades['total_results'];
        $this->m_order->updateTrades($trades['trades']['trade']);
    }

    function confirmTrade(){
        if( ! $pe_trade_id = $this->uri->segment(3,0)){
            exit('ERROR');
        }
        if($this->input->post('trade_submit')){
            $iids = $this->input->post('trade_order_iid');
            $listings = $this->input->post('trade_order_listing');
            $trade_confirm_memos = $this->input->post('trade_confirm_memo',TRUE);
            foreach($iids as $k=>$iid){
                $Tdata[$iid] = array(
                    'pe_etsy_id' => $listings[$k],
                    'trade_confirm_memo' => $trade_confirm_memos[$k],
                );
            }
            $confirmData = array(
                'confirm' => 1,
                'linked_listings' => serialize($Tdata),
            );
            $this->db->update('trade',$confirmData,array('pe_trade_id'=>$pe_trade_id));
            redirect(site_url('order/trade/'.$this->input->post('trade_id',TRUE)));
        }else{
            $data['trade'] = $this->m_order->getTrade($pe_trade_id);
            $data['listings'] = $this->m_order->getTradeAllListings($data['trade']['iids']);
            $this->template->build('admin/order/confirm_trade',$data);
        }
    }

    function showTrades(){
        if( ! $status = $this->uri->segment(3,0)){
            $status = 'ALL';
        }
        $page = $this->uri->segment(4,1);
        $trades = $this->m_order->getTrades($status,$page);
        $pagination = pagination(site_url('order/showtrades/'.$status),20,$this->m_order->getTotal());
        $this->template->inject_partial('pagination',$pagination);
        $this->template->build('admin/order/trades',array('trades'=>$trades));
    }

    function trade(){
        if( ! $tid = $this->uri->segment(3,0)){
            exit('ERROR');
        }
        $this->load->model('letsy');
        $trade = $this->m_order->getTradeByTid($tid);
        $live_trade = $this->aorder->getTradeFullInfo($tid);
        $trade['tao_trade_params'] = array(
            'buyer_message' => isset($live_trade['buyer_message'])? $live_trade['buyer_message'] : '',
            'seller_memo' => isset($live_trade['seller_memo'])? $live_trade['seller_memo'] : '',
            'buyer_nick' => isset($live_trade['buyer_nick'])? $live_trade['buyer_nick'] : '',
            'discount_fee' => isset($live_trade['discount_fee'])? $live_trade['discount_fee'] : '',
            'alipay_no' => isset($live_trade['alipay_no'])? $live_trade['alipay_no'] : '',
            'trade_from' => isset($live_trade['trade_from'])? $live_trade['trade_from'] : '',
            'trade_memo' => isset($live_trade['trade_memo'])? $live_trade['trade_memo']: '',
            'promotion' => isset($live_trade['promotion_details'])? $live_trade['promotion_details']: ''
        );
        $trade['tao_trade_orders'] = $live_trade['orders']['order'];
        $pe_etsy_ids = array();
        foreach($trade['linked_listings'] as $l){
            $pe_etsy_ids[]  = $l['pe_etsy_id'];
        }
        $listings = $this->letsy->getListingsByIds($pe_etsy_ids);
        $data = array('trade'=>$trade,'listings'=>$listings);
        $this->template->build('admin/order/trade',$data);
    }
}

/* End of file order.php */
/* Location: ./application/controllers/order.php */