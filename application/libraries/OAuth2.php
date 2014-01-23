<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OAuth2{
    protected $ci;

    public $state_key = 'state';

    public $error_key = 'error';

    public $client_id_key = 'client_id';

    public $client_secret_key = 'client_secret';

    public $redirect_uri_key = 'redirect_uri';

    public $access_token_key = 'access_token';

    public $uid_key = 'uid';

    public $callback;
    protected $params = array();
    protected $method = 'GET';
    protected $scope;
    protected $scope_seperator = ',';
    protected $oauth_server = '';
    protected $authorize_uri = '';
    protected $access_token_uri = '';

    public function __construct(array $config = array())
    {
        $this->ci =& get_instance();
        $this->client_id = $config['app_key'];
        $this->oauth_server = $config['oauth_server'];
        if (substr($this->oauth_server, -1, 1) != '/')
        {
            $this->oauth_server .= '/';
        }
        $this->authorize_uri = isset($config['authorize_uri']) && !empty($config['authorize_uri'])?$config['authorize_uri']:'authorize';
        $this->access_token_uri = isset($config['access_token_uri']) && !empty($config['access_token_uri'])?$config['access_token_uri']:'token';
        $this->client_secret = $config['secret_key'];

        isset($config['callback']) && $this->callback = $config['callback'];
        isset($config['scope']) && $this->scope = $config['scope'];

        $this->redirect_uri =  isset($config['redirect_uri']) && !empty($config['redirect_uri']) ? $config['redirect_uri'] : site_url(get_instance()->uri->uri_string());
    }

    function authorize(){
        $state = md5(uniqid(rand(),TRUE));
        $this->ci->session->set_userdata('state',$state);
        $params = array(
            $this->client_id_key => $this->client_id,
            $this->redirect_uri_key => $this->redirect_uri,
            $this->state_key => $state,
            'scope' => is_array($this->scope) ? implode($this->scope_seperator, $this->scope) : $this->scope,
            'response_type' => 'code',
            'approval_prompt' =>'force'
            );
        $params = array_merge($params,$this->params);
        redirect($this->oauth_server.$this->authorize_uri.'?'.http_build_query($params));
    }
    
    function access($code,$options =array()){
        if(isset($_GET[$this->state_key]) && $_GET[$this->state_key] != $this->ci->session->userdata('state')){
            exit('The state code does no match');
        }

        $params = array(
            $this->client_id_key => $this->client_id,
            $this->client_secret_key => $this->client_secret,
            'grant_type' => isset($options['grant_type'])? $options['grant_type']:'authorization_code',
            );
        $params = array_merge($params,$this->params);
        switch($params['grant_type']){
            case 'authorization_code':
                $params['code'] = $code;
                $params[$this->redirect_uri_key] = $this->redirect_uri;
            break;
            case 'refresh_token':
                $params['refresh_token'] = $code;
            break;
        }
        $response = NULL;
        $this->ci->load->library('rest');
        $this->ci->rest->server($this->oauth_server);
        $this->ci->rest->option(CURLOPT_SSL_VERIFYPEER,FALSE);
        $return = $this->ci->rest->post($this->access_token_uri,$params,'json');
        // $this->ci->rest->debug();
        //var_dump($return);exit;
        return $return;
    }
}

/* End of file OAuth2.php */
/* Location: ./application/libraries/OAuth2.php */
