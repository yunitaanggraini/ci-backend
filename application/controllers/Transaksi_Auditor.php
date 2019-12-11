<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Auditor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_transaksi_auditor','mtransauditor');
        if (!$this->session->userdata('username')) {
            
            redirect('login/login');
            
        }else{
            if ($this->session->userdata('usergroup') != 'UG002') {
                redirect('error');  
            }
        }
    }

    public function Audit()
        {
            $data=[
                'judul'=> "Teporary Data Unit",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit/v_audit.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Manual_Audit()
        {
            $data=[
                'judul'=> "Manual Audit",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit/v_manual.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Scaning_Audit()
        {
            $data=[
                'judul'=> "Scaning Audit",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit/v_scaning.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Audit_Unit()
        {
            $data=[
                'judul'=> "Audit Data Unit",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit_unit/v_audit_unit.php',$data);       
            $this->load->view('auditorview/audit_unit/_partial/footer.php');
            
        }

        public function Audit_Part()
        {
            $data=[
                'judul'=> "Audit Data Part",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit_part/v_audit_part.php',$data);       
            $this->load->view('auditorview/audit_part/_partial/footer.php');
            
        }

        //-------------------------GET--------------------------------///
        public function ajax_get_unit()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listUnit =$this->mtransauditor->getUnit();
        foreach ($listUnit as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td><a onclick="edit(id=\''.$list['id_unit'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a></td>
                <td>'.$list['id_unit'].'</td>
                <td>'.$list['no_mesin'].'</td>
                <td>'.$list['no_rangka'].'</td>
                <td>'.$list['nama_cabang'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
                <td>'.$list['umur_unit'].'</td>
                <td>'.$list['status_unit'].'</td>
                <td class="text-center">'.$list['aki'].'</td>
                <td class="text-center">'.$list['spion'].'</td>
                <td class="text-center">'.$list['helm'].'</td>
                <td class="text-center">'.$list['tools'].'</td>
                <td class="text-center">'.$list['buku_service'].'</td>
                <td>'.$list['tahun'].'</td>
                <td>'.$list['type'].'</td>
                <td>'.$list['kode_item'].'</td>
                <td>'.$list['foto'].'</td>
                <td>'.$list['keterangan'].'</td>
                <td>'.$list['is_ready'].'</td>
                <td>'.$list['tanggal_audit'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }


    public function ajax_get_part()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listPart =$this->mtransauditor->getPart();
        foreach ($listPart as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td><a onclick="edit(id=\''.$list['id_part'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a></td>
                <td>'.$list['id_part'].'</td>
                <td>'.$list['nama_cabang'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
                <td>'.$list['part_number'].'</td>
                <td>'.$list['id_rak'].'</td>
                <td>'.$list['id_bin_box'].'</td>
                <td>'.$list['deskripsi'].'</td>
                <td>'.$list['qty'].'</td>
                <td>'.$list['status'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }




}

/* End of file Transaksi_A.php */

?>