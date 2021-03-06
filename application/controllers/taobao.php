<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taobao extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('atao');
        $this->load->model('ltao');
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->set_partial('submenu','admin/tao/tao_submenu');
    }

    public function index()
    {
        $this->template->build('admin/tao/main');
    }

    function items($page = ''){
        if(empty($page)){
            $page = 1;
        }
        //$user = $this->session->userdata('user');

        $items = $this->ltao->getItems($page);
        if($items == FALSE){
            //$this->template->set_partial('menu','common/admin_menu');
            $this->template->build('common/noitems');
            return FALSE;
        }
        $pagination = pagination(site_url('taobao/items'),20,$this->ltao->getTotal());

        $this->template->inject_partial('pagination',$pagination);
        //$this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/tao/items',array('items'=>$items));
    }

    function updateTaoItems($page = ''){
        if(empty($page) || $page == 'index.php'){
            $page = 1;
        }
        $items = $this->atao->getItemsOnsale($page);
        if($items == FALSE){
            exit('ERROR');
        }
        $total = $items['total_results'];
        $this->ltao->updateTaoItems($items['items']['item']);
        if($total < ( $page * 40)){
            redirect('taobao/items');
        }else{
            $this->template->append_metadata( '<meta http-equiv="refresh" content="5; url='.site_url('taobao/updatetaoitems/'.($page+1)).'" />');
            //$this->template->set_partial('menu','common/admin_menu');
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