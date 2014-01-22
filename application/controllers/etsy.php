<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etsy extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('petsy');
        $listing = $this->petsy->getListing(101875467);
        var_dump($listing);
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/etsy');
    }

}

/* End of file etsy.php */
/* Location: ./application/controllers/etsy.php */