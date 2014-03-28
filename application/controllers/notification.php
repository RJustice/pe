<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_notification');
        $this->template->set_partial('menu','common/admin_menu');
        $this->template->set_partial('submenu','admin/notification/notification_submenu');
    }

    public function index()
    {   
        $type = $this->uri->segment(3);
        $type_model = $this->uri->segment(4);
        //var_dump($this->session->userdata('channel'));
        $notifications = $this->m_notification->getNotification($type,$type_model);
        $this->template->build('admin/notification/notification',array('notifications'=>$notifications));
    }

}

/* End of file notification.php */
/* Location: ./application/controllers/notification.php */