<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LTao extends CI_Model {

    protected $_table;
    protected $_etable;

    function __construct(){
        parent::__construct();
        $this->_table = $this->db->dbprefix('tao');
        $this->_etable = $this->db->dbprefix('etsy');
    }
    
    function getItems($page = 1,$limit = 20){
        $query = 'select SQL_CALC_FOUND_ROWS * from '.$this->_table.' where uid = ? and tao_nick = ? order by tao_id desc limit ?,?';
        $rs = $this->db->query($query,array(
                $this->session->userdata('user.uid'),
                $this->session->userdata('user.bind.taobao.tao_nick'),
                (($page -1) * $limit),
                $limit
            ));
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $row['tao_params'] = unserialize($row['tao_params']);
                $row['etsy_info'] = $row['linked'] ? unserialize($row['etsy_info']) : '';
                $items[] = $row;
            }
            return $items;
            // return $rs->result_array();
        }
        return FALSE;
    }

    function getTotal(){
        $query = 'select FOUND_ROWS() as total';
        $rs = $this->db->query($query);
        return $rs->row()->total;
    }

    function getUnLinkedTao(){
         $query = 'select pe_tao_id,tao_id,tao_title,tao_img from '.$this->_table.' where linked = 0 ';
        $rs = $this->db->query($query);
        if($rs->num_rows() > 0){
            return $rs->result_array();
        }
        return FALSE;
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
                   'tao_img' => $item['pic_url'],
                );
                $this->db->insert($this->_table, $insert_data);
            }            
        }
    }

    function linkEtsy($data){
        $update_data = array(
            'linked' => 1,
            'etsy_id' => $data['etsy_id'],
            'pe_etsy_id' => $data['pe_etsy_id'],
        );
        $this->load->library('currency');
        $etsy = $this->db->query('select etsy_price,etsy_currency,cny_price,etsy_img,etsy_params from '.$this->_etable.' where pe_etsy_id = '.$data['pe_etsy_id']);
        $etsy_params = unserialize($etsy->row()->etsy_params);
        $update_data['etsy_info'] = serialize(array(
                'etsy_img' => $etsy->row()->etsy_img,
                'etsy_price' => $etsy->row()->etsy_price,
                'etsy_currency' => $etsy->row()->etsy_currency,
                'cny_price' => $etsy->row()->cny_price,
                'etsy_shipping' => $etsy_params['shipping']
            ));
        $this->db->update('tao',$update_data,'pe_tao_id = '.$data['pe_tao_id']);
    }
}

/* End of file ltao.php */
/* Location: ./application/models/ltao.php */