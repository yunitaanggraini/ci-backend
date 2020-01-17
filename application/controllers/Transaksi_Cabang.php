<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_Cabang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi_GA', 'mtransga');
        if (!$this->session->userdata('username')) {

            redirect('login/sima_login');
        } else {
            if ($this->session->userdata('usergroup') == 'UG004') {
            } else {
                redirect('error');
            }
        }
    }

    public function inputOffice()
    {
        $data = [
            'judul' => "Input Data Inventory",
            'judul1' => 'Transaksi Admin',
            'max' => $this->mtransga->getcountInv()
        ];
        // var_dump($data);die;
        $this->load->view('_partial/header.php', $data);
        $this->load->view('_partial/sidebar.php');
        $this->load->view('cabang/input_office/v_management_inv.php', $data);
        $this->load->view('cabang/input_office/_partial/footer.php', $data);
    }
    public function ajax_get_statusinv2($id = null)
    {
        $output = '';
        $no = 0;
        $liststatusinv = $this->mtransga->getStatusInv();
        foreach ($liststatusinv as $list) {
            $no++;
            if ($list['idstatus_inventory'] == $id) {
                $output .= '
				<option value="' . $list['idstatus_inventory'] . '" selected>' . $list['idstatus_inventory'] . ' - ' . $list['status_inventory'] . '</option>
			';
            } else {
                $output .= '
                    <option value="' . $list['idstatus_inventory'] . '">' . $list['idstatus_inventory'] . ' - ' . $list['status_inventory'] . '</option>
                ';
            }
        }
        echo '<option value="">--- Pilih Status Inventory ---</option>';
        echo $output;
    }

    public function ajax_get_subinv2()
    {
        $output = '';
        $no = 0;
        $id = $this->input->post('idjenis_inventory');
        $sub = $this->input->post('id');

        $jenissubinv = $this->mtransga->getSubInvById($id);
        // var_dump($jenissubinv);
        foreach ($jenissubinv as $list) {
            $no++;
            if ($list['idsub_inventory'] == $sub) {
                $output .= '
                    <option value="' . $list['idsub_inventory'] . '" selected>' . $list['idsub_inventory'] . ' - ' . $list['sub_inventory'] . '</option>
                ';
            } else {
                $output .= '
                    <option value="' . $list['idsub_inventory'] . '">' . $list['idsub_inventory'] . ' - ' . $list['sub_inventory'] . '</option>
                ';
            }
        }
        echo '<option value="">--- Pilih Sub Inventory ---</option>';
        echo $output;
    }


    public function ajax_get_jenisinv2($id = null)
    {
        $output = '';
        $no = 0;
        $listjenisinv = $this->mtransga->getJenisInv();
        foreach ($listjenisinv as $list) {
            $no++;
            if ($list['idjenis_inventory'] == $id) {
                $output .= '
                    <option value="' . $list['idjenis_inventory'] . '" selected>' . $list['idjenis_inventory'] . ' - ' . $list['jenis_inventory'] . '</option>
                ';
            } else {
                $output .= '
                    <option value="' . $list['idjenis_inventory'] . '" >' . $list['idjenis_inventory'] . ' - ' . $list['jenis_inventory'] . '</option>
                ';
            }
        }
        echo '<option value="">--- Pilih Jenis Inventory ---</option>';
        echo $output;
    }

    public function ajax_get_vendor2($id = null)
    {
        $output = '';
        $no = 0;
        $listvendor = $this->mtransga->getVendor();
        foreach ($listvendor as $list) {
            $no++;
            if ($list['id_vendor'] == $id) {
                $output .= '
                    <option value="' . $list['id_vendor'] . '" selected>' . $list['id_vendor'] . ' - ' . $list['nama_vendor'] . '</option>
                ';
            } else {
                $output .= '
                    <option value="' . $list['id_vendor'] . '">' . $list['id_vendor'] . ' - ' . $list['nama_vendor'] . '</option>
                ';
            }
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
            $output .= '
				<option value="' . $list['id_cabang'] . '">' . $list['id_cabang'] . ' - ' . $list['nama_cabang'] . '</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;
    }

    public function ajax_get_lokasi2()
    {
        $output = '';
        $no = 0;
        $id = $this->input->post('id_cabang');
        $id2 = $this->input->post('key');
        $lokasicabang = $this->mtransga->getLokasiCabang($id);
        foreach ($lokasicabang as $lokcab) {
            $idlokasi = $lokcab['id_lokasi'];
            $listlokasi = $this->mtransga->getLokasiByid($idlokasi);
            foreach ($listlokasi as $list) {
                $no++;
                if ($list['id_lokasi'] == $id2) {
                    $output .= '
                        <option value="' . $list['id_lokasi'] . '" selected>' . $list['id_lokasi'] . ' - ' . $list['nama_lokasi'] . '</option>
                    ';
                } else {
                    $output .= '
                        <option value="' . $list['id_lokasi'] . '">' . $list['id_lokasi'] . ' - ' . $list['nama_lokasi'] . '</option>
                    ';
                }
            }
        }
        echo '<option value="">--- Pilih Lokasi ---</option>';
        echo $output;
    }
}

/* End of file Transaksi_Cabang.php */
