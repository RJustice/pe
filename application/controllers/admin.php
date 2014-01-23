<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {

    }

    function panel(){
        $data['user'] = $this->session->userdata('user');
        //var_dump($this->session->userdata('user'));
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/panel',$data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */