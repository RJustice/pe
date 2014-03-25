<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmc extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tmc');
    }
    function index(){
        //var_dump($this->session->userdata('user'));
    }

    function messagesConsume(){
        $messages = $this->m_tmc->tmcMessagesConsume('sandbox_vip');
        foreach($messages as $k=>$message){
            //$message['content'] = json_decode($messages['content']);
            var_dump($message['content']);
            $messages[$k]['content'] = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', trim($message['content'])),TRUE);
        }
        echo "<pre>";
        var_dump($messages);
        echo "</pre>";
    }

    function tmcTest(){
        $this->m_tmc->doMessages('sandbox_vip');
    }

    function messagesConfirm(){
        
    }
}

/* End of file noticifation.php */
/* Location: ./application/controllers/noticifation.php */