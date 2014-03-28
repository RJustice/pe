<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Notification extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    function getNotification($type='',$type_model='',$status = 0){
        $query = "select * from ".$this->db->dbprefix('notification')." where channel = ? ";
        $where = 'and status = ? ';
        $data = array($this->session->userdata('channel'),$status);
        if($type){
            $where = '  and type = ? ';
            $data[] = $type;
        }
        if($type_model){
            $where = ' and type_model = ? ';
            $data[] = $type_model;
        }

        $rs = $this->db->query($query.$where,$data);
        if($rs->num_rows() > 0){
            // foreach($rs->result_array() as $row){
            //     $notifications[$row['type']][] = $row;
            // }
            // return $notifications;
            return $rs->result_array();
        }
        // return FALSE;
        return array();
    }

}

/* End of file m_notification.php */
/* Location: ./application/models/m_notification.php */