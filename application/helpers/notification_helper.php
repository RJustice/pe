<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('add_notification')){
    function add_notification($arg=array()){
        if(empty($arg) || !is_array($arg)){
            return FALSE;
        }
        $ci =& get_instance();
        $query = 'insert into '.$ci->db->dbprefix('notification').' (title,notification,created,type,type_model,channel,bind_id) values (?,?,?,?,?,?,?)';
        $ci->db->insert('notification',$arg);
        // $ci->db->query($query,array($title,$notification,$created,$type,$channel));
        // $notification_id = $ci->db->insert_id();
        // $ci->load->library('rest');
        // $ci->rest->server('https://panel.mywishlists.in/push?id='.$channel);
        // $ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        // $ci->rest->post('',json_encode(array("type"=>$type,'notification_id'=>"$notification_id")),'json');
    }
}