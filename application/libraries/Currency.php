<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency{
    protected $ci;
    protected $api = 'http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/';

    function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('rest');
    }

    function updateCurrencies(){
        $uri = 'quote';
        $params = array('format'=>'json');
        $this->ci->rest->server($this->api);
        $currencies = $this->ci->rest->get($uri,$params,'json');
        foreach($currencies['resources'] as $currency){
            if($currency['resources']['fields']['volume'] != 0){
                continue;
            }
            $data = array(
                'currency_code' => $currency['resources']['fields']['name'],
                'value' => $currency['resources']['fields']['price'],
            );
            $this->ci->db->query('update pe_currency set value = ? where currency_code = ?',array($data['value'],$data['currency_code']));
        }
        return TRUE;
    }

    function initCurrency(){
        $uri = 'quote';
        $params = array('format'=>'json');
        $this->ci->rest->server($this->api);
        $currencies = $this->ci->rest->get($uri,$params,'json');
        foreach($currencies['list']['resources'] as $currency){
            if($currency['resource']['fields']['volume'] != 0){
                continue;
            }
            $data = array(
                'currency_code' => $currency['resource']['fields']['name'],
                'value' => $currency['resource']['fields']['price'],
            );
            $this->ci->db->insert('currency',$data);
        }
        return TRUE;
    }

    function getCurrency($from,$to,$count =1){
        if($from == 'USD'){
            $currency = $this->ci->db->query('select value from pe_currency where currency_code = ?',array('USD/'.$to));
            if($currency->num_rows() > 0){
                return number_format($currency->row()->value * $count,4,'.','');
            }
            return FALSE;
        }else{
            $rs = $this->ci->db->query('select currency_code,value from pe_currency where currency_code = ? or currency_code = ?',array('USD/'.$from,'USD/'.$to));
            if($rs->num_rows() == 2 ){
                $c1 = $rs->row_array(0);
                $c2 = $rs->row_array(1);
                $cto = $c1['currency_code'] == 'USD/'.$to ?$c1['value']:$c2['value'];
                $cfrom = $c1['currency_code'] == 'USD/'.$from ?$c1['value']:$c2['value'];
                $currency =floatval( $cto / $cfrom);
                return number_format($currency * $count,4,'.','');
            }
            return FALSE;
        }
    }
}