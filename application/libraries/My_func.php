<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class My_func
	{
		
		public function __construct()
		{
	        $this->obj =& get_instance();
		}
	
		public function scpro_encrypt($text){
			$ci = $this->obj;
			$ci->load->library("encrypt");
			$val1 = $ci->encrypt->encode($text);
			$length = strlen($val1);
			if ($length % 2 == 0) {
				$arr = str_split($val1 , ($length/2));
			}else{
				$val1 .= "{_}";
				$length ++;
				$arr = str_split($val1 , ($length/2));
			}
			return $arr[1].$arr[0];
		}

		public function scpro_decrypt($text){
			$ci = $this->obj;
			$ci->load->library("encrypt");			
			$length = strlen($text);
			//$this->load->library("encrypt");
			if (strpos($text, "{_}") === false) {
				$arr = str_split( $text , ($length/2));
			}else{
				$arr = explode('{_}', $text);
			}
			$val1 = $arr[1].$arr[0];
			$ci = $this->obj;
			$val2 = $ci->encrypt->decode($val1);
			return $val2;
		}
	
	}
	
	/* End of file my_func.php */
	/* Location: ./application/libraries/my_func.php */
	
?>