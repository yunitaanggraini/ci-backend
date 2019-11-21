<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard','mdashboard');
        
    }

    public function index()
    {
        $data['judul']='Dashboard';
        $this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('v_dashboard',$data);
        $this->load->view('general_affairview/user/_partial/footer.php');
    }

}

/* End of file Dashboard.php */

?>