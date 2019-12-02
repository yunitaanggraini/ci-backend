<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan_Auditor extends CI_Model {
    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> 'http://192.168.43.95/ci-server-lala/api/audit/'
            ]);
        }

    public function getCabang()
    {
        $respon =  $this->_client->request('GET', 'cabang');

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];              
    }

}

/* End of file M_Laporan_Auditor.php */

?>