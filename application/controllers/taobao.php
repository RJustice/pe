<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taobao extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/taobao');
    }

}

/* End of file taobao.php */
/* Location: ./application/controllers/taobao.php */