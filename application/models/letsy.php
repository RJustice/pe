<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LEtsy extends CI_Model {

    public $_table;
    public $total;

    public function __construct()
    {
        parent::__construct();
        $this->_table = $this->db->dbprefix('etsy');
        $this->load->library('currency');
    }

    function getItems($page =1,$limit =20){
        $query = 'select SQL_CALC_FOUND_ROWS * from '.$this->_table.' limit ?,? ';
        $rs = $this->db->query($query,array(
                ($page-1) * $limit,
                $limit,
            ));
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $row['etsy_params'] = unserialize($row['etsy_params']);
                $items[] = $row;
            }
            return $items;
        }
        return FALSE;
    }

    function getTotal(){
        $query = "select FOUND_ROWS() as total";
        $rs = $this->db->query($query);
        return $rs->row()->total;
    }

    function getUnLinkedEtsy(){
        $query = 'select pe_etsy_id,etsy_id,etsy_title,etsy_img,etsy_params from '.$this->_table.' where linked = 0 ';
        $rs = $this->db->query($query);
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return FALSE;
    }

    function storeItem($data){
        foreach($data['images'] as $img){
            $images[] = array(
                    'full_height' => $img['full_height'],
                    'full_width' => $img['full_width'],
                    'full' => $img['url_fullxfull'],
                    '570' => $img['url_570xN'],
                    '170' => $img['url_170x135'],
                    '75' => $img['url_75x75']
            );
        }

        foreach($data['shipping'] as $shipping){
            $shippings[] = array(
                'origin_country_name' => $shipping['origin_country_name'],
                'destination_country_name' => $shipping['destination_country_name'],
                'currency_code' => $shipping['currency_code'],
                'primary_cost' => $shipping['primary_cost'],
                'secondary_cost' => $shipping['secondary_cost'],
                'primary_cny_price' => $this->currency->getCurrency($shipping['currency_code'],'CNY',$shipping['primary_cost']),
                'secondary_cny_price' => $this->currency->getCurrency($shipping['currency_code'],'CNY',$shipping['secondary_cost']),
            );
        }
        $etsyData = array(
                'uid' => $this->session->userdata('user.uid'),
                'etsy_id' => $data['listing_id'],
                'etsy_title' => $data['title'],
                'etsy_price' => $data['price'],
                'cny_price' => $this->currency->getCurrency($data['currency_code'],'CNY',$data['price']),
                'etsy_qty' => $data['quantity'],
                'etsy_img' => $data['images'][0]['url_75x75'],
                'etsy_currency' => $data['currency_code'],
                'etsy_params' => serialize(array(
                    'images' => $images,
                    'shipping' => $shippings
                ))
            );
        $query = 'select pe_etsy_id from '.$this->_table.' where etsy_id = ?';
        $ex = $this->db->query($query,array($data['listing_id']));
        if($ex->num_rows() > 0){
            $pe_etsy_id = $ex->row()->pe_etsy_id;
            $this->db->update('etsy',$etsyData,array('pe_etsy_id' => $pe_etsy_id));
        }else{
            if(!$data['homology']){
                $etsyData['homology'] = random_string('alnum',6);
            }else{
                $etsyData['homology'] = $data['homology'];
            }            
            $this->db->insert('etsy',$etsyData);
            return $etsyData['homology'];
        }
        return TRUE;
    }

    function linkTao($data){
        $update_data = array(
            'linked' => 1,
            'tao_id' => $data['tao_id'],
            'pe_tao_id' => $data['pe_tao_id'],
        );
        $this->db->update('etsy',$update_data,'pe_etsy_id = '.$data['pe_etsy_id']);
    }

    function getAllLinkedListings($page = 1,$limit = 20){
        $query = 'select SQL_CALC_FOUND_ROWS etsy_id from '.$this->_table.' where linked = 1 limit ?,?' ;
        $rs = $this->db->query($query,array( ($page-1)*$limit,$limit ));
        if($rs->num_rows() > 0){            
            foreach($rs->result_array() as $row){
                $listing_ids[] = $row['etsy_id'];
            }
            return $listing_ids;
        }
        return FALSE;
    }

    function updateLocalhostListing($data){
        if(isset($data['state']) && $data['state'] == 'sold_out'){
            $this->db->query('update '.$this->_table.' set state = 0 where etsy_id = '.$data['listing_id']);
            return ;
        }
        $update_data = array(
            'etsy_title' => $data['title'],
            'etsy_price' => $data['price'],
            'cny_price' => $this->currency->getCurrency($data['currency_code'],'CNY',$data['price']),
            'etsy_qty' => $data['quantity'],
            'etsy_currency' => $data['currency_code'],
        );
        $this->db->update('etsy',$update_data,'etsy_id = '.$data['listing_id']);
        return ;
    }
}

/* End of file letsy.php */
/* Location: ./application/models/letsy.php */