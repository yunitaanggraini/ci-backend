<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Auditor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_transaksi_auditor','mtransauditor');
        $this->load->library('pagination');
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
                'judul'=> "Audit",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit/v_audit.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function Audit_Inventory()
        {
            $data=[
                'judul'=> "Audit Inventory",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit_inventory/v_audit_inventory.php',$data);       
            $this->load->view('auditorview/audit_inventory/_partial/footer.php');
            
        }

        public function ListAudit_Inventory()
        {
            $cabang = $this->input->post('id_cabang');
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_awal = strtotime($tgl_awal);
            $tgl_awal= date('Y-m-d',$tgl_awal);
            $tgl_akhir = $this->input->post('tgl_akhir');
            $tgl_akhir = strtotime($tgl_akhir);
            $tgl_akhir= date('Y-m-d',$tgl_akhir);
            $status = $this->input->post('status');
            $data=[
                'judul'=> "List Audit Inventory",
                'judul1'=>'Transaksi Auditor',
                'tgl' => date('m/d/Y')
            ];

            $config['base_url'] = base_url()."transaksi/audit_unit";
            $config['total_rows'] = $this->mtransauditor->countunit($cabang, $tgl_awal,$tgl_akhir,$status);
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
            $this->load->view('auditorview/audit_inventory/v_list_audit_inventory.php',$data);       
            $this->load->view('auditorview/audit_inventory/_partial/footer.php');
            
        }

        public function Manual_Audit()
        {
            $no_mesin =$this->input->get('no_mesin');
            $data=[
                'judul'=> "Manual Audit",
                'judul1'=>'Transaksi Auditor',
                'edit' => $this->mtransauditor->getUnitField($no_mesin)
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit/v_manual.php',$data);       
            $this->load->view('auditorview/audit/_partial/footer.php');
            
        }

        public function ListAudit_Part()
        {
            $cabang = $this->input->post('id_cabang');
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_awal = strtotime($tgl_awal);
            $tgl_awal= date('Y-m-d',$tgl_awal);
            $tgl_akhir = $this->input->post('tgl_akhir');
            $tgl_akhir = strtotime($tgl_akhir);
            $tgl_akhir= date('Y-m-d',$tgl_akhir);
            $status = $this->input->post('status');
            $data=[
                'judul'=> "List Audit Part",
                'judul1'=>'Transaksi Auditor',
                'tgl' => date('m/d/Y')
            ];

            $config['base_url'] = base_url()."transaksi/audit_unit";
            $config['total_rows'] = $this->mtransauditor->countunit($cabang, $tgl_awal,$tgl_akhir,$status);
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
            $this->load->view('auditorview/audit_part/v_list_audit_part.php',$data);       
            $this->load->view('auditorview/audit_part/_partial/footer.php');
            
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


        public function Edit_Audit()
        {
            $id =$this->input->get('id');
            $data=[
                'judul'=> "Audit Unit",
                'judul1'=>'Transaksi Auditor',
                'edit' => $this->mtransauditor->getUnitById($id)
                
            ];
            // var_dump($data['edit']);die;
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit_unit/v_edit_unit.php',$data);       
            $this->load->view('auditorview/audit_unit/_partial/footer.php');
        
        }

        public function Audit_Unit()
        {
            $cabang = $this->input->post('id_cabang');
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_awal = strtotime($tgl_awal);
            $tgl_awal= date('Y-m-d',$tgl_awal);
            $tgl_akhir = $this->input->post('tgl_akhir');
            $tgl_akhir = strtotime($tgl_akhir);
            $tgl_akhir= date('Y-m-d',$tgl_akhir);
            $status = $this->input->post('status');
            $data=[
                'judul'=> "Audit Unit",
                'judul1'=>'Transaksi Auditor',
                'tgl' => date('m/d/Y')
            ];

            $config['base_url'] = base_url()."transaksi/audit_unit";
            $config['total_rows'] = $this->mtransauditor->countunit($cabang, $tgl_awal,$tgl_akhir,$status);
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
            $this->load->view('auditorview/audit_unit/v_audit_unit.php',$data);       
            $this->load->view('auditorview/audit_unit/_partial/footer.php');           
        }

        public function Audit_Part()
        {
            $data=[
                'judul'=> "Audit Part",
                'judul1'=>'Transaksi Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/audit_part/v_audit_part.php',$data);       
            $this->load->view('auditorview/audit_part/_partial/footer.php');
            
        }

        public function preview()
        {
            $cabang = $this->input->post('id_cabang');
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_awal = strtotime($tgl_awal);
            $tgl_awal= date('Y-m-d',$tgl_awal);
            $tgl_akhir = $this->input->post('tgl_akhir');
            $tgl_akhir = strtotime($tgl_akhir);
            $tgl_akhir= date('Y-m-d',$tgl_akhir);
            $status = $this->input->post('status');
            
            $count= $this->mtransauditor->countunit($cabang, $tgl_awal,$tgl_akhir,$status);
            $this->load->library('pagination');
            
            $config['base_url'] = base_url().'transaksi_auditor/preview';
            $config['total_rows'] = $count;
            $config['per_page'] = 15;
            $config['uri_segment']= 3;
            $config['use_page_numbers'] =TRUE;
            $config['num_links'] = 3;

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
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
            
            $page = $this->uri->segment(3);
            if ($page==null) {
                $page=1;
            }
            $start= ($page-1)*$config['per_page'];    
            
            $cetak= $this->mtransauditor->previewUnit($cabang, $tgl_awal,$tgl_akhir,$status,$start);
            $row_entry ='
                <div class=" label label-default">'.$count.'</div>
            ';
            $output = [
                'pagination_link'   => $this->pagination->create_links(),
                'unit_list'         => $cetak,
                'row_entry' => $row_entry,
            ];

            echo json_encode($output);
        }

        //-------------------------GET--------------------------------///
        public function ajax_get_unit()
        {
        $output = '';
        $base = base_url();
        $no=0;
        if ($this->input->post('pages')!='undefined') {
            $offset = $this->input->post('pages');
        }else{
            $offset=0;
        }
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listUnit =$this->mtransauditor->getUnit($offset);
        foreach ($listUnit as $list){
            $offset++;
            $output .='
            <tr> 
                <td>'.$offset.'</td>
                <td></td>
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

    public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->mtransauditor->getCabang();
		foreach ($listcabang as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['nama_cabang'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;	
    }
        public function post_unitmanual()
    {
        $data = [
            'id_unit'     =>$this->input->post('id_unit',true),
            'no_mesin'    =>$this->input->post('no_mesin',true),
            'no_rangka'   =>$this->input->post('no_rangka',true),
            'type_unit'   =>$this->input->post('type_unit',true),
            'usia_unit'   =>$this->input->post('usia_unit',true),
            'user'        =>$this->session->userdata('username')   
        ];

        $id = $data['id_unit'];

            $cek = $this->mtransauditor->getUnitById($id);
            // var_dump($cek);die;
            if ($cek['status']===true) {
                $this->session->set_flashdata('warning', 'Data sudah ada');
                redirect('transaksi_auditor/audit_unit');                                
            }else{
                $exec = $this->mtransauditor->addUnit($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
                    redirect('transaksi_auditor/audit_unit');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal ditambahkan');
                    redirect('transaksi_auditor/audit_unit');
                }
            } 
    }

    public function scan_data_unit()
    {
        $scanunit = $this->input->post('id');
        $cabang = $this->input->post('cabang');
        
        $output = '';
        $base = base_url();
        if ($scanunit!= null) {
            $dataUnit = $this->mtransauditor->cariscanunit($scanunit,$cabang);
        }
        if ($dataUnit) {
            foreach ($dataUnit as $unit) {
                $data=[
                    
                    'id_unit' => $unit['id_unit'],
                    'no_mesin' => $unit['no_mesin'],
                    'no_rangka' => $unit['no_rangka'],
                    'umur_unit' => null,
                    'tahun' => $unit['tahun'],
                    'id_cabang' => $unit['id_cabang'],
                    'id_lokasi' => $unit['id_lokasi'],
                    'buku_service' => null,
                    'helm' =>null,
                    'aki' =>null,
                    'tools' => null,
                    'spion' => null,
                    'status' => 'Sesuai',
                    'is_ready' => 'RFS',
                    'foto' => null,
                    'type' => $unit['type'],
                    'kode_item' => $unit['kode_item']
                ];

                $postscan = $this->mtransauditor->addScanUnit($data);
                var_dump($postscan);die;
                $getunit = $this->mtransauditor->getUnit();
                if ($getunit) {
                    foreach ($getunit as $unit) {
                        $output .='
                                <tr> 
                                    <td>'.$offset.'</td>
                                    <td></td>
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
                }
                
            }
            
        }else{
            echo 'data not found';
            
        }
        echo json_encode($output,true);
    }
   



}

/* End of file Transaksi_A.php */

?>