<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master_data','mmasdat');
        $this->load->model('m_transaksi_ga','m_transga');
        // if (!$this->session->userdata('username')) {
            
        //     redirect('login/login');
            
        // }else{
        //     if ($this->session->userdata('usergroup') != 'UG001') {
        //         redirect('error');  
        //     }
        // }
        
    }
    public function viewUser()
    {
        $data=[
            'judul'=> "User",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/user/v_user.php',$data);		
        $this->load->view('general_affairview/user/_partial/footer.php');
    }

    public function viewUserGroup()
    {
        $data=[
            'judul'=> "User Group",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/user_group/v_user_group.php',$data);		
        $this->load->view('general_affairview/user_group/_partial/footer.php');
    }

    public function viewJenisinv()
    {
        $data=[
            'judul'=> "Jenis Inventory",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/jenis_inventory/v_jenis_inventory.php',$data);		
        $this->load->view('general_affairview/jenis_inventory/_partial/footer.php');
    }

    public function viewSubInv()
    {
        $data=[
            'judul'=> "Sub Inventory",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/sub_inventory/v_sub_inventory.php',$data);		
        $this->load->view('general_affairview/sub_inventory/_partial/footer.php');
    }

    public function viewStatusInv()
    {
        $data=[
            'judul'=> "Status Inventory",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/status_inventory/v_status_inventory.php',$data);		
        $this->load->view('general_affairview/status_inventory/_partial/footer.php');
    }

    public function viewPerusahaan()
    {
        $data=[
            'judul'=> "Perusahaan",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/perusahaan/v_perusahaan.php',$data);		
        $this->load->view('general_affairview/perusahaan/_partial/footer.php');
    }

    public function viewCabang()
    {
        $data=[
            'judul'=> "Cabang",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/cabang/v_cabang.php',$data);		
        $this->load->view('general_affairview/cabang/_partial/footer.php');
    }

    public function viewLokasi()
    {
        $data=[
            'judul'=> "Lokasi",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/lokasi/v_lokasi.php',$data);		
        $this->load->view('general_affairview/lokasi/_partial/footer.php');
    }

    public function viewVendor()
    {
        $data=[
            'judul'=> "Vendor",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/vendor/v_vendor.php',$data);		
        $this->load->view('general_affairview/vendor/_partial/footer.php');
    }

    public function viewJenisAudit()
    {
        $data=[
            'judul'=> "Jenis Audit",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/jenis_audit/v_jenis_audit.php',$data);		
        $this->load->view('general_affairview/jenis_audit/_partial/footer.php');
    }

    public function viewBuatBarQRcode()
    {
        $data=[
            'judul'=> "Buat Barcode dan QR",
            'judul1'=>'Master Data',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/barqrcode/v_buat_barqrcode.php',$data);		
        $this->load->view('general_affairview/barqrcode/_partial/footer.php');
    }
    
    //----------------------------------------------------AJAX GET DATA---------------------------------------------//
    public function ajax_get_user()
    {
        $output = '';
		$no = 0;
        $base = base_url();
        $listUser = $this->mmasdat->getUser();
		foreach ($listUser as $list) {
            $no++;
			$output .="
				<tr>
					<td>".$no."</td>
                    <td>
                    <a href='".$base."master_data/edit_user/".$list['nik']."' class='text-warning'><i class='fa fa-pencil'></i></a>
                    <a href='".$base."master_data/delete_user/".$list['nik']."' class='text-danger' onclick=\"return confirm('Konfirmasi menghapus data ".$list['nik']."');\"><i class='fa fa-trash'></i></a>
                    </td>
					<td>".$list['nik']."</td>
					<td>".$list['username']."</td>
                    <td>".$list['nama']."</td>
                    <td>".$list['nama_perusahaan']."</td>
                    <td>".$list['nama_cabang']."</td>
                    <td>".$list['nama_lokasi']."</td>
					<td>".$list['user_group']."</td>
					<td>".$list['status']."</td>
				</tr>
			";
		}
		
		echo $output;
    }

    public function ajax_get_usergroup()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listUserGroup =$this->mmasdat->getUserGroup();
        foreach ($listUserGroup as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_usergroup'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_usergroup/'.$list['id_usergroup'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['id_usergroup'].' - '.$list['user_group'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['id_usergroup'].'</td>
                <td>'.$list['user_group'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_jenis_inv()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listJenisInv =$this->mmasdat->getJenisInv();
        foreach ($listJenisInv as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idjenis_inventory'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_jenisinv/'.$list['idjenis_inventory'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idjenis_inventory'].'</td>
                <td>'.$list['jenis_inventory'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }
    public function ajax_get_jenis_inv2($id =null)
    {
        $output = '';
		$no = 0;
        $listtypeinv = $this->mmasdat->getJenisInv();
		foreach ($listtypeinv as $list) {
            $no++;
            if ($list['idjenis_inventory']==$id) {
                $output .='
                    <option value="'.$list['idjenis_inventory'].'" selected>'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</option>
                ';  
            }else {
                $output .='
                    <option value="'.$list['idjenis_inventory'].'">'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</option>
                ';
            }
        }
        echo '<option value="">--- Pilih jenis Inventory ---</option>';
        echo $output;
		
    }
    public function ajax_get_jenis_inv3()
    {
        $output = '';
		$no = 0;
        $listtypeinv = $this->mmasdat->getJenisInv();
		foreach ($listtypeinv as $list) {
            $no++;
                $output .='
                    <option value="'.$list['idjenis_inventory'].'">'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</option>
                ';
        }
        echo '<option value="">--- Pilih jenis Inventory ---</option>';
        echo $output;
		
    }

    public function ajax_get_sub_inv()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listSubInventory =$this->mmasdat->getSubInv();
        foreach ($listSubInventory as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idsub_inventory'].'\',jenis=\''.$list['idjenis_inventory'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_subinv/'.$list['idsub_inventory'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idsub_inventory'].' - '.$list['sub_inventory'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idsub_inventory'].'</td>
                <td>'.$list['sub_inventory'].'</td>
                <td>'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }


    public function ajax_get_status_inv()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listStatusInventory =$this->mmasdat->getStatusInv();
        foreach ($listStatusInventory as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idstatus_inventory'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_statusinv/'.$list['idstatus_inventory'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idstatus_inventory'].' - '.$list['status_inventory'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idstatus_inventory'].'</td>
                <td>'.$list['status_inventory'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_perusahaan()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listPerusahaan =$this->mmasdat->getPerusahaan();
        foreach ($listPerusahaan as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_perusahaan'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_perusahaan/'.$list['id_perusahaan'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['id_perusahaan'].' - '.$list['nama_perusahaan'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['id_perusahaan'].'</td>
                <td>'.$list['nama_perusahaan'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_cabang()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listCabang =$this->mmasdat->getCabang();
        foreach ($listCabang as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_cabang'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_cabang/'.$list['id_cabang'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['id_cabang'].' - '.$list['nama_cabang'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['id_cabang'].'</td>
                <td>'.$list['nama_cabang'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_lokasi()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listLokasi =$this->mmasdat->getLokasi();
        foreach ($listLokasi as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_lokasi'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_lokasi/'.$list['id_lokasi'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['id_lokasi'].' - '.$list['nama_lokasi'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['id_lokasi'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_vendor()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listVendor =$this->mmasdat->getVendor();
        foreach ($listVendor as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_vendor'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_vendor/'.$list['id_vendor'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['id_vendor'].' - '.$list['nama_vendor'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['id_vendor'].'</td>
                <td>'.$list['nama_vendor'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    public function ajax_get_jenis_audit()
    {
        $output = '';
        $base = base_url();
        $no = 0;
        // data['kodeunik'] = $this->musergroup->kode(); 
        $listJenisAudit =$this->mmasdat->getJenisAudit();
        foreach ($listJenisAudit as $list){
            $no++;
            $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idjenis_audit'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_jenisaudit/'.$list['idjenis_audit'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idjenis_audit'].' - '.$list['jenis_audit'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idjenis_audit'].'</td>
                <td>'.$list['jenis_audit'].'</td>
            </tr>
            
            ';
        }
        echo $output;
    }

    
    //-------------------------------------------------------INPUT---------------------------------------------------//
    public function input_user()
    {
         $data = array('judul' => 'User','judul1'=>'Master Data');
         $this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php',$data);
         $this->load->view('general_affairview/user/v_input_user.php', $data);
         $this->load->view('general_affairview/user/_partial/footer.php');
    }

    public function input_usergroup()
    {
        $data=[
            'code'=> $this->mmasdat->buatkodeusergroup()
        ];
         $this->load->view('general_affairview/user_group/v_inputUG.php', $data);
         $this->load->view('general_affairview/user_group/_partial/footer2.php');
    }
    
    public function input_jenisinv()
    {
         $this->load->view('general_affairview/jenis_inventory/v_input_jenisinv.php');
         $this->load->view('general_affairview/jenis_inventory/_partial/footer2.php');
    }

    public function input_subinv()
    {
        $data=[
            'code'=> $this->mmasdat->buatkodesubinventory()
        ];
         $this->load->view('general_affairview/sub_inventory/v_input_subinv.php',$data);
         $this->load->view('general_affairview/sub_inventory/_partial/footer2.php');
    }

    public function input_statusinv()
    {
        $data=[
            'code'=> $this->mmasdat->buatkodestatusinventory()
        ];
         $this->load->view('general_affairview/status_inventory/v_input_statusinv.php',$data);
         $this->load->view('general_affairview/status_inventory/_partial/footer2.php');
    }

    public function input_perusahaan()
    {
         $this->load->view('general_affairview/perusahaan/v_input_perusahaan.php');
         $this->load->view('general_affairview/perusahaan/_partial/footer2.php');
    }

    public function input_cabang()
    {
         $this->load->view('general_affairview/cabang/v_input_cabang.php');
         $this->load->view('general_affairview/cabang/_partial/footer2.php');
    }

    public function input_lokasi()
    {
         $this->load->view('general_affairview/lokasi/v_input_lokasi.php');
         $this->load->view('general_affairview/lokasi/_partial/footer2.php');
    }

    public function input_vendor()
    {
        $data=[
            'code'=> $this->mmasdat->buatkodevendor()
        ];
         $this->load->view('general_affairview/vendor/v_input_vendor.php',$data);
         $this->load->view('general_affairview/vendor/_partial/footer2.php');
    }

    public function input_jenisaudit()
    {
        $data=[
            'code'=> $this->mmasdat->buatkodejenisaudit()
        ];
         $this->load->view('general_affairview/jenis_audit/v_input_jenisaudit.php',$data);
         $this->load->view('general_affairview/jenis_audit/_partial/footer2.php');
    }

    //------------------------------------------------EDIT--------------------------------------------------------//
    public function edit_user()
    {
         $data = [
            'judul' => 'User',
             'judul1'=>'Master Data',
            //  'user' => $this->muser->getUserById($id)
         ];
             
         $this->load->view('_partial/header.php',$data);
         $this->load->view('_partial/sidebar.php',$data);
         $this->load->view('general_affairview/user/v_edit_user.php', $data);
         $this->load->view('general_affairview/user/_partial/footer.php');
    }

    public function edit_usergroup()
    {
        $id =$this->input->get('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getUsergroupById($id)
        ];
        // var_dump($data);die;
            $this->load->view('general_affairview/user_group/v_editUG.php',$data);
            $this->load->view('general_affairview/user_group/_partial/footer2.php');
    }

    public function edit_jenisinv()
    {
        $id =$this->input->post('id');
        // var_dump($this->input->post());die;
        $data=[
            'edit' => $this->mmasdat->getJenisInvById($id)
        ];


            $this->load->view('general_affairview/jenis_inventory/v_edit_jenisinv.php',$data);
            $this->load->view('general_affairview/jenis_inventory/_partial/footer2.php');
    }

    public function edit_subinv()
    {
        $id =$this->input->post('id');
        $jenis = $this->input->post('jenis');
        $data=[
            'edit' => $this->mmasdat->getSubInvById($id),
            'id' => $jenis
        ];


            $this->load->view('general_affairview/sub_inventory/v_edit_subinv.php',$data);
            $this->load->view('general_affairview/sub_inventory/_partial/footer3.php');
    }

    public function edit_statusinv()
    {
        $id =$this->input->post('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getStatusInvById($id)
        ];


            $this->load->view('general_affairview/status_inventory/v_edit_statusinv.php',$data);
            $this->load->view('general_affairview/status_inventory/_partial/footer2.php');
    }

    public function edit_perusahaan()
    {
        $id =$this->input->post('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getPerusahaanById($id)
        ];


            $this->load->view('general_affairview/perusahaan/v_edit_perusahaan.php',$data);
            $this->load->view('general_affairview/perusahaan/_partial/footer2.php');
    }

    public function edit_cabang()
    {
        $id =$this->input->post('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getCabangById($id)
        ];


            $this->load->view('general_affairview/cabang/v_edit_cabang.php',$data);
            $this->load->view('general_affairview/cabang/_partial/footer2.php');
    }

    public function edit_lokasi()
    {
        $id =$this->input->post('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getLokasiById($id)
        ];


            $this->load->view('general_affairview/lokasi/v_edit_lokasi.php',$data);
            $this->load->view('general_affairview/lokasi/_partial/footer2.php');
    }

    public function edit_vendor()
    {
        $id =$this->input->get('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getVendorById($id)
        ];


            $this->load->view('general_affairview/vendor/v_edit_vendor.php',$data);
            $this->load->view('general_affairview/user_group/_partial/footer2.php');
    }

    public function edit_jenisaudit()
    {
        $id =$this->input->post('id');
        // var_dump($id);die;
        $data=[
            'edit' => $this->mmasdat->getJenisAuditById($id)
        ];
        // var_dump($data);die;


            $this->load->view('general_affairview/jenis_audit/v_edit_jenis_audit.php',$data);
            $this->load->view('general_affairview/jenis_audit/_partial/footer2.php');
    }
    //---------------------------------------------------POST------------------------------------------------------//
    public function post_user()
    {
            $data=[
                'nik' => $this->input->post('nik',true),
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'id_cabang' => $this->input->post('id_cabang'),
                'id_lokasi' => $this->input->post('id_lokasi'),
                'id_usergroup' => $this->input->post('id_usergroup'),
                
            ];
            $id = $data['nik'];

            $cek = $this->mmasdat->getUserById($id);
            if ($cek['status']===true) {

                $this->session->set_flashdata('warning', 'sudah ada');
                
                
                redirect('master_data/input_user');
                
                
            }else{
                $exec = $this->mmasdat->addUser($data);
                if ($exec) {

                    $this->session->set_flashdata('berhasil', 'berhasil ditambahkan');
                    redirect('master_data/input_user');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal ditambahkan');
                    redirect('master_data/input_user');
                }
            }
        
    }

    public function post_usergroup()
    {
        $data = [
            'id_usergroup' =>$this->input->post('id_usergroup',true),
            'user_group'   =>$this->input->post('user_group',true)   
        ];

        $id = $data['id_usergroup'];

            $cek = $this->mmasdat->getUserGroupById($id);
            // var_dump($cek);die;
            if ($cek['status']===true) {

                $this->session->set_flashdata('warning', 'Data sudah ada');
                
                
                redirect('master_data/user_group');
                
                
            }else{
                $exec = $this->mmasdat->addUserGroup($data);
                if ($exec) {

                    $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
                    redirect('master_data/user_group');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal ditambahkan');
                    redirect('user_group/user_group');
                }
            }
        
    }

    public function post_jenis_inv()
    {
        $data =[
            'idjenis_inventory' => $this->input->post('idjenis_inventory',true),
            'jenis_inventory' => $this->input->post('jenis_inventory',true)           
        ];

        $id = $this->input->post('idjenis_inventory',true);

        $jenisinv = $this->mmasdat->getJenisInvById($id);
        if ($jenisinv) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('master_data/jenis_inventory','refresh');
            
        } else {
            if ($result = $this->mmasdat->addJenisInv($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/jenis_inventory','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/jenis_inventory','refresh'); 
            }
            
        }
        
    }

    public function post_sub_inv()
    {
        $data =[
            'idjenis_inventory' => $this->input->post('jenis_inv',true),
            'idsub_inventory' => $this->input->post('idsub_inventory',true),
            'sub_inventory' => $this->input->post('sub_inventory',true)           
        ];

        $id = $this->input->post('idsub_inventory',true);

        $subinv = $this->mmasdat->getSubInvById($id);
        if ($subinv) {
            $this->session->set_flashdata('warning', 'sudah ada');
            redirect('master_data/sub_inventory','refresh');
            
        } else {
            if ($result = $this->mmasdat->addSubInv($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/sub_inventory','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/sub_inventory','refresh'); 
            }
            
        }
        
    }

    public function post_status_inv()
    {
        $data =[
            'idstatus_inventory' => $this->input->post('idstatus_inventory',true),
            'status_inventory' => $this->input->post('status_inventory',true)           
        ];

        $id = $this->input->post('idstatus_inventory',true);

        $statusinv = $this->mmasdat->getStatusInvById($id);
        // var_dump($id);die;
        if ($statusinv) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('master_data/status_inventory','refresh');
            
        } else {
            if ($result = $this->mmasdat->addStatusInv($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/status_inventory','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/status_inventory','refresh'); 
            }
            
        }
        
    }

    public function post_perusahaan()
    {
        $data =[
            'id_perusahaan' => $this->input->post('id_perusahaan',true),
        'nama_perusahaan' => $this->input->post('nama_perusahaan',true)           
        ];

        $id = $this->input->post('id_perusahaan',true);

        $perusahaan = $this->mmasdat->getPerusahaanById($id);
        if ($perusahaan) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('master_data/perusahaan','refresh');
            
        } else {
            if ($result = $this->mmasdat->addPerusahaan($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/perusahaan','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/perusahaan','refresh'); 
            }
            
        }
        
    }

    public function post_cabang()
    {
        $data =[
            'id_cabang' => $this->input->post('id_cabang',true),
        'nama_cabang' => $this->input->post('nama_cabang',true)           
        ];

        $id = $this->input->post('id_cabang',true);

        $cabang = $this->mmasdat->getCabangById($id);
        if ($cabang) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('master_data/cabang','refresh');
            
        } else {
            if ($result = $this->mmasdat->addCabang($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/cabang','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/cabang','refresh'); 
            }
            
        }
        
    }

    public function post_lokasi()
    {
        $data =[
            'id_lokasi' => $this->input->post('id_lokasi',true),
        'nama_lokasi' => $this->input->post('nama_lokasi',true)           
        ];

        $id = $this->input->post('id_lokasi',true);

        $lokasi = $this->mmasdat->getLokasiById($id);
        if ($lokasi) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('master_data/lokasi','refresh');
            
        } else {
            if ($result = $this->mmasdat->addLokasi($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/lokasi','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/lokasi','refresh'); 
            }
            
        }
        
    }

    public function post_vendor()
    {
        $data =[
            'id_vendor' => $this->input->post('id_vendor',true),
        'nama_vendor' => $this->input->post('nama_vendor',true)           
        ];

        $id = $this->input->post('id_vendor',true);

        $vendor = $this->mmasdat->getVendorById($id);
        if ($vendor) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('master_data/vendor','refresh');
            
        } else {
            if ($result = $this->mmasdat->addVendor($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/vendor','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/vendor','refresh'); 
            }
            
        }
        
    }

    public function post_jenis_audit()
    {
        $data =[
            'idjenis_audit' => $this->input->post('idjenis_audit',true),
            'jenis_audit' => $this->input->post('jenis_audit',true)           
        ];

        $id = $this->input->post('idjenis_audit',true);

        $jenisaudit = $this->mmasdat->getJenisAuditById($id);
        if ($jenisaudit['status']===true) {
            $this->session->set_flashdata('warning', 'sudah ada');
            
            
            redirect('jenis_audit/list','refresh');
            
        } else {
            if ($result = $this->mmasdat->addJenisAudit($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('master_data/jenis_audit','refresh');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('master_data/jenis_audit','refresh'); 
            }
            
        }
    }
    //----------------------------------------------------PUT------------------------------------------------------//
    public function put_usergroup()
    {
        $data = [
            'user_group'   =>$this->input->post('user_group',true),   
            'id'           => $this->input->post('id_usergroup',true)
        ];

                $exec = $this->mmasdat->UpdateUserGroup($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/user_group');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/user_group');
                }
        
    }

    public function put_jenisinv()
    {
        $data = [
            'jenis_inventory'   =>$this->input->post('jenis_inventory',true),   
            'id'          => $this->input->post('idjenis_inventory',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdateJenisInv($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'Data Berhasil Diupdate');
                    redirect('master_data/jenis_inventory');
                }else{
                    $this->session->set_flashdata('gagal', 'Data Gagal Diupdate');
                    redirect('master_data/jenis_inventory');
                }
        
    }

    public function put_subinv()
    {
        $data = [
            'idjenis_inventory' => $this->input->post('jenis_inv',true),            
            'sub_inventory'   =>$this->input->post('sub_inventory',true),   
            'id' => $this->input->post('idsub_inventory',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdateSubInv($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/sub_inventory');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/sub_inventory');
                }
        
    }

    public function put_statusinv()
    {
        $data = [        
            'status_inventory'   =>$this->input->post('status_inventory',true),   
            'id' => $this->input->post('idstatus_inventory',true)
        ];
        //  var_dump($data);die;

                $exec = $this->mmasdat->UpdateStatusInv($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/status_inventory');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/status_inventory');
                }
        
    }

    public function put_perusahaan()
    {
        $data = [           
            'nama_perusahaan'   =>$this->input->post('nama_perusahaan',true),   
            'id' => $this->input->post('id_perusahaan',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdatePerusahaan($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/perusahaan');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/perusahaan');
                }
        
    }

    public function put_cabang()
    {
        $data = [           
            'nama_cabang'   =>$this->input->post('nama_cabang',true),   
            'id' => $this->input->post('id_cabang',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdateCabang($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/cabang');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/cabang');
                }
        
    }

    public function put_lokasi()
    {
        $data = [           
            'nama_lokasi'   =>$this->input->post('nama_lokasi',true),   
            'id' => $this->input->post('id_lokasi',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdateLokasi($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/lokasi');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/lokasi');
                }
        
    }

    public function put_vendor()
    {
        $data = [           
            'nama_vendor'   =>$this->input->post('nama_vendor',true),   
            'id' => $this->input->post('id_vendor',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdateVendor($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/vendor');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/vendor');
                }
    }

    public function put_jenisaudit()
    {
        $data = [           
            'jenis_audit'   =>$this->input->post('jenis_audit',true),   
            'id' => $this->input->post('idjenis_audit',true)
        ];
        // var_dump($data);die;

                $exec = $this->mmasdat->UpdateJenisAudit($data);
                if ($exec) {
                    $this->session->set_flashdata('berhasil', 'berhasil diupdate');
                    redirect('master_data/jenis_audit');
                }else{
                    $this->session->set_flashdata('gagal', 'gagal diupdate');
                    redirect('master_data/jenis_audit');
                }
    }

    //-----------------------------------------------DELETE-------------------------------------------------------//
    public function delete_user($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/user');
        }else{
            $result=$this->mmasdat->delUser($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Dihapus');
                
                
                redirect('master_data/user');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
                
                
                redirect('master_data/user');
            }
        }
    }

    public function delete_usergroup($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/user_group');
        }else{
            $result=$this->mmasdat->delUsergroup($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/user_group');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
                
                
                redirect('master_data/user_group');
            }
        }
    }

    public function delete_jenisinv($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/jenis_inventory');
        }else{
            $result=$this->mmasdat->delJenisInv($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/jenis_inventory');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/jenis_inventory');
            }
        }
    }

    public function delete_subinv($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/sub_inventory');
        }else{
            $result=$this->mmasdat->delSubInv($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/sub_inventory');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/sub_inventory');
            }
        }
    }

    public function delete_statusinv($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/status_inventory');
        }else{
            $result=$this->mmasdat->delStatusInv($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/status_inventory');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/status_inventory');
            }
        }
    }

    public function delete_perusahaan($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/perusahaan');
        }else{
            $result=$this->mmasdat->delPerusahaan($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/perusahaan');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/perusahaan');
            }
        }
    }

    public function delete_cabang($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/cabang');
        }else{
            $result=$this->mmasdat->delCabang($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/cabang');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/cabang');
            }
        }
    }

    public function delete_lokasi($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/lokasi');
        }else{
            $result=$this->mmasdat->delLokasi($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/lokasi');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/lokasi');
            }
        }
    }

    public function delete_vendor($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/vendor');
        }else{
            $result=$this->mmasdat->delVendor($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/vendor');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/vendor');
            }
        }
    }

    public function delete_jenisaudit($id=null)
    {
        if ($id===null) {
            $this->session->set_flashdata('warning', 'tidak ada');
                
                
                redirect('master_data/jenis_audit');
        }else{
            $result=$this->mmasdat->delJenisAudit($id);
            if ($result) {
                $this->session->set_flashdata('berhasil', 'Berhasil Dihapus');
                
                
                redirect('master_data/jenis_audit');
            }else{
                $this->session->set_flashdata('gagal', 'Gagal dihapus');
  
                redirect('master_data/jenis_audit');
            }
        }
    }

    //----------------------------SEARCH DATA--------------------------------//
    public function search_data_user()
    {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($username!= null && $nama!=null) {
            $listUser = $this->mmasdat->cariuser($username,$nama);
        }elseif($username!=null&& $nama==null){
            $listUser = $this->mmasdat->cariusername($username);
        }elseif ($username=='' && $nama!='') {
            $listUser = $this->mmasdat->carinama($nama);
        }
        
        if ($listUser) {
            foreach ($listUser as $list) {
                $no++;
                $output .="
                    <tr>
                        <td>".$no."</td>
                        <td>
                        <a href='".$base."user/edit/".$list['nik']."' class='text-warning'><i class='fa fa-pencil'></i></a>
                        <a href='".$base."master_data/delete_user/".$list['nik']."' class='text-danger' onclick=\"return confirm('Konfirmasi menghapus data ".$list['nik']."');\"><i class='fa fa-trash'></i></a>
                        </td>
                        <td>".$list['nik']."</td>
                        <td>".$list['username']."</td>
                        <td>".$list['nama']."</td>
                        <td>".$list['id_perusahaan']."</td>
                        <td>".$list['id_cabang']."</td>
                        <td>".$list['id_lokasi']."</td>
                        <td>".$list['id_usergroup']."</td>
                        <td>".$list['status']."</td>
                    </tr>
                ";
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

    public function search_data_jenisinv()
    {
        $jenisinv = $this->input->post('id');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($jenisinv!= null) {
            $listjenisinv = $this->mmasdat->carijenisinv($jenisinv);
        }
        
        if ($listjenisinv) {
            foreach ($listjenisinv as $list) {
                
                $no++;
                $output .='
                <tr>
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idjenis_inventory'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_jenisinv/'.$list['idjenis_inventory'].'" class="text-danger" onclick=\'return confirm("Konfirmasi Menghapus Data '.$list['idjenis_inventory'].'?");\'><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['idjenis_inventory'].'</td>
                <td>'.$list['jenis_inventory'].'</td>
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

    public function search_data_subinventory()
    {
        $subinv = $this->input->post('subinv');
        $jenisinv = $this->input->post('jenisinv');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($subinv!= null && $jenisinv!=null) {
            $listsubinv = $this->mmasdat->carisubinv($subinv,$jenisinv);
        }elseif($subinv!=null&& $jenisinv==null){
            $listsubinv = $this->mmasdat->carisub($subinv);
        }elseif ($subinv=='' && $jenisinv!='') {
            $listsubinv = $this->mmasdat->carisubjenis($jenisinv);
        }
        
        if ($listsubinv) {
            foreach ($listsubinv as $list) {
                
                $no++;
                $output .='
            <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idsub_inventory'].'\',jenis=\''.$list['idjenis_inventory'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_subinv/'.$list['idsub_inventory'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idsub_inventory'].' - '.$list['sub_inventory'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idsub_inventory'].'</td>
                <td>'.$list['sub_inventory'].'</td>
                <td>'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</td>
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

    public function search_data_statusinv()
    {
        $statusinv = $this->input->post('status_inv');
        // var_dump($statusinv);die;
        $output = '';
        $no = 0;
        $base = base_url();
        if ($statusinv!= null) {
            $liststatusinv = $this->mmasdat->caristatusinv($statusinv);
        }
        // var_dump($liststatusinv);die;
        
        if ($liststatusinv) {
            foreach ($liststatusinv as $list) {
                
                $no++;
                $output .='
                <tr> 
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idstatus_inventory'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_statusinv/'.$list['idstatus_inventory'].'" class="text-danger" onclick=\'return confirm("Konfirmasi menghapus data '.$list['idstatus_inventory'].' - '.$list['status_inventory'].' ? ");\'><i class="fa fa-trash"></i></a>
                </td>
                <td >'.$list['idstatus_inventory'].'</td>
                <td>'.$list['status_inventory'].'</td>
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

    public function search_data_perusahaan()
    {
        $perusahaan = $this->input->post('perusahaan');
        $output = '';
        $no = 0;
        $base = base_url();
        // var_dump($perusahaan);die;
        if ($perusahaan!= null) {
            $listperusahaan = $this->mmasdat->cariperusahaan($perusahaan);
        }
        // var_dump($listjenisinv[0]);die;
        if ($listperusahaan) {
            foreach ($listperusahaan as $list) {
                
                $no++;
                $output .='
                <tr>
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_perusahaan'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_perusahaan/'.$list['id_perusahaan'].'" class="text-danger" onclick=\'return confirm("Konfirmasi Menghapus Data '.$list['id_perusahaan'].'?");\'><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['id_perusahaan'].'</td>
                <td>'.$list['nama_perusahaan'].'</td>
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

    public function search_data_cabang()
    {
        $cabang = $this->input->post('cabang');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($cabang!= null) {
            $listcabang = $this->mmasdat->caricabang($cabang);
        }
        // var_dump($listjenisinv[0]);die;
        
        if ($listcabang) {
            foreach ($listcabang as $list) {
                
                $no++;
                $output .='
                <tr>
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_cabang'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_cabang/'.$list['id_cabang'].'" class="text-danger" onclick=\'return confirm("Konfirmasi Menghapus Data '.$list['id_cabang'].'?");\'><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['id_cabang'].'</td>
                <td>'.$list['nama_cabang'].'</td>
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

    public function search_data_lokasi()
    {
        $lokasi = $this->input->post('lokasi');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($lokasi!= null) {
            $listlokasi = $this->mmasdat->carilokasi($lokasi);
        }
        // var_dump($listjenisinv[0]);die;
        
        if ($listlokasi) {
            foreach ($listlokasi as $list) {
                
                $no++;
                $output .='
                <tr>
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_lokasi'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_lokasi/'.$list['id_lokasi'].'" class="text-danger" onclick=\'return confirm("Konfirmasi Menghapus Data '.$list['id_lokasi'].'?");\'><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['id_lokasi'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
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

    public function search_data_vendor()
    {
        $vendor = $this->input->post('vendor');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($vendor!= null) {
            $listvendor = $this->mmasdat->carivendor($vendor);
        }
        // var_dump($listjenisinv[0]);die;
        
        if ($listvendor) {
            foreach ($listvendor as $list) {
                
                $no++;
                $output .='
                <tr>
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['id_vendor'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_vendor/'.$list['id_vendor'].'" class="text-danger" onclick=\'return confirm("Konfirmasi Menghapus Data '.$list['id_vendor'].'?");\'><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['id_vendor'].'</td>
                <td>'.$list['nama_vendor'].'</td>
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

    public function search_data_jenisaudit()
    {
        $jenisaudit = $this->input->post('jenisaudit');
        $output = '';
        $no = 0;
        $base = base_url();
        if ($jenisaudit!= null) {
            $listjenisaudit = $this->mmasdat->carijenisaudit($jenisaudit);
        }
        // var_dump($listjenisinv[0]);die;
        
        if ($listjenisaudit) {
            foreach ($listjenisaudit as $list) {
                
                $no++;
                $output .='
                <tr>
                <td>'.$no.'</td>
                <td>
                <a onclick="edit(id=\''.$list['idjenis_audit'].'\')" class="text-warning" ><i class="fa fa-pencil"></i></a>
                <a href="'.$base.'master_data/delete_jenisaudit/'.$list['idjenis_audit'].'" class="text-danger" onclick=\'return confirm("Konfirmasi Menghapus Data '.$list['idjenis_audit'].'?");\'><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['idjenis_audit'].'</td>
                <td>'.$list['jenis_audit'].'</td>
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
    //----------------------------------GET 2------------------------------//
    public function ajax_get_usergroup2()
    {
        $output = '';
		$no = 0;
        $listgroup = $this->mmasdat->getUserGroup();
		foreach ($listgroup as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_usergroup'].'">'.$list['id_usergroup'].' - '.$list['user_group'].'</option>
			';
        }
        echo '<option value="">--- Pilih User Group ---</option>';
        echo $output;
		
    }

    public function ajax_get_perusahaan2()
    {
        $output = '';
		$no = 0;
        $listperusahaan = $this->mmasdat->getPerusahaan();
		foreach ($listperusahaan as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_perusahaan'].'">'.$list['id_perusahaan'].' - '.$list['nama_perusahaan'].'</option>
			';
        }
        echo '<option value="">--- Pilih Perusahaan ---</option>';
        echo $output;
		
    }

    public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->mmasdat->getCabang();
		foreach ($listcabang as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['nama_cabang'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;
		
    }

    public function ajax_get_lokasi2()
    {
        $output = '';
		$no = 0;
        $id=$this->input->post('id_cabang');
        $lokasicabang = $this->mmasdat->getLokasiCabang($id);
        foreach ($lokasicabang as $lokcab) {
            $idlokasi = $lokcab['id_lokasi'];
            $listlokasi = $this->mmasdat->getLokasiByid($idlokasi);
            foreach ($listlokasi as $list) {
                $no++;
                $output .='
                    <option value="'.$list['id_lokasi'].'">'.$list['id_lokasi'].' - '.$list['nama_lokasi'].'</option>
                ';
            }

        }
        echo '<option value="">--- Pilih Lokasi ---</option>';
        echo $output;
		
    }

    public function ajax_get_jenisinv2()
    {
        $output = '';
		$no = 0;
        $listjenisinv = $this->mmasdat->getJenisInv();
		foreach ($listjenisinv as $list) {
			$no++;
			$output .='
				<option value="'.$list['idjenis_inventory'].'">'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;
		
    }


    

    //-------------------------------------BARCODE----------------------------------------//
    public function generate_barcode_qrcode()
    {
        $data=[
            'judul'=> "Buat Barcode dan QR Code",
            'judul1'=>'Master ',
		];
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php',$data);		
        $this->load->view('general_affairview/barqrcode/v_buat_barqrcode.php',$data);		
        $this->load->view('general_affairview/barqrcode/_partial/footer.php');
    }
}

/* End of file Controllername.php */
?>