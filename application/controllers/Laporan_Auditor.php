<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_auditor extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_laporan_auditor','mlap');
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
            $this->load->view('auditorview/audit/_partial/footer.php');
            
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
            $this->load->view('auditorview/audit/_partial/footer.php');
            
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
                'judul'=> "Laporan Perlokasi",
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
                'judul'=> "Laporan Perlokasi",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_belum_sesuai.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

}

/* End of file laporan_auditor.php */


?>