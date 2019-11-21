<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login','mlogin');
        
    }
    public function sima_login()
    {
            $data['judul']='Login';
            $this->load->view('v_login',$data);
    }

    public function login()
    {
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);

        $login = $this->mlogin->login($username,$password);
        
        if ($login['status']==true) {
            foreach ($login['data'] as $log ) {
                $data = [
                    'nama' => $log['nama'],
                    'username' => $username,
                    'usergroup' => $log['id_usergroup']
                ];
                $this->session->set_userdata($data);
                if ($log['id_usergroup']) {
                    $this->session->set_flashdata("pesan",'Login Berhasil');
                    redirect('dashboard');
                    
                }
                
            }
        }elseif ($login['status']==false) {
            $this->session->set_flashdata("pesan",'Login Gagal !');
            Redirect('login/sima_login');
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('usergroup');
        
        $this->session->set_flashdata('pesan','<div class="alert alert-success ">Anda Telah <b>Log Out</b>. <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
        Redirect('login/sima_login');
    }

}

/* End of file Controllername.php */
?>