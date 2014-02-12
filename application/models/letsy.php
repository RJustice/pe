<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LEtsy extends CI_Model {

    public $_table;

    public function __construct()
    {
        parent::__construct();
        $this->_table = $this->db->dbprefix('etsy');
    }

    function getItems($page =1,$limit =20){
        $query = 'select SQL_CALC_FOUND_ROWS * from '.$this->_table.' limit ?,? ';
        $rs = $this->db->query($query,array(
                ($page-1) * $limit,
                $limit,
            ));
        if($rs->num_rows() > 0){
            $this->load->library('currency');
            foreach($rs->result_array() as $row){
                $row['etsy_params'] = unserialize($row['etsy_params']);
                $row['cny'] = $this->currency->getCurrency($row['etsy_currency'],'CNY');
                $row['cny'] = number_format($row['cny'] * $row['etsy_price'],2,'.',' ');
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
        $query = 'select pe_etsy_id,etsy_id,etsy_title,etsy_img from '.$this->_table.' where linked = 0 ';
        $rs = $this->db->query($query);
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return FALSE;
    }

    function storeItem($data){
        $etsyData = array(
                'uid' => $this->session->userdata('user.uid'),
                'etsy_id' => $data['listing_id'],
                'etsy_title' => $data['title'],
                'etsy_price' => $data['price'],
                'etsy_qty' => $data['quantity'],
                'etsy_img' => $data['images'][0]['url_75x75'],
                'etsy_currency' => $data['currency_code'],
                'etsy_params' => serialize(array(
                    'images' => $data['images'],
                    'shipping' => $data['shipping']
                ))
            );
        $images = array();
        $query = 'select pe_etsy_id from '.$this->_table.' where etsy_id = ?';
        $ex = $this->db->query($query,array($data['listing_id']));
        if($ex->num_rows() > 0){
            $pe_etsy_id = $ex->row()->pe_etsy_id;
            $this->db->update('etsy',$etsyData,array('pe_etsy_id' => $pe_etsy_id));
        }else{
            $this->db->insert('etsy',$etsyData);
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
            return $rs->result_array();
        }
        return FALSE;
    }
}

/* End of file letsy.php */
/* Location: ./application/models/letsy.php */