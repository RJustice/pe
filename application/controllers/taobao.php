<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taobao extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('atao');
        $this->load->model('ltao');
        is_logged();
    }

    public function index()
    {
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/tao/main');
    }

    function items(){
        $user = $this->session->userdata('user');
        $items = $this->ltao->getItems();
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/tao/items');
    }

    function updateTaoItems($page = ''){
        if(empty($page)){
            $page = 1;
        }
        $items = $this->atao->getItemsOnsale($this->session->userdata('user.band.taobao.access_token'),$page);
        $total = $items['total_results'];
        if($total < ($page * 40)){
            redirect('taobao/items');
        }else{
            $this->template->append_metadata( '<meta http-equiv="refresh" content="5; url='.site_url('taobao/updatetaoitems/'.($page+1)).'" />');
            $this->template->set_partial('menu','common/admin_menu');
            $this->template->build('admin/tao/update_redirect',array(
                    'total' => $total,
                    'page' => $page
                ));
        }
    }

    function updateTaoItem(){

    }
}

/* End of file taobao.php */
/* Location: ./application/controllers/taobao.php */