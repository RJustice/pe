<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
    }

    function etsy_listings(){
        //8小时
        $this->load->model('aetsy');
        $query = 'select etsy_id,etsy_price,etsy_params from pe_etsy where ('.time().'-crontime) >28800 order by pe_etsy_id limit 20';
        $rs = $this->db->query($query);
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $live_listing = $this->aetsy->getListing($row['etsy_id']);
                if($live_listing){
                    if(isset($live_listing['state']) && $live_listing['state'] == 'sold_out'){
                        //售完
                        $type_model = 'SOLD_OUT';
                        add_notification();
                    }elseif($row['etsy_price'] != $live_listing['price']){
                        //修改价格
                        $type_model = ($row['etsy_price'] > $live_listing['price'])?'PRICE_DOWN':'PRICE_UP';
                        add_notification();
                    }elseif(1){

                    }
                }
            }
        }
    }

    function tmc(){
        $this->load->model('m_tmc');
        $this->m_tmc->doMessages('sandbox_vip');
    }

    function currency(){
        $this->load->library('currency');
        $this->currency->updateCurrencies();
    }

}

/* End of file cron.php */
/* Location: ./application/controllers/cron.php */