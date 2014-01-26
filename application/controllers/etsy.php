<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etsy extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    
    public function index()
    {
        $this->load->library('petsy');
        //$listing = $this->petsy->getListingImages(101875467);
        //var_dump($listing);
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/etsy/main');
    }

    //下载图片
    function downImgs(){
        
    }

    //未linked的东西发不到淘宝
    function addToTao(){
        $this->load->model('atao');
    }

    function addEtsy(){
        
    }
}

/* End of file etsy.php */
/* Location: ./application/controllers/etsy.php */