<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi_Auditor extends CI_Model {

    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> SERVER_BASE.'ci-server-lala/api/audit/'
            ]);
        }


    public function getUnit($offset)
    {
      $respon =  $this->_client->request('GET', 'unit',[
          'query' => [
              'offset' => $offset
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

        return $result['data'];
        }else {
            return false;
        }   
    }

    public function getPart()
    {
      $respon =  $this->_client->request('GET', 'part');

      $result = json_decode($respon->getBody()->getContents(),true);

      return $result['data'];
    }

    public function addUnit($data)
    {
        $respon =  $this->_client->request('POST', 'user',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function getCabang()
    {
        $respon =  $this->_client->request('GET', 'cabang');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }

    public function countunit()
      {
          $respon =  $this->_client->request('GET', 'countunit');

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function previewUnit($a,$b,$c,$d,$e)
    {
        $respon =  $this->_client->request('GET', 'previewUnit',[
            'query'=>[
                'id_cabang' => $a,
                'tanggal_awal'=>$b,
                'tanggal_akhir'=>$c,
                'status'=> $d,
                'offset' => $e
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

/* End of file M_Transaksi_Auditor.php */


?>