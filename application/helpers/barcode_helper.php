<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('set_barcode'))
{
    function set_barcode($code = 'barcode' , $name = NULL)
	{
		//load library
        $ci =& get_instance();
		$ci->load->library('zend');
		//load in folder Zend
		$ci->zend->load('Zend/Barcode');
		//generate barcode
        if ($name == NULL) {
            $name = $code;
        }
		$barcode = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array());
        if(imagejpeg($barcode->draw(), './assets/uploads/barcode/'.$name.'.jpg', 100)){
            imagedestroy($barcode);
            return $name;
        }else{
            imagedestroy($barcode);
            return FALSE;
        }
	}
}
?>
