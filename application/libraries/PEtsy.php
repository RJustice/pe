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
        $this->ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $listing = $this->ci->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        if($this->ci->rest->status() == '404'){
            return FALSE;
        }
        return $listing['results'][0];
    }

    function getListingShipping($listing_id){
        $uri = 'listings/'.$listing_id.'/shipping/info';
        $this->ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $shipping = $this->ci->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        if($this->ci->rest->status() == '404'){
            return FALSE;
        }
        return $shipping['results'];
    }

    function getListingImages($listing_id){
        $uri = 'listings/'.$listing_id.'/images';
        $this->ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $images = $this->ci->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        if($this->ci->rest->status() == '404'){
            return FALSE;
        }
        return $images['results'];
    }
}