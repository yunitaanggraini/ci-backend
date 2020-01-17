<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        ini_set('max_execution_time', 0);
        parent::__construct();
        $this->load->model('m_dashboard', 'mdashboard');
        $this->load->model('m_transaksi_auditor', 'mtransauditor');

        $this->load->model('m_master_data', 'mmasdat');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Login Dulu!</div>');
            redirect('login/sima_login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->mmasdat->countuser();
        $data['usergroup'] = $this->mmasdat->buatkodeusergroup();
        $data['auditunit'] = $this->mtransauditor->countunit1();
        $data['auditpart'] = $this->mtransauditor->countpart1(null);
        $this->load->view('_partial/header.php', $data);
        $this->load->view('_partial/sidebar.php');
        $this->load->view('v_dashboard', $data);
        $this->load->view('general_affairview/user/_partial/footer.php');
    }
}

/* End of file Dashboard.php */
