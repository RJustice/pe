<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

    protected $_table;
    public $user = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->_table = $this->db->dbprefix('users');
    }

    function getUser(){

    }

    function checkLogin($username,$password){
        if($this->user){
            return $this->user;
        }
        $query = ' select id,username,name,bind_params,state from '.$this->_table.' where username = ? and password = ? limit 1';
        $rs = $this->db->query($query,array(
                $username,
                md5($password)
            ));
        if($rs->num_rows() > 0){
            $this->user = $rs->row_array();            
            $this->user['bind_params'] = unserialize($this->user['bind_params']);
            $data = array(
                    'logged' => TRUE,
                    'user' => array(
                        'uid' => $this->user['id'],
                        'nick' => $this->user['name'],
                        'bind_state' => ( ! isset($this->user['bind_params']['bind_state']))?array():$this->user['bind_params']['bind_state'],
                        'bind' => ( ! isset($this->user['bind_params']['bind']))?array():$this->user['bind_params']['bind'],
                        'state' => $this->user['state'],
                    )
                );
            $this->session->set_userdata($data);
        }
        return $this->user;
    }

    function bind($app = NULL,$bind_data = NULL){
        if( ! $app || ! $bind_data){
            return FALSE;
        }
        $user = $this->session->userdata('user');
        $uid = $user['uid'];
        $bind_state = $user['bind_state'];
        $bind = $user['bind'];
        // $uid = $this->session->userdata('user.id');
        // $bind_state = $this->session->userdata('user.bind_state');
        // $bind = $this->session->userdata('user.bind'); 
        $bind_state[$app] = TRUE;
        unset($bind[$app]);
        $bind[$app] = $bind_data;
        $data = array(
            'bind_state' => $bind_state,
            'bind' => $bind
        );
        $query = ' update '.$this->_table.' set bind_params = ? where id = ? ';
        $this->db->query($query,array(serialize($data),$uid));
        if($this->db->affected_rows() > 0){
            $this->session->unset_userdata('unbind_data');
            $this->session->unset_userdata('user');
            $this->session->set_userdata('user',array(
                    'uid' => $uid,
                    'nick' => $user['nick'],
                    'bind_state' => $bind_state,
                    'bind' => $bind,
                    'state' => $user['state'],
                ));
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function refresh_taotoken(){
        $this->config->load('oauth2');
        $config = $this->config->item('oauth2');
        $this->load->library('oauth2',$config['taobao']);
        $token = $this->oauth2->access($this->session->userdata('user.bind.taobao.refresh_token'),array('grant_type'=>'refresh_token'));
        $bind_data = array(
                'access_token' => $token['access_token'],
                'expires_in' => $token['expires_in'],
                'refresh_token' => $token['refresh_token'],
                're_expires_in' => $token['re_expires_in'],
                'tao_nick' => urldecode($token['taobao_user_nick']),
                'tao_uid' => $token['taobao_user_id'],
                'createtime' => time()
            );
        $this->bind('taobao',$bind_data);
    }
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */