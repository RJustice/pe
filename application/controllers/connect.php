<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connect extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ltao');
        $this->load->model('letsy');
    }

    public function index()
    {
        $data['tao'] = $this->ltao->getUnLinkedTao();
        $data['etsy'] = $this->letsy->getUnLinkedEtsy();
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/connect/main',$data);
    }

    function link(){
        $data['tao_id'] = $this->input->post('tao_id',TRUE);
        $data['pe_tao_id'] = $this->input->post('pe_tao_id',TRUE);
        $data['etsy_id'] = $this->input->post('etsy_id',TRUE);
        $data['pe_etsy_id'] = $this->input->post('pe_etsy_id',TRUE);
        $this->ltao->linkEtsy($data);
        $this->letsy->linkTao($data);
        redirect('connect');
    }
}

/* End of file connect.php */
/* Location: ./application/controllers/connect.php */