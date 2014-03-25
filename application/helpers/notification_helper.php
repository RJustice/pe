<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('add_notification')){
    function add_notification($type,$id,$channel = ''){
        $ci =& get_instance();
        $ci->load->library('rest');
        $query = 'insert into '.$ci->db->dbprefix('notification').' (title,notification,created,type,channel) values (?,?,?,?,?)';
        $title = '';
        $notification = '';
        $created = date('Y-m-d H:i:s');
        switch ($type) {
            case 'TRADECREATED':
                $title = '有新的交易';
                $notification = '有新的交易: '.$id;
                break;
            case 'TRADECHANGED':
                $title = '交易有更新';
                $notification = '交易有更新: '.$id;
                break;
            case 'ITEMCREATED':
                $title = '新添加的淘宝商品';
                $notification = '新添加的淘宝商品: '.$id;
                break;
            case 'ITEMCHANGED':
                $title = '商品有更新';
                $notification = '商品有更新: '.$id;
                break;
        }
        $ci->db->query($query,array($title,$notification,$created,$type,$channel));
        $notification_id = $ci->db->insert_id();
        $ci->rest->server('https://panel.mywishlists.in/push?id='.$channel);
        $ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $ci->rest->post('',json_encode(array("type"=>$type,'notification_id'=>"$notification_id")),'json');
    }
}