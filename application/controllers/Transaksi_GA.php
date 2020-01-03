<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_GA extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_transaksi_GA','mtransga');
        $_tgl = date('Y-m-d');

        if (!$this->session->userdata('username')) {
            
            redirect('login/login');
            
        }else{
            if ($this->session->userdata('usergroup') != 'UG001') {
                redirect('error');  
            }
        }
    }
    

    public function viewOffice()
    {
            $data=[
                'judul'=> "Monitoring Inventory",
                'judul1'=>'Transaksi GA'
            ];
            // var_dump($data);die;
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('general_affairview/monitoring_office/v_monitoring_inv.php',$data);       
            $this->load->view('general_affairview/monitoring_office/_partial/footer.php');
    }

    public function inputOffice()
    {
        $data=[
            'judul'=> "Management Inventory",
            'judul1'=>'Transaksi GA',
            'max' => $this->mtransga->getcountInv()
        ];
        // var_dump($data);die;
        $this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');   
         $this->load->view('general_affairview/management_office/v_management_inv.php',$data);
         $this->load->view('general_affairview/management_office/_partial/footer.php',$data);
    }

    public function ajax_get_Inventory()
    {
        $output='';
       $no = 0;
       $listinv = $this->mtransga->getInv();
       foreach ($listinv as $list) {
          $no++;
          $output.='
            <tr>
                <td>'.$no.'</td>
                <td>
                <a id="'.$list['idtransaksi_inv'].'" class="text-warning"><i class="fa fa-pencil"></i></a>
                <a id="'.$list['idtransaksi_inv'].'" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list['idtransaksi_inv'].'</td>
                <td>'.$list['jenis_inventory'].'</td>
                <td>'.$list['sub_inventory'].'</td>
                <td>'.$list['nilai_awal'].'</td>
                <td>'.$list['tanggal_barang_diterima'].'</td>
                <td>'.$list['nama_vendor'].'</td>
                <td>'.$list['jenis_pembayaran'].'</td>
                <td>'.$list['nama_lokasi'].'</td>
                <td>'.$list['nama_pengguna'].'</td>               
                <td>'.$list['keterangan'].'</td>
                
            </tr>
          ';
       }
       echo json_encode($output,true);
    }




    public function post_inventory()
    {
        $data =[
                'idtransaksi_inv' => $this->input->post('id_inventory',true),
                'idstatus_inventory' => $this->input->post('idstatus_inventory',true),
                'idjenis_inventory' =>$this->input->post('idjenis_inventory',true),
                'idsub_inventory' => $this->input->post('idsub_inventory',true),
                'nilai_awal' => $this->input->post('nilai_awal',true),
                'ddp' => $this->input->post('ddp',true),
                'nilai_asset' => $this->input->post('nilai_asset' ,true),
                'nilai_total_keseluruhan' => $this->input->post('nilai_total_keseluruhan' ,true),
                'tanggal_barang_diterima' => $this->input->post('tanggal_barang_diterima' ,true),
                'id_vendor' => $this->input->post('id_vendor' ,true),
                'jenis_pembayaran' => $this->input->post('jenis_pembayaran',true),
                'id_cabang' => $this->input->post('id_cabang' ,true),
                'id_lokasi' => $this->input->post('id_lokasi' ,true),
                'nama_pengguna' => $this->input->post('nama_pengguna' ,true),              
                'keterangan' => $this->input->post('keterangan' ,true),
                'stok' => $this->input->post('stok' ,true),
                'foto' => $this->input->post('foto' ,true),
                'asal_hadiah' => $this->input->post('asal_hadiah',true),
                'ppn' => $this->input->post('ppn' ,true),
                'ket_ppn' => $this->input->post('ket_ppn',true),
                'merk' => $this->input->post('merk',true),
                'aksesoris_tambahan' => $this->input->post('aksesoris_tambahan',true),
                'serial_number' => $this->input->post('serial_number' ,true),
                'uang_muka' => $this->input->post('uang_muka',true),
                'cicilan_perbulan' => $this->input->post('cicilan_perbulan',true),
                'tenor' => $this->input->post('tenor',true),
                'nilai_total' => $this->input->post('nilai_total',true),
                'no_mesin' => $this->input->post('no_mesin',true),
                'no_rangka' => $this->input->post('no_rangka',true),
                'user'  => $this->session->userdata('username')
            
        ];
        var_dump($data);die;

        // $config['upload_path']      = './upload/';
        // $config['allowed_types']    = 'gif|jpg|png';
        // $config['max_size']         = 100;
        // $config['max_width']        = 1024;
        // $config['max_height']       = 768;
        // $config['file_name']        = $this->input->post('idtransaksi_inv');

        $id = $this->input->post('id_inventory',true);

        $inventory = $this->mtransga->getInventoryById($id);
        if ($inventory) {
            $this->session->set_flashdata('warning', 'sudah ada');

            redirect('transaksi/management_office');
            
        } else {
            if ($this->mtransga->addInv($data)) {
                $this->session->set_flashdata('berhasil', 'berhasil ditambah');
                
                redirect('transaksi/management_office');
                
            } else {
                $this->session->set_flashdata('gagal', 'gagal ditambah');

                redirect('transaksi/management_office'); 
            }
            
        }
        
    }

    //----------//

    //---------//
    public function ajax_get_statusinv2()
    {
        $output = '';
		$no = 0;
        $liststatusinv = $this->mtransga->getStatusInv();
		foreach ($liststatusinv as $list) {
			$no++;
			$output .='
				<option value="'.$list['idstatus_inventory'].'">'.$list['idstatus_inventory'].' - '.$list['status_inventory'].'</option>
			';
        }
        echo '<option value="">--- Pilih Status Inventory ---</option>';
        echo $output;
		
    }

    public function ajax_get_subinv2()
    {
        $output = '';
        $no = 0;
        $id = $this->input->post('idjenis_inventory');
        $jenissubinv = $this->mtransga->getSubInvById($id);
        var_dump($jenissubinv);
		foreach ($jenissubinv as $list) {
			$no++;
			$output .='
				<option value="'.$list['idsub_inventory'].'">'.$list['idsub_inventory'].' - '.$list['sub_inventory'].'</option>
			';
        }
        echo '<option value="">--- Pilih Sub Inventory ---</option>';
        echo $output;
		
    }


    public function ajax_get_jenisinv2()
    {
        $output = '';
		$no = 0;
        $listjenisinv = $this->mtransga->getJenisInv();
		foreach ($listjenisinv as $list) {
			$no++;
			$output .='
				<option value="'.$list['idjenis_inventory'].'">'.$list['idjenis_inventory'].' - '.$list['jenis_inventory'].'</option>
			';
        }
        echo '<option value="">--- Pilih Jenis Inventory ---</option>';
        echo $output;
		
    }

    public function ajax_get_vendor2()
    {
        $output = '';
		$no = 0;
        $listvendor = $this->mtransga->getVendor();
		foreach ($listvendor as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_vendor'].'">'.$list['id_vendor'].' - '.$list['nama_vendor'].'</option>
			';
        }
        echo '<option value="">--- Pilih Vendor ---</option>';
        echo $output;
		
    }

    public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->mtransga->getCabang();
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
        $lokasicabang = $this->mtransga->getLokasiCabang($id);
        foreach ($lokasicabang as $lokcab) {
            $idlokasi = $lokcab['id_lokasi'];
            $listlokasi = $this->mtransga->getLokasiByid($idlokasi);
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



}

/* End of file Transaksi_GA.php */

?>