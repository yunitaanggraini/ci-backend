<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Audit extends CI_Model {
    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> 'http://192.168.43.95/ci-server-lala/api/master/'
            ]);
        }

    public function getCabang()
    {
        $respon =  $this->_client->request('GET', 'cabang');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }

    public function getJenisAudit()
    {
        $respon =  $this->_client->request('GET', 'jenisaudit');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }

    //-----------------BY ID---------------//
    public function getJadwalAuditById($id)
    {
        $respon =  $this->_client->request('GET', 'JadwalAudit',[
            'query' =>[
                'id'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        if ($result['status']==true) {
            return $result['data']; 
        }else{
            return false;
        }
    }

    //-----ADD---//
    public function addJadwalAudit($data)
    {
        $respon =  $this->_client->request('POST', 'user',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    //----------UPDATE---------//
    public function UpdateJadwalAudit($data)
    {
        $respon =  $this->_client->request('PUT', 'jadwalaudit',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    //---------DELETE------------//
    public function delJadwalAudit($id)
    { 
        $respon =  $this->_client->request('DELETE', 'jadwalaudit',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

}

/* End of file M_Audit.php */

?>