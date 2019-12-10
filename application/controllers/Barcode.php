<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barcode','barcode');
        $this->load->library('zend','database');
        
    }

    

    public function BuatBarcode()
    {
       $data=[
            'judul'=> "User Group",
            'judul1'=>'Master Data',
            'list_barcode' => $this->mbarcode->getIdBarcode()
       ]; 
		$this->load->view('_partial/header.php',$data);
        $this->load->view('_partial/sidebar.php');		
        $this->load->view('general_affairview/barcode/v_input_barcode.php',$data);		
        $this->load->view('general_affairview/barcode/_partial/footer.php');
    }

    public function addBarcode()
    {
        $this->zend->load('Zend/Barcode');
        $barcode = $this->input->post('id');
        $imageResource = Zend_Barcode::factory('code128','image',array('text'=>$barcode), array())->draw();
        $imageName = $barcode.'.jpg';
        $imagePath = 'barcode/';
        imagejpeg($imageResource.$imageName);
        $pathBarcode = $imagePath.$imageName;
    }



    

}

/* End of file Barcode.php */
