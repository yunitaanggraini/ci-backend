<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu extends CI_Model {
    private $_client;

    
    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://192.168.43.95/ci-server-lala/api/master/'
        ]);
    }
    

    public function getMenu($access)
    {
        $respon = $this->_client->request('GET', 'menu',[
            'query' => [
                'access' => $access
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        return $result['data'];

    }
    

    public function SubMenu($id_menu)
    {
        $respon = $this->_client->request('GET','submenu',[
            'query' => [
                'id' =>$id_menu,
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        return $result['data'];
    }
    
}

/* End of file ModelName.php */

?>