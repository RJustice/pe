<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LTao extends CI_Model {

    protected $_table;

    function __construct(){
        parent::__construct();
        $this->_table = $this->db->dbprefix('tao');
    }
    
    function getItems($page = 1,$limit = 20){
        $query = 'select SQL_CALC_FOUND_ROWS * from '.$this->_table.' where uid = ? and tao_nick = ? order by tao_id desc limit ?,?';
        $rs = $this->db->query($query,array(
                $this->session->userdata('user.uid'),
                $this->session->userdata('user.band.taobao.tao_nick'),
                (($page -1) * $limit),
                $limit
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
        $query = 'select FOUND_ROWS() as total';
        $rs = $this->db->query($query);
        return $rs->row_object()->total;
    }

    function getUnLinkedTao(){
        
    }

    function updateTaoItems($data){
        $query = 'select tao_id from '.$this->_table. ' where uid = ? and tao_nick = ? ';
        $rs = $this->db->query($query,array($this->session->userdata('user.uid'),$data[0]['nick']));
        $tao_ids = array();
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $tao_ids[] = $row['tao_id'];
            }
        }
        foreach($data as $item){
            $tao_params = array(
                'approve_status' => $item['approve_status'],
                'cid' => $item['cid'],
                'props' => $item['props']
            );
            if(in_array($item['iid'], $tao_ids)){
                $query = 'update '.$this->_table.' set tao_title = ? , tao_price = ? , tao_qty = ? , tao_params = ? ,tao_img = ? where tao_id = ?';
                $this->db->query($query,array($item['title'],$item['price'],$item['num'],serialize($tao_params),$item['pic_url'],$item['iid']));
            }else{
                $insert_data = array(
                   'uid' => $this->session->userdata('user.uid'),
                   'tao_id' => $item['iid'],
                   'tao_nick' => $item['nick'],
                   'tao_storeid' => $this->session->userdata('user.shop.storeid'),
                   'tao_title' => $item['title'],
                   'tao_price' => $item['price'],
                   'tao_qty' => $item['num'],
                   'tao_params' => serialize($tao_params),
                   'tao_img' => $item['pic_url']
                );
                $this->db->insert($this->_table, $insert_data);
            }            
        }
    }
}

/* End of file ltao.php */
/* Location: ./application/models/ltao.php */