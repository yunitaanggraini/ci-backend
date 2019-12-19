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

}

/* End of file M_Laporan_Auditor.php */

?>