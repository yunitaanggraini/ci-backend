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


    public function getUnit()
    {
      $respon =  $this->_client->request('GET', 'unit');

      $result = json_decode($respon->getBody()->getContents(),true);

      return $result['data'];
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

}

/* End of file M_Transaksi_Auditor.php */


?>