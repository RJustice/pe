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
        $this->template->
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */