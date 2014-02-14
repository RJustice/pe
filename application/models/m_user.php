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
        $query = ' select id,username,name,band_params,state from '.$this->_table.' where username = ? and password = ? limit 1';
        $rs = $this->db->query($query,array(
                $username,
                md5($password)
            ));
        if($rs->num_rows() > 0){
            $this->user = $rs->row_array();            
            $this->user['band_params'] = unserialize($this->user['band_params']);
            $data = array(
                    'logged' => TRUE,
                    'user' => array(
                        'uid' => $this->user['id'],
                        'nick' => $this->user['name'],
                        'band_state' => ( ! isset($this->user['band_params']['band_state']))?array():$this->user['band_params']['band_state'],
                        'band' => ( ! isset($this->user['band_params']['band']))?array():$this->user['band_params']['band'],
                        'state' => $this->user['state'],
                    )
                );
            $this->session->set_userdata($data);
        }
        return $this->user;
    }

    function band($app = NULL,$band_data = NULL){
        if( ! $app || ! $band_data){
            return FALSE;
        }
        $user = $this->session->userdata('user');
        $uid = $user['uid'];
        $band_state = $user['band_state'];
        $band = $user['band'];
        // $uid = $this->session->userdata('user.id');
        // $band_state = $this->session->userdata('user.band_state');
        // $band = $this->session->userdata('user.band'); 
        $band_state[$app] = TRUE;
        unset($band[$app]);
        $band[$app] = $band_data;
        $data = array(
            'band_state' => $band_state,
            'band' => $band
        );
        $query = ' update '.$this->_table.' set band_params = ? where id = ? ';
        $this->db->query($query,array(serialize($data),$uid));
        if($this->db->affected_rows() > 0){
            $this->session->unset_userdata('unband_data');
            $this->session->unset_userdata('user');
            $this->session->set_userdata('user',array(
                    'uid' => $uid,
                    'nick' => $user['nick'],
                    'band_state' => $band_state,
                    'band' => $band,
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
        $token = $this->oauth2->access($this->session->userdata('user.band.taobao.refresh_token'),array('grant_type'=>'refresh_token'));
        $band_data = array(
                'access_token' => $token['access_token'],
                'expires_in' => $token['expires_in'],
                'refresh_token' => $token['refresh_token'],
                're_expires_in' => $token['re_expires_in'],
                'tao_nick' => urldecode($token['taobao_user_nick']),
                'tao_uid' => $token['taobao_user_id'],
                'createtime' => time()
            );
        $this->band('taobao',$band_data);
    }
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */