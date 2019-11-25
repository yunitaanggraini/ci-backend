<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_GA extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_transaksi_GA','mtransga');
    }
    

    public function viewOffice()
    {
            $data=[
                'judul'=> "Monitoring Inventory",
                'judul1'=>'Transaksi GA'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('general_affairview/monitoring_office/v_monitoring_inv.php',$data);       
            $this->load->view('general_affairview/monitoring_office/_partial/footer.php');
    }

    public function inputOffice()
    {
        $data=[
            'judul'=> "Management Inventory",
            'judul1'=>'Transaksi GA'
        ];
        $this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');   
         $this->load->view('general_affairview/management_office/v_management_inv.php',$data);
         $this->load->view('general_affairview/management_office/_partial/footer.php');
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
                <a id="'.$list->id_inventory.'" class="text-warning"><i class="fa fa-pencil"></i></a>
                <a id="'.$list->id_inventory.'" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
                <td>'.$list->idtransaksi_inv.'</td>
                <td>'.$list->status_inventory.'</td>
                <td>'.$list->jenis_inventory.'</td>
                <td>'.$list->sub_inventory.'</td>
                <td>'.$list->nilai_awal.'</td>
                <td>'.$list->ddp.'</td>
                <td>'.$list->nilai_asset.'</td>
                <td>'.$list->nilai_total_keseluruhan.'</td>
                <td>'.$list->tahun_pembuatan.'</td>
                <td>'.$list->nik.'</td>
                <td>'.$list->vendor.'</td>
                <td>'.$list->tanggal_barang_diterima.'</td>
                <td>'.$list->jenis_pembayaran.'</td>
                <td>'.$list->keterangan.'</td>
                <td>'.$list->stok.'</td>
                <td>'.$list->foto.'</td>
                <td>'.$list->ppn.'</td>
                <td>'.$list->merk.'</td>
                <td>'.$list->aksesoris_tambahan.'</td>
            </tr>
          ';
       }
       echo $output;
    }




    public function post_inventory()
    {
        $data =[
            
            'idtransaksi_inv' => $this->post('idtransaksi_inv',true),
            'idstatus_inventory' => $this->post('idstatus_inventory',true),
            'idjenis_inventory' => $this->post('idjenis_inventory',true),
            'idsub_inventory' => $this->post('idsub_inventory',true),
            'nilai_awal' => $this->post('nilai_awal',true),
            'ddp' => $this->post('ddp',true),
            'nilai_total_keseluruhan' => $this->post('nilai_total_keseluruhan',true),
            'id_vendor' => $this->post('id_vendor',true),
            'nik' => $this->post('nik',true),
            'tanggal_barang_diterima' => $this->post('tanggal_barang_diterima',true),
            'jenis_pembayaran' => $this->post('jenis_pembayaran',true),
            'keterangan' => $this->post('keterangan',true),
            'stok' => $this->post('stok',true),
            'foto' => $this->post('foto',true),
            'ppn' => $this->post('ppn',true),
            'merk' => $this->post('merk',true),
            'aksesoris_tambahan' => $this->post('aksesoris_tambahan',true),
            'barcode' => $this->post('barcode',true),
            'qrcode' => $this->post('qrcode',true),
            
        ];

        $id = $this->input->post('idtransaksi_inv',true);

        $inventory = $this->mtranga->getInventoryById($id);
        if ($inventory) {
            $this->session->set_flashdata('warning', 'sudah ada');

            redirect('transaksi/management_office');
            
        } else {
            if ($result = $this->mtransga->addInventory($data)) {
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