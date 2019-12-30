<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barcode','mbarcode');
        
        
    }

    public function BarcodePart()
    {
        $data=[
            'judul'=> "Data Part",
            'judul1'=>'Cetak Barcode',
            'tgl' => date('m/d/Y')
       ]; 
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('gudangview/barcode_part/v_data_part.php',$data);		
        $this->load->view('gudangview/barcode_part/_partial/footer.php');
    }

    public function BarcodeUnit()
    {
        $data=[
            'judul'=> "Data Unit",
            'judul1'=>'Cetak Barcode',
            'tgl' => date('m/d/Y')
       ]; 
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('gudangview/barcode_unit/v_data_unit.php',$data);		
        $this->load->view('gudangview/barcode_unit/_partial/footer.php');
    }

    

    // public function BuatBarcode()
    // {
    //    $data=[
    //         'judul'=> "User Group",
    //         'judul1'=>'Master Data',
    //         'list_barcode' => $this->mbarcode->getIdBarcode()
    //    ]; 
	// 	$this->load->view('_partial/header.php',$data);
    //     $this->load->view('_partial/sidebar.php');		
    //     $this->load->view('general_affairview/barcode/v_input_barcode.php',$data);		
    //     $this->load->view('general_affairview/barcode/_partial/footer.php');
    // }

    // public function addBarcode()
    // {
    //     $this->zend->load('Zend/Barcode');
    //     $barcode = $this->input->post('id');
    //     $imageResource = Zend_Barcode::factory('code128','image',array('text'=>$barcode), array())->draw();
    //     $imageName = $barcode.'.jpg';
    //     $imagePath = 'barcode/';
    //     imagejpeg($imageResource.$imageName);
    //     $pathBarcode = $imagePath.$imageName;
    // }

    public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->mbarcode->getCabang();
		foreach ($listcabang as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['nama_cabang'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;	
    }

    

}

/* End of file Barcode.php */
