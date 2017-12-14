<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('set_barcode'))
{
    public function set_barcode($code = 'barcode')
	{
		//load library
        $ci =& get_instance();
		$ci->load->library('zend');
		//load in folder Zend
		$ci->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());

	}
}
?>
