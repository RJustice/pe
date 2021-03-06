<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('is_logged')){
    function is_logged($redirect = TRUE){
        $ci = & get_instance();
        //var_dump($ci->session->userdata('logged'));
        if(!$ci->session->userdata('logged')){
            if($redirect){
                redirect('user/login');
            }else{
                return FALSE;
            }
        }
        return TRUE;
    }
}

if( ! function_exists('is_bind_taobao')){
    function is_bind_taobao(){
        $ci =& get_instance();
        if($ci->session->userdata('user.bind_state.taobao')){
            return TRUE;
        }
        return FALSE;
    }
}

if( ! function_exists('is_taooauth_expires()')){
    function is_taooauth_expires(){
        $ci = & get_instance();
        $exp_time = $ci->session->userdata('user.bind.taobao.expires_in');
        $create_time = $ci->session->userdata('user.bind.taobao.createtime');
        $now = time();
        if( ($now - $create_time) > $exp_time ){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}