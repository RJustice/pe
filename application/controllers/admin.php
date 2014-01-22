<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(!$this->session->userdata('logged')){
            redirect('/admin/login');
        }else{
            $user = $this->session->userdata('user');
        }
    }

    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == FALSE){
            $this->template->build('admin/login_form');
        }else{
            $this->session->set_userdata('logged',TRUE);
            $this->session->set_userdata('user',array(
                    'band' => array(
                        'unband' => TRUE,
                        'taobao_token' => '',
                        'username' => '',
                    )
                ));
            redirect('admin/panel');
        }
    }

    function panel(){
        $data['user'] = $this->session->userdata('user');
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/panel',$data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */