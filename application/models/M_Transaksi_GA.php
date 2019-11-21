<?php

use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi_GA extends CI_Model {

    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> 'http://192.168.43.95/ci-server-lala/api/master/'
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



    

}

/* End of file M_Transaksi_GA.php */
