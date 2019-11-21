<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Laporan extends CI_Controller {


     function my_DOMPDF(){
      $this->load->library('pdf');
      $this->pdf->load_view('common/template');
      $this->pdf->render();
      $this->pdf->stream("laporan.pdf");
     }
    }
    
    /* End of file Laporan.php */
    
?>