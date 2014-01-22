<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('add_theme_js')){
    function add_theme_js($sources = array()){
        $CI =& get_instance();
        if( ! is_array($sources)){
            $sources = array($sources);
        }
        $theme = $CI->template->get_theme();
        $theme_path = $CI->template->get_theme_path();
        $source_output = '';
        foreach($sources as $source){
            $source_url= $theme_path . $source;
            $data[] = $source_url;
            $source_output .= '<script src="'.base_url($source_url).'" ></script>';
        }
        return $source_output;
    }
}

if( ! function_exists('add_theme_css')){
    function add_theme_css($sources = array()){
        $CI =& get_instance();
        if( ! is_array($sources)){
            $sources = array($sources);
        }
        $theme = $CI->template->get_theme();
        $theme_path = $CI->template->get_theme_path();
        $source_output = '';
        foreach($sources as $source){
            $source_url= $theme_path . $source;
            $data[] = $source_url;
            $source_output .= '<link href="'.base_url($source_url).'" rel="stylesheet">';
        }
        return $source_output;
    }
}