<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        
    }

    function etsy_listings(){
        //8小时
        $this->load->model('aetsy');
        $query = 'select etsy_id,etsy_price,etsy_params from pe_etsy where ('.time().'-crontime) >28801 order by pe_etsy_id limit 10';
        $rs = $this->db->query($query);
        if($rs->num_rows() > 0){
            foreach($rs->result_array() as $row){
                $listing_id = $row['etsy_id'];
                $listing_price = $row['etsy_price'];
                $etsy_params = unserialize($row['etsy_params']);
                $shipping = $etsy_params['shipping'];
                $live_listing = $this->aetsy->getListing($listing_id);
                if($live_listing){
                    if(isset($live_listing['state'])){
                        if($live_listing['state'] == 'edit'){
                            //update crontime;
                            $this->db->update('etsy',array('crontime' => time()),array('etsy_id'=>$listing_id));
                            continue;
                        }
                        if($live_listing['state'] == 'remove' || $live_listing['state'] == 'sold_out'){
                            //update conntime and state = 0;
                            $this->db->update('etsy',array('crontime'=>time(),'state'=>0),array('etsy_id'=>$listing_id));
                            add_notification(array(
                                    'title' => $listing_id.' sold out.',
                                    'notification' => '',
                                    'created' => date('Y-m-d H:i:s'),
                                    'type' => 'ETSY',
                                    'type_model' => 'SOLD_OUT',
                                    'bind_id' => $listing_id,
                                ));
                            continue;
                        }
                    }
                    $live_price = $live_listing['price'];
                    $live_shipping = $this->aetsy->getListingShipping($listing_id);
                    $live_shipping_price = 0;
                    $shipping_price = 0;
                    if( $live_shipping ){
                        foreach($live_shipping as $ls){
                            if(array_search('Everywhere Else', $ls)){
                                $live_shipping_price = $ls['primary_cost'];
                                break;
                            }
                        }
                        foreach($shipping as $s){
                            if(array_search('Everywhere Else', $s)){
                                $shipping_price = $s['primary_cost'];
                                break;
                            }
                        }
                    }
                    foreach($live_shipping as $ls){
                        $lss[] = array(
                            'origin_country_name' => $ls['origin_country_name'],
                            'destination_country_name' => $ls['destination_country_name'],
                            'currency_code' => $ls['currency_code'],
                            'primary_cost' => $ls['primary_cost'],
                            'secondary_cost' => $ls['secondary_cost'],
                            'primary_cny_price' => getCurrency($ls['currency_code'],'CNY',$ls['primary_cost']),
                            'secondary_cny_price' => getCurrency($ls['currency_code'],'CNY',$ls['secondary_cost']),
                        );
                    }
                    unset($etsy_params['shipping']);
                    $etsy_params['shipping'] = $lss;
                    $this->db->update(
                        'etsy',
                        array(
                                'crontime' => time(),
                                'etsy_price' => $live_price,
                                'cny_price' => getCurrency($live_listing['currency_code'],'CNY',$live_price),
                                'etsy_params' =>  serialize($etsy_params),
                            ),
                        array(
                                'etsy_id' => $listing_id,
                            )
                    );
                    if(($listing_price+$shipping_price) != ($live_price+$live_shipping_price)){
                        $type_model = ( ($listing_price+$shipping_price) > ($live_price+$live_shipping_price) )?'PRICE_DOWN':'PRICE_UP';
                        add_notification(array(
                            'title' => $listing_id.' '.$type_model.'.  Price changed : '.$live_listing['currency_code'] . ' ' .(($live_price+$live_shipping_price) - ($listing_price+$shipping_price)),
                            'notification' => 'Price : '.$listing_price.' --> '.$live_price.' , Shipping Price : '.$shipping_price.' --> '.$live_shipping_price,
                            'created' => date('Y-m-d H:i:s'),
                            'type' => 'ETSY',
                            'type_model' => $type_model,
                            'bind_id' => $listing_id,
                        ));
                    }
                }else{
                    $this->db->update('etsy',array('crontime'=>time()),array('etsy_id'=>$listing_id));
                }
                usleep(500000);
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