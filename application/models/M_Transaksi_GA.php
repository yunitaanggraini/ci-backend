<?php

use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi_GA extends CI_Model {

    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> 'http://192.168.43.95/ci-server-lala/api/transaksi/'
            ]);
        }
    
    public function getInv()
    {
        $respon =  $this->_client->request('GET', 'transaksi_inventory');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function getInvById($id)
    {
        $respon =  $this->_client->request('GET', 'transaksi_inventory',[
            'query' =>[
                'id'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        if ($result['status']==true) {
            return $result['data']['0']; 
        }else{
            return false;
        }
    }

    public function addInv($data)
    {
        $respon =  $this->_client->request('POST', 'transaksi_inventory',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function UpdateInv($data)
    {
        $respon =  $this->_client->request('PUT', 'transaksi_inventory',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function delInv($id)
    { 
        $respon =  $this->_client->request('DELETE', 'transaksi_inventory',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    //------------------------//

    public function getJenisInv()
    {
        $respon =  $this->_client->request('GET', 'jenisinv');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }
    public function getSubInv($id)
    {
        $respon =  $this->_client->request('GET', 'subinv');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function getStatusInv()
    {
        $respon =  $this->_client->request('GET', 'statusinv');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function getVendor()
    {
        $respon =  $this->_client->request('GET', 'vendor');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function getCabang()
    {
        $respon =  $this->_client->request('GET', 'cabang');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }
    
    public function getLokasi()
    {
        $respon =  $this->_client->request('GET', 'lokasi');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }

    public function getLokasiCabang($id)
    {
        $respon =  $this->_client->request('GET', 'lokasicabang',[
            'query' =>[
                'id_cabang' => $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }

    //---//

    public function getCabangById($id)
    {
        $respon =  $this->_client->request('GET', 'cabang',[
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


    public function getJenisInvById($id)
    {
        $respon =  $this->_client->request('GET', 'jenisinv',[
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

    public function getSubInvById($id)
    {
        $respon =  $this->_client->request('GET', 'subjenisinv',[
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



    

}

/* End of file M_Transaksi_GA.php */
