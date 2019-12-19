<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_auditor extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_laporan_auditor','mlapaudit');
        $this->load->model('m_master_data','mmasdat');

        if (!$this->session->userdata('username')) {
            
            redirect('login/login');
            
        }else{
            if ($this->session->userdata('usergroup') != 'UG002') {
                redirect('error');  
            }
        }
    }

    public function Laporan_Unit()
        {
            $data=[
                'judul'=> "Audit Data Unit",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_filter_kondisi.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }
        public function cetakexcel()
        {
            $excel = new PHPExcel();
            $tgl = date ('Ymd');
            $cabang = $this->input->post('id_cabang');
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_awal = strtotime($tgl_awal);
            $tgl_awal= date('Y-m-d',$tgl_awal);
            $tgl_akhir = $this->input->post('tgl_akhir');
            $tgl_akhir = strtotime($tgl_akhir);
            $tgl_akhir= date('Y-m-d',$tgl_akhir);
            $status = $this->input->post('status');
            $style_col = [
                'font' =>['bold'=>true],
                'alignment'=>[
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'top'=>['style' => PHPExcel_Style_Border::BORDER_THIN],
                    'right'=>['style' => PHPExcel_Style_Border::BORDER_THIN],
                    'left'=>['style'=> PHPExcel_Style_Border::BORDER_THIN],
                    'bottom'=>['style' => PHPExcel_Style_Border::BORDER_THIN]
                ]

            ];
            
            $style_row=[
                'alignment'=>[
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'top'=>['style' => PHPExcel_Style_Border::BORDER_THIN],
                    'right'=>['style' => PHPExcel_Style_Border::BORDER_THIN],
                    'left'=>['style'=> PHPExcel_Style_Border::BORDER_THIN],
                    'bottom'=>['style' => PHPExcel_Style_Border::BORDER_THIN]
                ]
                ];
                $cab = $this->mlapaudit->getCabangbyId($cabang);
                foreach ($cab as $c ) {
                    $cab = $c['nama_cabang'];
                }
                $excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
                $excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTop('A5');

                $excel->setActiveSheetIndex(0)->setCellValue('A1','TEMUAN AUDIT '.strtoupper($status));
                $excel->getActiveSheet()->mergeCells('A1:H1');
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
                $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $excel->setActiveSheetIndex(0)->setCellValue('A2','TRIO MOTOR '.$cab);
                $excel->getActiveSheet()->mergeCells('A2:H2');
                $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
                $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $excel->setActiveSheetIndex(0)->setCellValue('A3','PERIODE '.$tgl_awal);
                $excel->getActiveSheet()->mergeCells('A3:H3');
                $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(14);
                $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $excel->setActiveSheetIndex(0)->setCellValue('A5','NO.');
                $excel->setActiveSheetIndex(0)->setCellValue('B5','NO. MESIN');
                $excel->setActiveSheetIndex(0)->setCellValue('C5','NO. RANGKA');
                $excel->setActiveSheetIndex(0)->setCellValue('D5','KODE ITEM');
                $excel->setActiveSheetIndex(0)->setCellValue('E5','TYPE UNIT');
                $excel->setActiveSheetIndex(0)->setCellValue('F5','USIA UNIT');
                $excel->setActiveSheetIndex(0)->setCellValue('G5','LOKASI');
                $excel->setActiveSheetIndex(0)->setCellValue('H5','STATUS');
                
                $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);

                $cetak = $this->mlapaudit->cetakUnit($cabang, $tgl_awal,$tgl_akhir,$status);

                // var_dump($cetak,$cabang, $tgl_awal,$tgl_akhir,$status);die;
                $no=1;
                $seri=6;

                foreach ($cetak as $c ) {
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$seri,$no);
                $excel->setActiveSheetIndex(0)->setCellValue('B'.$seri,$c['no_mesin']);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$seri,$c['no_rangka']);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$seri,$c['kode_item']);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$seri,$c['type']);
                $excel->setActiveSheetIndex(0)->setCellValue('F'.$seri,$c['umur_unit']);
                $excel->setActiveSheetIndex(0)->setCellValue('G'.$seri,$c['nama_lokasi']);
                $excel->setActiveSheetIndex(0)->setCellValue('H'.$seri,strtoupper($c['status_unit']));
                    
                $excel->getActiveSheet()->getStyle('A'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('G'.$seri)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('H'.$seri)->applyFromArray($style_row);

                $no++;
                $seri++;

                }

                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
                $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);

                $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

                $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
                $statu = strtoupper($status);
                $excel->getActiveSheet(0)->setTitle($statu.$tgl);
                $excel->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header("Content-Disposition: attachment; filename=REPORT-UNIT".$statu.$tgl.".xlsx"); // Set nama file excel nya
                header('Cache-Control: max-age=0');
                $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
                $write->save('php://output');
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

            $cetak = $this->mlapaudit->cetakUnit($cabang, $tgl_awal,$tgl_akhir,$status);
            // var_dump($cabang, $tgl_awal,$tgl_akhir,$status);die;
            $no=0;
            $output ='';
            if ($cetak) {
                
                foreach ($cetak as $c) {
                    $no++;
                    $output .='
                    <tr> 
                        <td>'.$no.'</td>
                        <td>'.$c['no_mesin'].'</td>
                        <td>'.$c['no_rangka'].'</td>
                        <td>'.$c['kode_item'].'</td>
                        <td>'.$c['type'].'</td>
                        <td>'.$c['umur_unit'].'</td>
                        <td>'.$c['nama_lokasi'].'</td>
                        <td>'.$c['status_unit'].'</td>
                    </tr>
                    
                    ';
                }
            }else{
                $output .='
                <tr>
                <td colspan="8" class="text-center">data not found.</td>
                </tr>
                ';
            }
            echo $output;

        }

    public function Filter_Cabang()
        {
            $data=[
                'judul'=> "Filter Cabang",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_filter_cabang.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

    public function Filter_Kondisi()
        {
            $data=[
                'judul'=> "Filter Cabang",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_filter_kondisi.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }
    

    public function Lap_Audit_unit()
        {
            $data=[
                'judul'=> "Laporan Audit Unit",
                'judul1'=>'Laporan Auditor'
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_audit_unit.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

        public function Lap_Perlokasi()
        {
            $data=[
                'judul'=> "Laporan Perlokasi",
                'judul1'=>'Laporan Auditor',
                'tgl' => date('d/m/Y'),

            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_perlokasi.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

        public function Lap_sesuai()
        {
            $data=[
                'judul'=> "Laporan Data Sesuai",
                'judul1'=>'Laporan Auditor',
                'tgl' => date('m/d/Y'),
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_sesuai.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

        public function Lap_belum_sesuai()
        {
            $data=[
                'judul'=> "Laporan Data Belum Sesuai",
                'judul1'=>'Laporan Auditor',
                'tgl' => date('m/d/Y'),
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_belum_sesuai.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }

        public function Lap_belum_ditemukan()
        {
            $data=[
                'judul'=> "Laporan Belum Ditemukan",
                'tgl' => date('m/d/Y'),
                'judul1'=>'Laporan Auditor',
            ];
            $this->load->view('_partial/header.php',$data);
            $this->load->view('_partial/sidebar.php');      
            $this->load->view('auditorview/laporan_unit/v_laporan_belum_ditemukan.php',$data);       
            $this->load->view('auditorview/laporan_unit/_partial/footer.php');
            
        }
        //------------------GET DATA--------------//
        public function ajax_get_cabang2()
    {
        $output = '';
		$no = 0;
        $listcabang = $this->mlapaudit->getCabang();
		foreach ($listcabang as $list) {
			$no++;
			$output .='
				<option value="'.$list['id_cabang'].'">'.$list['id_cabang'].' - '.$list['nama_cabang'].'</option>
			';
        }
        echo '<option value="">--- Pilih Cabang ---</option>';
        echo $output;
		
    }

    //------SEARCH DATA--------//
    public function search_data_jadwal()
    {
        $jadwal = $this->input->post('id');
        $output = '';
        $no = 0;
        $base = base_url();
        // var_dump($usergroup);
        if ($jadwal!= null) {
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

}

/* End of file laporan_auditor.php */


?>