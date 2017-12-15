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

    public function index2()
    {
        $this->load->helper('barcode_helper');
        //$img = set_barcode('Farid Husaini');
        //$imgB = imagejpeg($img->draw(), 'barcode.jpg', 100);
        //imagedestroy($img);
        ?><!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>tester huhu</title>
            </head>
            <body>
                <!-- <img src="<?= site_url('parcel/'); ?>" alt="error"> -->
                <?php set_barcode('Farid Husaini');
                //set_barcode('Abd Razak'); ?>
                my name is farid husaini
            </body>
        </html>
        <?php
    }

    public function index()
    {
        $this->load->library('zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //create barcode object
        $barcode = Zend_Barcode::factory('code128', 'image', array('text'=>'jauhmerah Husaini'), array());
        imagejpeg($barcode->draw(), './assets/uploads/barcode/barcode.jpg', 100);
        imagedestroy($barcode);

    }

    public function test()
	{
		//I'm just using rand() function for data example
		$temp = rand(100, 999);
		$this->set_barcode('120000-D2-'.$temp);
	}

	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}

}
?>
