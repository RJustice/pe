<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petsy{
    protected $ci;
    protected $api_key = '5o3iv8habmayo82enj3kp210';
    protected $api_url = 'https://openapi.etsy.com/v2/';

    function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('rest');
        $this->ci->rest->server($this->api_url);
        $this->ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
    }
    
    function getListing($listing_id){
        $uri = 'listings/'.$listing_id;
        $listing = $this->ci->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        if($this->ci->rest->status() == '404'){
            return FALSE;
        }
        return $listing;
    }

    function getListingShpping($listing_id){
        $uri = 'listings/'.$listing_id.'/shipping/info';
        $shipping = $this->ci->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        return $shipping;
    }

    function getListingImages($listing_id){
        $uri = 'listings/'.$listing_id.'/images';
        $images = $this->ci->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        return $images;
    }
}