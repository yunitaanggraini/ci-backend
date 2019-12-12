<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_config','mconfig');
        if (!$this->session->userdata('username')) {
            
            redirect('login/login');
            
        }else{
            if ($this->session->userdata('usergroup') != 'UG005') {
                redirect('error');  
            }
        }
        
    }
    
    public function Config()
    {
        
        $data= [
            'judul' => 'Config Data',
            'tampil' => $this->mconfig->getConfig()
        ];
        $this->load->view('config_data/v_config', $data);
        
        
    }

    public function put_config()
    {
        $data = [
            'id'    =>$this->input->post('id',true),
            'ip'        =>$this->input->post('ip',true),   
            'username'  => $this->input->post('username',true),
            'password'  => $this->input->post('password',true),
            'db'  => $this->input->post('db',true),
        ];

                $exec = $this->mconfig->UpdateUserConfig($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('login/login');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('login/login');
                }
        
    }

}

/* End of file Config.php */
