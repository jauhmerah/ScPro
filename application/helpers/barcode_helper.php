<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('set_barcode'))
{
    public function set_barcode($code = 'barcode')
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
        //helper testing
	}
}
?>
