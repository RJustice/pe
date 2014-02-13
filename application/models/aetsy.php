<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AEtsy extends CI_Model {
    protected $api_key = '5o3iv8habmayo82enj3kp210';
    protected $api_url = 'https://openapi.etsy.com/v2/';

    function __construct(){
        $this->load->library('rest');
    }
    
    function getListing($listing_id){
        $uri = 'listings/'.$listing_id;
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $listing = $this->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        $this->rest->debug();
        if($this->rest->status() == '404'){
            return FALSE;
        }
        return $listing['results'][0];
    }

    function getListingShipping($listing_id){
        $uri = 'listings/'.$listing_id.'/shipping/info';
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $shipping = $this->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        if($this->rest->status() == '404'){
            return FALSE;
        }
        return $shipping['results'];
    }

    function getListingImages($listing_id){
        $uri = 'listings/'.$listing_id.'/images';
        $this->rest->server($this->api_url);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $images = $this->rest->get($uri,array(
                'api_key' => $this->api_key,
            ),'json');
        if($this->rest->status() == '404'){
            return FALSE;
        }
        return $images['results'];
    }

    function updateListings($listing_ids){
        $this->load->model('letsy');
        foreach($listing_ids as $listing_id){
            $listing = $this->getListing($listing_id);
            $this->letsy->updateLocalhostListing($listing);
            usleep(500000);
        }
    }
}