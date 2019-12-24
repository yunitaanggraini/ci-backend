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

    public function getUnitById($id)
    {
        $respon =  $this->_client->request('GET', 'unit',[
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

    // public function countunit()
    //   {
    //       $respon =  $this->_client->request('GET', 'countunit');

    //     $result = json_decode($respon->getBody()->getContents(),true);
    //     // var_dump($result['data'][0]);die;
    //     if ($result['status']==true) {
    //         return $result['data'];
    //     }else{
    //         return false;
    //     }
    //   }

    //   public function previewUnit($a,$b,$c,$d,$e)
    // {
    //     $respon =  $this->_client->request('GET', 'previewUnit',[
    //         'query'=>[
    //             'id_cabang' => $a,
    //             'tanggal_awal'=>$b,
    //             'tanggal_akhir'=>$c,
    //             'status'=> $d,
    //             'offset' => $e
    //         ]
    //     ]);
    //     $result = json_decode($respon->getBody()->getContents(),true);
    //     if ($result['status']==true) {
    //         return $result['data'];              
    //     }else{
    //         return false;
    //     }
    // }

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
    public function previewUnit($a,$b,$c,$d,$e)
    {
        $respon =  $this->_client->request('GET', 'previewunit',[
            'query'=>[
                'id_cabang' => $a,
                'tanggal_awal'=>$b,
                'tanggal_akhir'=>$c,
                'status'=> $d,
                'offset' => $e
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);
            $base = base_url();

        $output='';
        $aksi='';
        if ($result['status']==true) {
            foreach ($result['data'] as $res ) {
                if ($res['status_unit']=='Sesuai') {
                    $aksi='<i></i>
                            ';
                }else if ($res['status_unit']=='Belum Sesuai'){
                    $aksi='
                    <a href="'.$base."transaksi_auditor/edit_audit?id=".$res['no_mesin'].'" class="text-warning"><i class="fa fa-pencil"></i></a>
                    ';
                    
                }else if ($res['status_unit']=='Belum ditemukan'){
                    $aksi='
                    <a href="'.$base."transaksi_auditor/edit_audit?id=".$res['no_mesin'].'" class="text-warning"><i class="fa fa-pencil"></i></a>
                    ';
                }
                $e++;
                $output.='
                    <tr>
                    <td>'.$e.'</td>
                    <td>'.$aksi.'</td>
                    <td>'.$res['id_unit'].'</td>
                    <td>'.$res['no_mesin'].'</td>
                    <td>'.$res['no_rangka'].'</td>
                    <td>'.$res['nama_cabang'].'</td>
                    <td>'.$res['nama_lokasi'].'</td>
                    <td>'.$res['umur_unit'].'</td>
                    <td>'.$res['status_unit'].'</td>
                    <td class="text-center">'.$res['aki'].'</td>
                    <td class="text-center">'.$res['spion'].'</td>
                    <td class="text-center">'.$res['helm'].'</td>
                    <td class="text-center">'.$res['tools'].'</td>
                    <td class="text-center">'.$res['buku_service'].'</td>
                    <td>'.$res['tahun'].'</td>
                    <td>'.$res['type'].'</td>
                    <td>'.$res['kode_item'].'</td>
                    <td>'.$res['foto'].'</td>
                    <td>'.$res['keterangan'].'</td>
                    <td>'.$res['is_ready'].'</td>
                    <td>'.$res['tanggal_audit'].'</td>
                ';
            }             
        }else{
            $output.= '
                <tr><td colspan="8" class="text-center">Data not found.</td></tr>
            ';
        }
        return $output;
    }
    public function countunit($a,$b,$c,$d)
    {
        $respon =  $this->_client->request('GET', 'countunit',[
            'query'=>[
                'id_cabang' => $a,
                'tgl_awal'=>$b,
                'tgl_akhir'=>$c,
                'status'=> $d
            ]
        ]);

        $result = json_decode($respon->getBody()->getContents(),true);

        if ($result['status']==true) {
            return $result['data'];              
        }else{
            return 0;
        }
    }

    public function getUnitField($no_mesin)
    {
      $respon =  $this->_client->request('GET', 'fieldUnit',[
          'query'=>[
              'no_mesin' => $no_mesin
          ]
      ]);


      $result = json_decode($respon->getBody()->getContents(),true);

      if ($result['status']==true) {

        return $result['data'];
    }else {
        return false;
    }
    }

    public function cariscanunit($id)
      {
          $respon =  $this->_client->request('GET', 'cariscanunit',[
            'query' =>[
                'cari'=> $id
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