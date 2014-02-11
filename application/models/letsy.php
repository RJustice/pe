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
            foreach($rs->result_array() as $row){
                $items[] = $row;
            }
            return $items;
        }
        return FALSE;
    }

    function getTotal(){
        $query = "select FOUND_ROWS() as total";
        $rs = $this->db->query($query);
        return $rs->row_object()->total;
    }

    function getUnLinkedEtsy(){
        
    }

    function storeItem($data){

        $tesyData = array(
                ''
            );

        $query = 'select pe_etsy_id from '.$this->_table.' where etsy_id = ?';
        $ex = $this->db->query($query,array($data['listing_id']));
        if($ex->num_rows() > 0){
            $pe_etsy_id = $ex->result_object()->pe_etsy_id;
        }else{

        }
        return TRUE;
    }
}

/* End of file letsy.php */
/* Location: ./application/models/letsy.php */