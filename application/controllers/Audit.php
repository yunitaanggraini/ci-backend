<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Audit extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('m_audit','maudit');
        }
    
        public function JadwalAudit()
        {
            $data=[
                'judul'=> "Daftar Jadwal Audit",
                'judul1'=>'Audit'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/jadwal_audit/v_jadwal_audit.php',$data);       
            $this->load->view('auditorview/jadwal_audit/_partial/footer.php');    
        }

        public function viewListAudit()
        {
            $data=[
                'judul'=> "List Audit",
                'judul1'=>'Audit'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/jadwal_audit/v_list_audit.php',$data);       
            $this->load->view('auditorview/list_audit/_partial/footer.php');
            
        }


        public function viewTempPart()
        {
            $data=[
                'judul'=> "Teporary Data Part",
                'judul1'=>'Audit'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/temp_part/v_temp_part.php',$data);       
            $this->load->view('auditorview/temp_part/_partial/footer.php');
            
        }

        public function viewTempUnit()
        {
            $data=[
                'judul'=> "Teporary Data Unit",
                'judul1'=>'Audit'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/temp_unit/v_temp_unit.php',$data);       
            $this->load->view('auditorview/temp_unit/_partial/footer.php');
            
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
            $this->load->view('auditorview/audit/_partial/footer.php');
            
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
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function input_jadwal()
    {
         $this->load->view('general_affairview/jenis_inventory/v_jadwal_audit.php');
         $this->load->view('general_affairview/jenis_inventory/_partial/footer2.php');
    }
    //---------------------------------------GET-----------------------------------------------------//
    public function ajax_get_jadwal_audit()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listJadwalAudit =$this->maudit->getJadwalAudit();
        foreach ($listJadwalAudit as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idjadwal_audit'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'audit/deletejadwal_audit/'.$list['idjadwal_audit'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idjadwal_audit'].' - '.$list['user_group'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idjadwal_audit'].'</td>
                <td>'.$list['auditor'].'</td>
                <td>'.$list['tanggal'].'</td>
                <td>'.$list['waktu'].'</td>
                <td>'.$list['nama_cabang'].'</td>
                <td>'.$list['jenis_audit'].'</td>
                <td>'.$list['keterangan'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    //-----------------------------------------VIEW SELECT OPTION----------------------------------------------//
    public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->maudit->getCabang();
		foreach ($listcabang as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['nama_cabang'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;
		
    }

    public function ajax_get_jenis_audit2()
    {
        $output = '';
		$no = 0;
        $listjenisaudit = $this->maudit->getJenisAudit();
		foreach ($listjenisaudit as $list) {
			$no++;
			$output .='
				<option value="'.$list['idjenis_audit'].'">'.$list['idjenis_audit'].' - '.$list['jenis_audit'].'</option>
			';
        }
        echo '<option value="">--- Pilih Jenis Audit ---</option>';
        echo $output;
		
    }

    //--------------------------INPUT-------------//
    public function input_Jadwal_Audit()
    {
            $data=[
                'judul'=> "Daftar Jadwal Audit",
                'judul1'=>'Audit'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/jadwal_audit/v_jadwal_audit.php',$data);       
            $this->load->view('auditorview/jadwal_audit/_partial/footer2.php');    
    }

    //-------EDIT----------//
    public function edit_Jadwal_Audit()
    {
        $data=[
            'judul'=> "Daftar Jadwal Audit",
            'judul1'=>'Audit'
        ];
        $this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');      
        $this->load->view('auditorview/jadwal_audit/v_edit_jadwal_audit.php',$data);       
        $this->load->view('auditorview/jadwal_audit/_partial/footer2.php');    
    }

    // --------POST-----------//
    public function post_Jadwal_Audit()
    {
        $data=[
            'idjadwal_audit' => $this->input->post('idjadwal_audit',true),
            'tanggal'        => $this->input->post('tanggal', true),
            'waktu'          => $this->input->post('waktu', true),
            'idjenis_audit'  => $this->input->post('idjenis_audit', true),
            'id_cabang'      => $this->input->post('id_cabang', true),
            'keterangan'     => $this->input->post('keterangan', true)
             ];
            $id = $data['idjadwal_audit'];

            $cek = $this->maudit->getJadwalAuditById($id);
            if ($cek['status']===true) {

                $this->session->set_flashdata('warning', 'sudah ada');
                
                
                redirect('audit/input_jadwal_audit');
                
                
            }else{
                $exec = $this->maudit->addJadwalAudit($data);
                if ($exec) {

                    $this->session->set_flashdata('berhasil', 'berhasil ditambahkan');
                    redirect('audit/input_jadwal_audit');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal ditambahkan');
                    redirect('audit/input_jadwal_audit');
                }
            }
        
    }
    
    }
    
    /* End of file Audit.php */
    

?>