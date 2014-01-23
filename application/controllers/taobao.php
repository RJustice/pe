<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taobao extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/taobao');
    }

    function items(){
        $user = $this->session->userdata('user');
        $this->load->model('ltao');
        $items = $this->ltao->getItems();
    }

    function getTaoItems(){
        if(is_band_taobao()){
            $this->load->model('atao');
            $this->atao->
        }else{
            redirect('user/bandtao');
        }
    }

}

/* End of file taobao.php */
/* Location: ./application/controllers/taobao.php */