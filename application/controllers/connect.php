<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connect extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
    }

    function tao(){
        $this->load->model('ltao');
        $this->load->model('letsy');
        $data['tao'] = $this->ltao->getUnLinkedTao();
        $data['etsy'] = $this->letsy->getUnLinkedEtsy();
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/connect/link',$data);
    }

}

/* End of file connect.php */
/* Location: ./application/controllers/connect.php */