<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Master_Data extends CI_Model {

    private $_client;
    public function __construct()
        {
            parent::__construct();
            $this->_client = new Client([
                'base_uri'=> SERVER_BASE.'ci-server-lala/api/master/'
            ]);
        }

    // public function getUser()
    // {
    //     $respon =  $this->_client->request('GET', 'user');

    //     $result = json_decode($respon->getBody()->getContents(),true);

    //     if ($result['status']==true) {

    //         return $result['data'];
    //     }else {
    //         return false;
    //     }
        
    // }

    public function getUser($offset)
    {
        $respon =  $this->_client->request('GET', 'user',[
            'query' =>[
                'pages' => $offset
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }  
    }
    public function countUser()
    {
        $respon =  $this->_client->request('GET', 'countuser');

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }  
    }
    



    public function getUserGroup()
    {
      $respon =  $this->_client->request('GET', 'usergroup');

      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {

        return $result['data'];
        }else {
            return false;
        }
    }

    public function getJenisInv ()
    {
        $respon =  $this->_client->request('GET', 'jenisinv');
      
        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }              
    }

    public function getSubInv()
    {
        $respon =  $this->_client->request('GET', 'subinv');

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }
    }

    public function getStatusInv()
    {
        $respon =  $this->_client->request('GET', 'statusinv');

        $result = json_decode($respon->getBody()->getContents(),true);
        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }
        
    }

    public function getPerusahaan()
    {
        $respon =  $this->_client->request('GET', 'perusahaan');

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }              
    }

    public function getCabang()
    {
        $respon =  $this->_client->request('GET', 'cabang');

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }              
    }
    
    public function getLokasi($offset)
    {
        $respon =  $this->_client->request('GET', 'lokasi',[
            'query'=>[
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

    public function getVendor()
    {
        $respon =  $this->_client->request('GET', 'vendor');

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }              
    }

    public function getJenisAudit()
    {
        $respon =  $this->_client->request('GET', 'jenisaudit');

        $result = json_decode($respon->getBody()->getContents(),true);
        if ($result['status']==true) {

            return $result['data'];
        }else {
            return false;
        }              
    }

    //-----------------------------------------------GET BY ID------------------------------------------------------//
    public function getUserById($id)
    {
        $respon =  $this->_client->request('GET', 'user',[
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

    public function getUserGroupById($id)
    {
        $respon =  $this->_client->request('GET', 'usergroup',[
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
        $respon =  $this->_client->request('GET', 'subinv',[
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

    public function getStatusInvById($id)
    {
        $respon =  $this->_client->request('GET', 'statusinv',[
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

    public function getPerusahaanById($id)
    {
        $respon =  $this->_client->request('GET', 'perusahaan',[
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

    public function getVendorById($id)
    {
        $respon =  $this->_client->request('GET', 'vendor',[
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

    public function getJenisAuditById($id)
    {
        $respon =  $this->_client->request('GET', 'jenisaudit',[
            'query' =>[
                'id'=> $id
            ]
        ]);
        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($respon,$id);die;
        if ($result['status']==true) {
            return $result['data']; 
        }else{
            return false;
        }
    }

    //-------------------------------------------------ADD--------------------------------------------------------//
    public function addUser($data)
    {
        $respon =  $this->_client->request('POST', 'user',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addUserGroup($data)
    {
        $respon =  $this->_client->request('POST', 'usergroup',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addJenisInv($data)
    {
        $respon =  $this->_client->request('POST', 'jenisinv',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addSubInv($data)
    {
        $respon =  $this->_client->request('POST', 'subinv',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addStatusInv($data)
    {
        $respon =  $this->_client->request('POST', 'statusinv',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addPerusahaan($data)
    {
        $respon =  $this->_client->request('POST', 'perusahaan',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addCabang($data)
    {
        $respon =  $this->_client->request('POST', 'cabang',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addLokasi($data)
    {
        $respon =  $this->_client->request('POST', 'lokasi',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addVendor($data)
    {
        $respon =  $this->_client->request('POST', 'vendor',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    public function addJenisAudit($data)
    {
        $respon =  $this->_client->request('POST', 'jenisaudit',[
            'form_params'=> $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];
    }

    //-------------------------------------------------UPDATE--------------------------------------------------------//
    public function editUser($data)
    {
        $respon =  $this->_client->request('PUT', 'user',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateUserGroup($data)
    {
        $respon =  $this->_client->request('PUT', 'usergroup',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateJenisInv($data)
    {
        $respon =  $this->_client->request('PUT', 'jenisinv',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateSubInv($data)
    {
        $respon =  $this->_client->request('PUT', 'subinv',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateStatusInv($data)
    {
        // var_dump($data);die;
        $respon =  $this->_client->request('PUT', 'statusinv',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        return $result['data'];

    }

    public function UpdatePerusahaan($data)
    {
        $respon =  $this->_client->request('PUT', 'perusahaan',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateCabang($data)
    {
        $respon =  $this->_client->request('PUT', 'cabang',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateLokasi($data)
    {
        $respon =  $this->_client->request('PUT', 'lokasi',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateVendor($data)
    {
        $respon =  $this->_client->request('PUT', 'vendor',[
          'form_params'=>  $data
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

    }

    public function UpdateJenisAudit($data)
      {
        $respon =  $this->_client->request('PUT', 'jenisaudit',[
          'form_params'=>  $data
          
        ]);
            
        $result = json_decode($respon->getBody()->getContents(),true);

        return $result['data'];

      }

    //-------------------------------------------------DELETE--------------------------------------------------------//
    public function delUser($id)
    { 
        $respon =  $this->_client->request('DELETE', 'user',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delUserGroup($id)
    { 
        $respon =  $this->_client->request('DELETE', 'usergroup',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delJenisInv($id)
    { 
        $respon =  $this->_client->request('DELETE', 'jenisinv',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delSubInv($id)
    { 
        $respon =  $this->_client->request('DELETE', 'subinv',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delStatusInv($id)
    { 
        $respon =  $this->_client->request('DELETE', 'statusinv',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delPerusahaan($id)
    { 
        $respon =  $this->_client->request('DELETE', 'perusahaan',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delCabang($id)
    { 
        $respon =  $this->_client->request('DELETE', 'cabang',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delLokasi($id)
    { 
        $respon =  $this->_client->request('DELETE', 'lokasi',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delVendor($id)
    { 
        $respon =  $this->_client->request('DELETE', 'vendor',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }

    public function delJenisAudit($id)
    { 
        $respon =  $this->_client->request('DELETE', 'jenisaudit',[
          'form_params'=>[
              'id'=> $id
          ]
      ]);

      $result = json_decode($respon->getBody()->getContents(),true);

      return true;       
    }
    
    //-------------------------------------------------KODE OTOMATIS--------------------------------------------------------//
    
    //------------------------------------------------------KODE2-------------------------------------------------//
    public function buatkodeusergroup()
    {
      $respon =  $this->_client->request('GET', 'usergroupcount');

      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {
        return $result['data']; 
        }else{
            return 0;
        }
    }

    

    public function buatkodesubinventory()
    {
      $respon =  $this->_client->request('GET', 'subinvcount');

      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {
        return $result['data']; 
        }else{
            return 0;
        }
    }

    public function buatkodestatusinventory()
    {
      $respon =  $this->_client->request('GET', 'statusinvcount');

      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {
        return $result['data']; 
        }else{
            return 0;
        }
    }

    public function buatkodevendor()
    {
      $respon =  $this->_client->request('GET', 'vendorcount');

      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {
        return $result['data']; 
        }else{
            return 0;
        }
    }

    public function buatkodejenisaudit()
    {
      $respon =  $this->_client->request('GET', 'jenisauditcount');

      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {
        return $result['data']; 
    }else{
        return false;
    }
    }

    //---------------------------------------------CARI------------------------------------------------------------//
    public function cariUser($username,$nama)
    {
        
        $respon =  $this->_client->request('GET', 'cariuser',[
            'query'=>[
                'username'=> $username,
                'nama'=> $nama
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
    }
    public function cariUsername($username)
    {
        
        $respon =  $this->_client->request('GET', 'cariuser',[
                'query'=>[
                    'username'=> $username
                ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
    }

    public function cariNama($nama)
    {
        
        $respon =  $this->_client->request('GET', 'cariuser',[
                'query'=>[
                    'username'=>null,
                    'nama'=> $nama
                ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
    }

    public function cariUsergroup($id)
      {
          $respon =  $this->_client->request('GET', 'cariusergroup',[
            'query' =>[
                'usergroup'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
          return $result['data'];
        }else{
          return false;
        }
      }

      public function cariSubInv($subinv,$jenisinv)
    {
        
        $respon =  $this->_client->request('GET', 'carisubinv',[
            'query'=>[
                'subinv'=> $subinv,
                'jenisinv'=> $jenisinv
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
    }

    public function cariSubJenis($id)
      {
          $respon =  $this->_client->request('GET', 'carisubinv',[
            'query' =>[
                'jenisinv'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariSub($id)
      {
          $respon =  $this->_client->request('GET', 'carisubinv',[
            'query' =>[
                'subinv'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariJenisInv($id)
      {
          $respon =  $this->_client->request('GET', 'carijenisinv',[
            'query' =>[
                'jenisinv'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }



      public function cariStatusInv($id)
      {
          $respon =  $this->_client->request('GET', 'caristatusinv',[
            'query' =>[
                'statusinv'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariPerusahaan($id)
      {
          $respon =  $this->_client->request('GET', 'cariperusahaan',[
            'query' =>[
                'perusahaan'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariCabang($id)
      {
          $respon =  $this->_client->request('GET', 'caricabang',[
            'query' =>[
                'cabang'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariLokasi($id)
      {
          $respon =  $this->_client->request('GET', 'carilokasi',[
            'query' =>[
                'lokasi'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariVendor($id)
      {
          $respon =  $this->_client->request('GET', 'carivendor',[
            'query' =>[
                'vendor'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }

      public function cariJenisAudit($id)
      {
          $respon =  $this->_client->request('GET', 'carijenisaudit',[
            'query' =>[
                'jenisaudit'=> $id
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }
      public function countlokasi()
      {
          $respon =  $this->_client->request('GET', 'countlokasi');

        $result = json_decode($respon->getBody()->getContents(),true);
        // var_dump($result['data'][0]);die;
        if ($result['status']==true) {
            return $result['data'];
        }else{
            return false;
        }
      }





}

/* End of file ModelName.php */

?>