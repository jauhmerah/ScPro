<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Qrgen
{	
	public function __construct()
	{
		$this->obj =& get_instance();
	}

	public function show($text = "Programmer JauhMerah Who is Aini")
	{
		$ci = $this->obj;
		$ci->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = $text;
		$ci->ciqrcode->generate($params);
	}

	public function gen($text = "Programmer JauhMerah Who is Aini" , $title = "Jauhmerah" , $location = "/assets/uploads/qrgen" , $config = null)
	{
		$ci = $this->obj;
		$ci->load->library('ciqrcode');
	
		$params['data'] = $text;		
		$params['level'] = 'H';		
		if (isset($config['level']) {
			$params['level'] = $config['level'];
		}
		if (isset($config['size']) {
			$params['size'] = $config['size'];
		}
		$params['savename'] = FCPATH.$location."/".$title.".png";
		$ci->ciqrcode->generate($params);
		
		return '<img src="'.base_url().$location."/".$title.'.png" />';
	}
}
?>