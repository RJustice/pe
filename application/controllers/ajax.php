<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if( ! is_logged(FALSE)){
            echo json_encode(array('state'=>FALSE,'msg'=>'Please Login'));
            exit;
        }
    }

    public function index()
    {
        exit('Go Away');
    }

    function homology(){
        $ids = $this->input->post('ids',TRUE);
        if( empty($ids) || count(explode(',', $ids)) < 2){
            echo json_encode(array('state'=>FALSE,'msg'=>'Empty IDs Or More Then Two'));
            exit;
        }
        $this->load->model('letsy');
        if($this->letsy->setHomology($ids)){
            echo json_encode(array('state'=>TRUE,'msg'=>'SUCCESS'));
            exit;
        }else{
            echo json_encode(array('state'=>FALSE,'msg'=>'TRY AGAIN'));
            exit;
        }
    }

    function TaoLinkedEtsys(){
        $id = $this->input->get('pe_etsy_id',TRUE);
        if(empty($id)){
            if($this->uri->segment(3) === FALSE ){
                echo json_encode(array('state'=>FALSE,'msg'=>'ID Empty'));
                exit;
            }
            $id = $this->uri->segment(3);
        }
        $this->load->model('letsy');
        if($listings = $this->letsy->getTaoLinkedListings($id)){
            echo json_encode(array('state'=>TRUE,'data'=>array('total'=>count($listings),'listings'=>$listings)));
        }else{
            echo json_encode(array('state'=>FALSE,'msg'=>'Empty'));
        }
    }
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */