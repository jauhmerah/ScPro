<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parcel extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('my_func' , 'mf');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        $this->load->helper('barcode_helper');
        $img = set_barcode('Farid Husaini');
        $imgB = imagejpeg($img , "barcode.jpg" , 100);
        imagedestroy($img);
        ?>
        <img src="" alt="error">
        <?php
    }

}
?>
