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
        $trades = $this->aorder->getTradesSold();
        $total = $trades['total_results'];
        $data['trades'] = $trades['trades']['trade'];
        $this->template->build('admin/order/main',$data);
    }

    function updateSoldTrades(){
        $trades = $this->aorder->getTradesSold();
        if($trades == FALSE){
            exit('ERROR');
        }
        $total = $trades['total_results'];
        $this->m_order->updateTrades($trades['trades']['trade']);
    }

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */