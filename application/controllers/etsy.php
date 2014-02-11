<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etsy extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('aetsy');
        $this->load->model('letsy');
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->set_partial('submenu','admin/etsy/etsy_submenu');
    }

    
    public function index($page = '')
    {
        //$this->load->library('petsy');
        //$listing = $this->petsy->getListingImages(101875467);
        //var_dump($listing);
        if(empty($page)){
            $page = 1;
        }
        $items = $this->letsy->getItems($page);
        if($items == FALSE){
            $this->template->build('common/noitems');
            return FALSE;
        }
        $pagination = pagination(site_url('etsy/index'),20,$this->letsy->getTotal());
        $this->template->inject_partial('pagination',$pagination);
        $this->template->build('admin/etsy/main');
    }

    //下载图片
    function downImgs(){
        
    }

    //未linked的东西发不到淘宝
    function addToTao(){
        $this->load->model('atao');
    }

    function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('etsy_key','required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        if($this->form_validation->run() == FALSE){
            $this->template->build('admin/etsy/etsy_add');
        }else{
            $etsy_key = $this->input->post('etsy_key',TRUE);
            if(stripos($etsy_key,'etsy.com') !== FALSE){
                if(preg_match('/\d{9}/', $etsy_key,$match)){
                    $listing_id = $match[0];
                }
            }else{
                $listing_id = intval($etsy_key);
            }
            if(empty($listing_id)){
                $data['message'] = '<div class="alert alert-success">ERROR 1</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return FALSE;
            }
            $this->load->library('petsy');
            $item = $this->petsy->getListing($listing_id);
            if($item == FALSE){
                $data['message'] = '<div class="alert alert-success">ERROR 2</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return FALSE;
            }
            if($this->letsy->storeItem($item['results'])){
                $data['message'] = '<div class="alert alert-success">SUCCESS</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return TRUE;
            }
        }
    }

    function updateEtsyItems($page = ''){

    }
}

/* End of file etsy.php */
/* Location: ./application/controllers/etsy.php */