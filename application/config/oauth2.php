<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*$config['oauth2']['taobao'] = array(
        'app_key' => '21737938',
        'secret_key' => 'e971795e501407b75200113f60bc173e',
        'gateways' => 'https://gw.api.taobao.com/router/',
        'oauth_server' => 'https://oauth.taobao.com/',
        'redirect_uri' => 'https://panel.mywishlists.in/user/bindtao/',
        'v'=>'2.0',
        'format' => 'json',
);*/

//sandbox
$config['oauth2']['taobao'] = array(
        'app_key' => '1021722121',
        'secret_key' => 'sandbox539bc4391566ed029650d0c5e',
        'gateways' => 'http://gw.api.tbsandbox.com/router/',
        'oauth_server' => 'https://oauth.tbsandbox.com/',
        'redirect_uri' => 'http://pe.example.com/user/bindtao/',
        'v'=>'2.0',
        'format' => 'json',
        'sandbox' => TRUE,
        'sign_method' => 'md5',
        'tmc_sandbox' => 'ws://mc.api.tbsandbox.com/',
        'tmc' => 'ws://mc.api.taobao.com/'
);