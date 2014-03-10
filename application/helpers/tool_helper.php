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