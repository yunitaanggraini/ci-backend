<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Audit extends CI_Model {
    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> 'http://192.168.43.95/ci-server-lala/api/audit/'
            ]);
        }

        public function getAudit()
        {
            $respon =  $this->_client->request('GET', 'audit');
    
            $result = json_decode($respon->getBody()->getContents(),true);
    
            return $result['data'];              
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

    public function getTempUnit()
    {
      $respon =  $this->_client->request('GET', 'tempunit');

      $result = json_decode($respon->getBody()->getContents(),true);

      return $result['data'];
    }

    public function getTempPart()
    {
      $respon =  $this->_client->request('GET', 'temppart');

      $result = json_decode($respon->getBody()->getContents(),true);

      return $result['data'];
    }

    //-----------------BY ID---------------//
    public function getJadwalAuditById($id)
    {
        $respon =  $this->_client->request('GET', 'audit',[
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

    public function getTempUnitById($id)
    {
        $respon =  $this->_client->request('GET', 'tempunit',[
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

    public function getLokasiById($id)
    {
        $respon =  $this->_client->request('GET', 'lokasi',[
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
    public function addAudit($data)
    {
        $respon =  $this->_client->request('POST', 'audit',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    //----------UPDATE---------//
    public function UpdateJadwalAudit($data)
    {
        $respon =  $this->_client->request('PUT', 'audit',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    //---------DELETE------------//
    public function delJadwalAudit($id)
    { 
        $respon =  $this->_client->request('DELETE', 'audit',[
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