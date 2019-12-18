<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Audit extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('m_audit','maudit');
            $this->load->library('pagination');
            
            if (!$this->session->userdata('no_mesin')) {
            
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
                'judul'=> "Daftar Jadwal",
                'judul1'=>'Audit',
                'code'=> $this->maudit->buatkodejadwalaudit()
            ];
            
            $this->session->unset_userdata('id_cabang');
            // $this->session->sess_destroy();            
            $sesi = array(
                'id_cabang' => $this->input->post('id_cabang')
            );
            
            $this->session->set_userdata($sesi);
            print_r(
            $this->session->userdata()
            );
                
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

            $config['base_url'] = base_url()."audit/list_audit";
            $config['total_rows'] = $this->maudit->countjadwalaudit();
            $config['per_page'] = 15;
            $config['page_query_string']=TRUE;
            $config['query_string_segment'] = 'pages';
            $config['num_links'] = 2;

            $config['full_tag_open'] = '<div class="pagination"><nav><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&lt;&nbsp;';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
            $data['pagination']= $this->pagination->create_links();
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/jadwal_audit/v_list_audit.php',$data);       
            $this->load->view('auditorview/jadwal_audit/_partial/footer.php');
            
        }


        public function viewTempPart()
        {
            $data=[
                'judul'=> "Temporary Data Part",
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
                'judul'=> "Data Temporary Unit",
                'judul1'=>'Data Temporary'
            ];
            
            $cabang = $this->session->userdata('id_cabang');
            
            $config['base_url'] = base_url()."data_temporary/unit";
            $config['total_rows'] = $this->maudit->counttempunit($cabang);
            $config['per_page'] = 15;
            $config['page_query_string']=TRUE;
            $config['query_string_segment'] = 'pages';
            $config['num_links'] = 2;

            $config['full_tag_open'] = '<div class="pagination"><nav><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&lt;&nbsp;';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['cur_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
            $data['pagination']= $this->pagination->create_links();
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
        
        if ($this->input->post('pages')!='undefined') {
            $offset = $this->input->post('pages');
        }else{
            $offset=0;
        }
        // data['kodeunik'] = $this->musergroup->kode(); 
        
        $listJadwalAudit =$this->maudit->getAudit($offset);
        foreach ($listJadwalAudit as $list){

            if ($list['keterangan']=='waiting') {
                
            }else if($list['keterangan']=='in progress'){

                $list['keterangan']='
                <form action="'.$base.'audit/JadwalAudit" method="POST">
                <input type="hidden" name="id_cabang" value="'.$list['id_cabang'].'"/>
                <button type="submit" name="submit" class="btn btn-success">BUKA</button>
                </form>
                ';
 
            
            }else if ($list['keterangan']=='done'){
                 
            }
            // $this->session->unset_userdata('id_cabang');
            $data = array(
                'id_cabang' => $list['id_cabang']
            );
            $this->session->set_userdata( $data );
            
                
               
            $offset++;
            $output .='
            <tr> 
                <td class="text-center">'.$offset.'</td>
                <td class="text-center">
                <a href="'.$base.'audit/delete_jadwalaudit/'.$list['idjadwal_audit'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idjadwal_audit'].' - '.$list['auditor'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td class="text-center">'.$list['idjadwal_audit'].'</td>
                <td class="text-center">'.$list['auditor'].'</td>
                <td class="text-center">'.$list['tanggal'].'</td>
                <td class="text-center">'.$list['waktu'].'</td>
                <td class="text-center">'.$list['no_rangk$no_rangka_cabang'].'</td>
                <td class="text-center">'.$list['jenis_audit'].'</td>
                <td class="text-center">'.$list['keterangan'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_temp_unit()
    {
              
        $output = '';
        $base = base_url();
        // var_dump( $this->session->userdata('id_cabang'));die;    
        $cabang = $this->session->userdata('id_cabang');
        // print_r($cabang);die;
            if ($this->input->post('pages')!='undefined') {
                $offset = $this->input->post('pages');
            }else{
                $offset=0;
            }
            // data['kodeunik'] = $this->musergroup->kode(); 
            $listTempUnit =$this->maudit->getTempUnit($cabang,$offset);
            if ($listTempUnit!=null) {
            foreach ($listTempUnit as $list){
                $offset++;
                $output .='
                <tr> 
                    <td class="text-center">'.$list['id_unit'].'</td>
                    <td class="text-center">'.$list['no_rangk$no_rangka_cabang'].'</td>
                    <td class="text-center">'.$list['no_rangk$no_rangka_lokasi'].'</td>
                    <td class="text-center">'.$list['no_mesin'].'</td>
                    <td class="text-center">'.$list['no_rangka'].'</td>
                    <td class="text-center">'.$list['tahun'].'</td>
                    <td class="text-center">'.$list['type'].'</td>
                    <td class="text-center">'.$list['kode_item'].'</td>
                  
                </tr>
                
                ';
        }
        echo $output;
        }else {
            echo $output .='
            <tr >
            <td colspan="8" class="text-center">data not found</td>
            </tr>
            ';
        }
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
                <td>'.$list['no_rangk$no_rangka_cabang'].'</td>
                <td>'.$list['no_rangk$no_rangka_lokasi'].'</td>
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
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['no_rangk$no_rangka_cabang'].'</option>
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
            'user'  => $this->session->userdata('no_mesin')
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
                <td>'.$list['no_rangk$no_rangka_cabang'].'</td>
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
            $listUnitGroup = $this->mmasdat->cariunitgroup($usergroup);
        }
        
        if ($listUnitGroup) {
            foreach ($listUnitGroup as $list) {
                
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

    // public function search_data_unit()
    // {
    //     $no_mesin = $this->input->post('no_mesin');
    //     $no_rangka = $this->input->post('no_rangka');
    //     $output = '';
    //     $no = 0;
    //     $base = base_url();
    //     if ($no_mesin!= null && $no_rangka!=null) {
    //         $listUnit = $this->mmasdat->cariunit($no_mesin,$no_rangka);
    //     }elseif($no_mesin!=null&& $no_rangka==null){
    //         $listUnit = $this->mmasdat->carino_mesin($no_mesin);
    //     }elseif ($no_mesin=='' && $no_rangka!='') {
    //         $listUnit = $this->mmasdat->carino_rangka($no_rangka);
    //     }

    
    // }
    
    /* End of file Audit.php */
    
    }
?>