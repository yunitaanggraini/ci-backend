<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_auditor extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_laporan_auditor','mlapaudit');
        $this->load->model('m_master_data','mmasdat');

        if (!$this->session->userdata('username')) {
            
            redirect('login/login');
            
        }else{
            if ($this->session->userdata('usergroup') != 'UG002') {
                redirect('error');  
            }
        }
    }

    public function Laporan_Unit()
        {
            $data=[
                'judul'=> "Audit Data Unit",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_unit.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

    public function Filter_Cabang()
        {
            $data=[
                'judul'=> "Filter Cabang",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_filter_cabang.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

    public function Filter_Kondisi()
        {
            $data=[
                'judul'=> "Filter Cabang",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_filter_kondisi.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }
    

    public function Lap_Audit_unit()
        {
            $data=[
                'judul'=> "Laporan Audit Unit",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_audit_unit.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

        public function Lap_Perlokasi()
        {
            $data=[
                'judul'=> "Laporan Perlokasi",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_perlokasi.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Lap_sesuai()
        {
            $data=[
                'judul'=> "Laporan Data Sesuai",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_sesuai.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Lap_belum_sesuai()
        {
            $data=[
                'judul'=> "Laporan Data Belum Sesuai",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_belum_sesuai.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Lap_belum_ditemukan()
        {
            $data=[
                'judul'=> "Laporan Belum Ditemukan",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_belum_ditemukan.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Lap_not_ready()
        {
            $data=[
                'judul'=> "Laporan Not Ready",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_not_ready.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }
        //------------------GET DATA--------------//
        public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->mlapaudit->getCabang();
		foreach ($listcabang as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['nama_cabang'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;
		
    }

    //------SEARCH DATA--------//
    public function search_data_jadwal()
    {
        $jadwal = $this->input->post('id');
        $output = '';
        $no = 0;
        $base = base_url();
        // var_dump($usergroup);
        if ($jadwal!= null) {
            $listUserGroup = $this->mmasdat->cariusergroup($usergroup);
        }
        
        if ($listUserGroup) {
            foreach ($listUserGroup as $list) {
                
                $no++;
                $output .='
                <tr> 
                    <td>'.$no.'</td>
                    <td>
                    <a id="'.$list['id_usergroup'].'" class="text-warning"><i class="fa fa-pencil"></i></a>
                    <a href="'.$base.'master_data/delete_usergroup/'.$list['id_usergroup'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['id_usergroup'].' - '.$list['user_group'].' ? ");\'><i class="fa fa-trash"></i></a>
                    </td>
                    <td>'.$list['id_usergroup'].'</td>
                    <td>'.$list['user_group'].'</td>
                </tr>
                
                ';
            }
        }else{
            $output .='
            <tr >
            <td colspan="8" class="text-center">data not found</td>
            </tr>
            ';
        }
        echo $output;
    }

}

/* End of file laporan_auditor.php */


?>