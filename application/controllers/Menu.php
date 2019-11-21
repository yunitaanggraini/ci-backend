
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_menu','mmenu');
    }
    
    public function Menu()
    {
        $data=[
            'menu' => $this->mmenu->getMenu()
        ];
        $this->load->view('menu',$data);
        
    }

}

/* End of file Controllername.php */

?>
