<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index(){
        is_logged();
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->build('admin/user/main');
    }

    public function login()
    {
        if(is_logged(FALSE)){
            redirect('admin/panel');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        if($this->form_validation->run() == FALSE){
            $this->template->build('admin/user/login_form');
        }else{
            $username = $this->input->post('username',TRUE);
            $password = $this->input->post('password',TRUE);
            $user = $this->m_user->checkLogin($username,$password);
            if( ! $user){
                $data['error'] = '<div class="alert alert-danger">Login Failed</div>';
                $this->template->build('admin/user/login_form',$data);
            }else{
                if($this->session->userdata('unbind_data')){
                    $this->m_user->bind($this->session->userdata('unbind_data.app'),$this->session->userdata('unbind_data.data'));
                    redirect('admin/panel');
                }else{
                    if(is_bind_taobao()){
                        $this->refresh_token();
                    }else{
                        redirect('admin/panel');
                    }
                }
            }
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('user/login');
    }

    function bindtao(){
        $provider = 'taobao';
        if(empty($provider)){
            redirect('404');
            exit('ERROR');
        }
        $this->config->load('oauth2');
        $config = $this->config->item('oauth2');
        if(!isset($config[$provider])){
            redirect('404');
            exit('ERROR');
        }
        // var_dump($oauth_config);exit;
        $this->load->library('oauth2',$config[$provider]);
        $code = $this->input->get('code',TRUE);
        if(!$code){
            $this->oauth2->authorize();
        }else{
            $token = $this->oauth2->access($code);
        }
        if(isset($token['error'])){
            exit('验证过期,请返回重新验证');
        }
        $this->rest->server($config[$provider]['no_access_gateways']);
        $this->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $params = array(
            'access_token' => $token['access_token'],
            'method' => 'taobao.user.seller.get',
            'v' => $config[$provider]['v'],
            'format' => 'json',
            'fields' => 'user_id,nick,avatar'
            );
        $tao_user = $this->rest->get('rest',$params,'json');
        $bind_data = array(
                'access_token' => $token['access_token'],
                'expires_in' => $token['expires_in'],
                'refresh_token' => $token['refresh_token'],
                're_expires_in' => $token['re_expires_in'],
                'tao_nick' => urldecode($token['taobao_user_nick']),
                'tao_uid' => $token['taobao_user_id'],
                'tao_avatar' => $tao_user['user_seller_get_response']['user']['avatar'],
                'createtime' => time()
            );
        if(is_logged(FALSE)){
            $this->m_user->bind($provider,$bind_data);
            redirect('admin/panel');
        }else{
            $this->session->set_userdata('unbind_data',array('app'=>$provider,'data'=>$bind_data));
            redirect('user/login');
        }
    }

    function refresh_token(){
        if(is_taooauth_expires()){
            $this->bindtao();
        }else{
            $this->m_user->refresh_taotoken();
            redirect('admin/panel');
        }
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */