<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Audit extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('m_audit','maudit');
            
            if (!$this->session->userdata('username')) {
            
                redirect('login/login');
                
            }else{
                if ($this->session->userdata('usergroup') != 'UG002') {
                    redirect('error');  
                }
            }
            
        }
    
        public function JadwalAudit()
        {
            $data=[
                'judul'=> "Daftar Jadwal Audit",
                'judul1'=>'Audit',
                'code'=> $this->maudit->buatkodejadwalaudit()
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
            $tglnow = Date('Y-m-d');
            $wktnow=Date('H:i:s',time()+60*60*7);
            $wktnow = str_replace(':','',$wktnow);
            $waktujadwalaudit = $this->maudit->getAudit();
            foreach ($waktujadwalaudit as $waktuaudit) {
            $tanggal = $waktuaudit['tanggal'];
            $waktu = $waktuaudit['waktu'];
            $waktu = str_replace(':','',$waktu);
            // var_dump($waktu.'+'.$wktnow);
                if ($tanggal == $tglnow && $wktnow >= $waktu && $waktuaudit['keterangan']== 'waiting') {
                    $data =[
                        'idjadwal_audit' => $waktuaudit['idjadwal_audit'],
                        'keterangan' => 'in progress'
                    ];
                    $this->maudit->updatejadwalaudit($data);
                    
                }
            }
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/jadwal_audit/v_list_audit.php',$data);       
            $this->load->view('auditorview/jadwal_audit/_partial/footer.php');
            
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

        public function viewWaktuAudit()
        {
            $data=[
                'judul'=> "Waktu Audit",
                'judul1'=>'Audit'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/jadwal_audit/v_waktu_audit.php',$data);       
            $this->load->view('auditorview/jadwal_audit/_partial/footer.php');    
        }

    //---------------------------------------GET-----------------------------------------------------//
    public function ajax_get_jadwal_audit()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        
        $listJadwalAudit =$this->maudit->getAudit();
        foreach ($listJadwalAudit as $list){

            if ($list['keterangan']=='waiting') {
                
            }else if($list['keterangan']=='in progress'){


            }else if ($list['keterangan']=='done'){

            }

            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td class="text-center">
                <a href="'.$base.'audit/delete_jadwalaudit/'.$list['idjadwal_audit'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idjadwal_audit'].' - '.$list['auditor'].' ? ");\'><i class="fa fa-trash"></i></a>
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

    public function ajax_get_temp_unit()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listTempUnit =$this->maudit->getTempUnit();
        foreach ($listTempUnit as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>'.$list['id_unit'].'</td>
                <td>'.$list['no_mesin'].'</td>
                <td>'.$list['no_rangka'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
                <td>'.$list['keterangan'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_temp_part()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listTempPart =$this->maudit->getTempPart();
        foreach ($listTempPart as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td >'.$list['id_part'].'</td>
                <td>'.$list['nama_cabang'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
                <td>'.$list['part_number'].'</td>
                <td>'.$list['id_rak'].'</td>
                <td>'.$list['id_bin_box'].'</td>
                <td>'.$list['deskripsi'].'</td>
                <td>'.$list['qty'].'</td>
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
            'auditor'        => $this->input->post('auditor',true),
            'idjenis_audit'  => $this->input->post('idjenis_audit', true),
            'id_cabang'      => $this->input->post('id_cabang', true),
            'tanggal'        => $this->input->post('tanggal', true),
            'waktu'          => $this->input->post('waktu', true),
            'keterangan'     => 'waiting',
            'user'  => $this->session->userdata('username')
             ];
            $id = $data['idjadwal_audit'];

            $cek = $this->maudit->getJadwalAuditById($id);
             /*var_dump($cek);die;*/
            if ($cek['status']===true) {

                $this->session->set_flashdata('warning', 'sudah ada');
                
                
                redirect('audit/JadwalAudit');
                
                
            }else{
                $exec = $this->maudit->addAudit($data);
                if ($exec) {

                    $this->session->set_flashdata('berhasil', 'berhasil ditambahkan');
                    redirect('audit/JadwalAudit');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal ditambahkan');
                    redirect('audit/JadwalAudit');
                }
            }
        
    }

    //------SEARCH------//

    public function search_data_jadwal_audit()
    {
        $auditor = $this->input->post('auditor');
        $tanggal_audit = $this->input->post('tanggal_audit');
        $jenis_audit = $this->input->post('jenis_audit');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($auditor!= null && $tanggal_audit!=null && $jenis_audit!=null) {
            $listJdwAudit = $this->maudit->carijadwalaudit($auditor,$tanggal_audit,$jenis_audit);
        }elseif($auditor!=null&& $tanggal_audit==null&& $jenis_audit==null){
            $$listJdwAudit = $this->maudit->cariauditor($auditor);
        }elseif ($auditor==null && $tanggal_audit!=null && $jenis_audit==null) {
            $$listJdwAudit = $this->maudit->caritanggalaudit($tanggal_audit);
        }elseif ($auditor==null && $tanggal_audit==null && $jenis_audit!=null) {
            $$listJdwAudit = $this->maudit->carijenisaudit($jenis_audit);
        }
        
        if ($$listJdwAudit) {
            foreach ($$listJdwAudit as $list) {
                $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a href="'.$base.'audit/deletejadwal_audit/'.$list['idjadwal_audit'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idjadwal_audit'].' - '.$list['auditor'].' ? ");\'><i class="fa fa-trash"></i></a>
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
        }else{
            $output .='
            <tr >
            <td colspan="8" class="text-center">data not found</td>
            </tr>
            ';
        }
        echo $output;
    }

        public function search_data_usergroup()
    {
        $usergroup = $this->input->post('id');
        $output = '';
        $no = 0;
        $base = base_url();
        // var_dump($usergroup);
        if ($usergroup!= null) {
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

    //-----DELETE------//
    public function delete_jadwalaudit($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('audit/viewListAudit');
        }else{
            $result=$this->maudit->delJadwalAudit($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('audit/viewListAudit');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
                
                
                redirect('audit/viewListAudit');
            }
        }
    }

    //---WAKTU AUDIT---//

    public function waktu_audit()
    {
        $tglnow = Date('Y-m-d');
        $wktnow=Date('H:i:s',time()+60*60*8);
        $wktnow = str_replace(':','',$wktnow);
        $waktujadwalaudit = $this->maudit->getAudit();
        foreach ($waktujadwalaudit as $waktuaudit) {
           $tanggal = $waktuaudit['tanggal'];
           $waktu = $waktuaudit['waktu'];
           $waktu = str_replace(':','',$waktu);
            if ($tanggal == $tglnow && $wktnow >= $waktu && $waktuaudit['keterangan']== 'waiting') {
                $data =[
                    'idjadwal_audit' => $waktuaudit['idjadwal_audit'],
                    'keterangan' => 'in progress'
                ];
                $this->maudit->updatejadwalaudit($data);
                
                redirect('audit/list_audit','refresh');
                
            }
        }
        
    }

    
    }
    
    /* End of file Audit.php */
    

?>