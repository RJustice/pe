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

if( ! function_exists('is_band_taobao')){
    function is_band_taobao(){
        $ci =& get_instance();
        if($ci->session->userdata('user.band_state.taobao')){
            return TRUE;
        }
        return FALSE;
    }
}