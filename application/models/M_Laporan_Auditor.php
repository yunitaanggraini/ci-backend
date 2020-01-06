<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan_Auditor extends CI_Model {
    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> SERVER_BASE.'ci-server-lala/api/audit/'
            ]);
        }

    public function getCabang()
    {
        $respon =  $this->_client->request('GET', 'cabang');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }
    public function getCabangbyid($id)
    {
        $respon =  $this->_client->request('GET', 'cabang',[
            'query'=>[
                'id'=>$id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }
    public function cetakUnit($a,$b,$c,$d)
    {
        $respon =  $this->_client->request('GET', 'cetakunit',[
            'query'=>[
                'id_cabang' => $a,
                'tanggal_awal'=>$b,
                'tanggal_akhir'=>$c,
                'status'=> $d
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];              
        }else{
            return false;
        }
    }
    public function Pdf($a,$b,$c,$d,$e)
    {
        $respon =  $this->_client->request('GET', 'previewunit',[
            'query'=>[
                'id_cabang' => $a,
                'tanggal_awal'=>$b,
                'tanggal_akhir'=>$c,
                'status'=> $d,
                'offset' => $e
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        return $result['data'];
    }
    public function previewUnit($a,$b,$c,$d,$e)
    {
        $respon =  $this->_client->request('GET', 'previewunit',[
            'query'=>[
                'id_cabang' => $a,
                'tanggal_awal'=>$b,
                'tanggal_akhir'=>$c,
                'status'=> $d,
                'offset' => $e
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        $output='';
        if ($result['status']==true) {
            foreach ($result['data'] as $res ) {
                $e++;
                $output.='
                    <tr>
                    <td>'.$e.'</td>
                    <td>'.$res['no_mesin'].'</td>
                    <td>'.$res['no_rangka'].'</td>
                    <td>'.$res['kode_item'].'</td>
                    <td>'.$res['type'].'</td>
                    <td>'.$res['umur_unit'].'</td>
                    <td>'.$res['nama_lokasi'].'</td>
                    <td>'.$res['status_unit'].'</td>
                    </tr>
                ';
            }             
        }else{
            $output.= '
                <tr><td colspan="8" class="text-center">Data not found.</td></tr>
            ';
        }
        return $output;
    }
    public function countunit($a,$b,$c,$d)
    {
        $respon =  $this->_client->request('GET', 'countunit',[
            'query'=>[
                'id_cabang' => $a,
                'tgl_awal'=>$b,
                'tgl_akhir'=>$c,
                'status'=> $d
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];              
        }else{
            return 0;
        }
    }
    public function countunitvalid($a,$b,$c)
    {
        // var_dump($a,$b,$c);die;
        $respon =  $this->_client->request('GET', 'countunitvalid',[
            'query'=>[
                'id_cabang' => $a,
                'tgl_awal'=>$b,
                'tgl_akhir'=>$c
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];              
        }else{
            return 0;
        }
    }
    public function auditUnit($a,$b,$c,$d)
    {
        $respon =  $this->_client->request('GET', 'unitvalid',[
            'query'=>[
                'id_cabang' => $a,
                'tgl_awal'=>$b,
                'tgl_akhir'=>$c,
                'offset' =>$d
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        $output='';
        if ($result['status']==true) {
            foreach ($result['data'] as $res ) {
                $d++;
                $output.='
                    <tr>
                    <td>'.$d.'</td>
                    <td>'.$res['no_mesin'].'</td>
                    <td>'.$res['no_rangka'].'</td>
                    <td>'.$res['nama_cabang'].'</td>
                    <td>'.$res['nama_lokasi'].'</td>
                    <td>'.$res['umur_unit'].'</td>
                    <td>'.$res['status_unit'].'</td>
                    <td>'.$res['kode_item'].'</td>
                    <td>'.$res['type'].'</td>
                    <td>'.$res['keterangan'].'</td>
                    <td>'.$res['tanggal_audit'].'</td>
                    </tr>
                ';
            }             
        }else{
            $output.= '
                <tr><td colspan="8" class="text-center">Data not found.</td></tr>
            ';
        }
        return $output;
    }
    public function auditPdf($a,$b,$c,$d)
    {
        if ($d===null) {
            $respon =  $this->_client->request('GET', 'unitvalid',[
                'query'=>[
                    'id_cabang' => $a,
                    'tgl_awal'=>$b,
                    'tgl_akhir'=>$c,
                    'offset' =>null
                ]
            ]);
        }else{
            $respon =  $this->_client->request('GET', 'unitvalid',[
                'query'=>[
                    'id_cabang' => $a,
                    'tgl_awal'=>$b,
                    'tgl_akhir'=>$c,
                    'offset' =>$d
                ]
            ]);
        }

        $result = json_decode($respon->getBody()->getContents(),true);
        if ($result['status']==true) {
            return $result['data'];         
        }else{
            return false;         
        }
    }

}

/* End of file M_Laporan_Auditor.php */

?>