<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('set_barcode'))
{
    function set_barcode($code = 'barcode')
	{
		//load library
        $ci =& get_instance();
		$ci->load->library('zend');
		//load in folder Zend
		$ci->zend->load('Zend/Barcode');
		//generate barcode
		return Zend_Barcode::factory('code128', 'image', array('text'=>$code), array());

	}
}
?>
