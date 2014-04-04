<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('trade_status')){
    function trade_status($status){
        $trade_status = array(
            'TRADE_NO_CREATE_PAY' => '没有创建支付宝交易',
            'WAIT_BUYER_PAY' => '等待买家付款',
            'SELLER_CONSIGNED_PART' => '卖家部分发货',
            'WAIT_SELLER_SEND_GOODS' => '等待卖家发货',
            'WAIT_BUYER_CONFIRM_GOODS' => '等待买家确认收货',
            'TRADE_BUYER_SIGNED' => '买家已签收',
            'TRADE_FINISHED' => '交易成功',
            'TRADE_CLOSED' => '交易关闭①',
            'TRADE_CLOSED_BY_TAOBAO' => '交易关闭②',
            'UNCONFIRM' => '未确认'
        );
        if( ! isset($trade_status[$status])){
            return '未知状态';
        }
        return $trade_status[$status];
    }
}

if( ! function_exists('getCurrency')){
    function getCurrency($from,$to,$count =1){
        $ci = & get_instance();
        if($from == 'USD'){
            $currency = $ci->db->query('select value from pe_currency where currency_code = ?',array('USD/'.$to));
            if($currency->num_rows() > 0){
                return number_format($currency->row()->value * $count,4,'.','');
            }
            return FALSE;
        }else{
            $rs = $ci->db->query('select currency_code,value from pe_currency where currency_code = ? or currency_code = ?',array('USD/'.$from,'USD/'.$to));
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

// if( ! function_exists('trade_merge')){
//     function trade_merge($trade1,$trade2){
//         $trade = array_merge($trade1,$trade2);
//         $trade = 
//         echo "<pre>";
//         var_dump($trade);
//         echo "</pre>";exit;
//         return $trade;
//     }
// }