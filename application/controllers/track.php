<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Track extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/track/main');
    }

}

/* End of file track.php */
/* Location: ./application/controllers/track.php */