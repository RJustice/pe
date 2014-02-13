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
        $this->template->build('admin/etsy/main',array('items' => $items));
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
                $data['message'] = '<div class="alert alert-danger">ERROR 1</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return TRUE;
            }
            $this->load->library('petsy');
            $item = $this->petsy->getListing($listing_id);
            if(isset($item['state']) && $item['state'] == 'sold_out'){
                $data['message'] = '<div class="alert alert-warning">SOLD OUT</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return TRUE;
            }
            usleep(500000);
            $item['images'] = $this->petsy->getListingImages($listing_id);
            usleep(500000);
            $item['shipping'] = $this->petsy->getListingShipping($listing_id);
            if($item == FALSE){
                $data['message'] = '<div class="alert alert-danger">ERROR 2</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return TRUE;
            }
            if($this->letsy->storeItem($item)){
                $data['message'] = '<div class="alert alert-success">SUCCESS</div>';
                $this->template->build('admin/etsy/etsy_add',$data);
                return TRUE;
            }
        }
    }

    function updateEtsyItems($page = ''){
        if(empty($page)){
            $page = 1;
        }

        $listing_ids = $this->letsy->getAllLinkedListings($page,5);
        if($listing_ids == FALSE){
            redirect('etsy');
        }
        $total = $this->letsy->getTotal();
        $this->aetsy->updateListings($listing_ids);
        $this->template->append_metadata( '<meta http-equiv="refresh" content="5; url='.site_url('etsy/updateetsyitems/'.($page+1)).'" />');
        
        $this->template->build('admin/tao/update_redirect',array(
                    'total' => $total,
                    'page' => $page
                ));
    }
}

/* End of file etsy.php */
/* Location: ./application/controllers/etsy.php */