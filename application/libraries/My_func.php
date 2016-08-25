<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class My_func
	{
		
		public function __construct()
		{
	        $this->obj =& get_instance();
		}

		public function staffName($userId = null , $crypt = false){
			
			if ($userId == null) {
				return false;
			}
			if ($crypt) {
				$userId = $this->scpro_decrypt($userId);
			}
			$ci = $this->obj;
			$ci->load->database();
			$ci->load->model("m_user");
			$data = $ci->m_user->get($userId);
			return $data;
		}
	
		public function scpro_encrypt($text){
			$ci = $this->obj;
			$ci->load->library("encrypt");
			$val1 = $ci->encrypt->encode($text);
			$length = strlen($val1);
			if ($length % 2 == 0) {
				$arr = str_split($val1 , ($length/4));
				$text = $arr[3].$arr[1].$arr[0].$arr[2];
			}else{
				$val1 .= "{_}";
				$length ++;
				$arr = str_split($val1 , ($length/2));
				$text = $arr[1].$arr[0];
			}
			$text = strtr($text,array('+' => '.','=' => '-','/' => '~'));
			//$key2 = "6a214fde6c1f8c84902a5576bbe98834623913cc";
			//$hash = $ci->encrypt->encode($text, $key2);
			return $text ;
		}

		public function scpro_decrypt($text){
			$ci = $this->obj;
			$ci->load->library("encrypt");	
			//$key2 = "6a214fde6c1f8c84902a5576bbe98834623913cc";
			//$text = $ci->encrypt->decode($text, $key2);	
			//return $text;	
			$text = strtr($text,array('.' => '+','-' => '=','~' => '/'));
			$length = strlen($text);
			//$this->load->library("encrypt");
			if (strpos($text, "{_}") === false) {
				$arr = str_split( $text , ($length/4));
				$val1 = $arr[2].$arr[1].$arr[3].$arr[0];
			}else{
				$arr = explode('{_}', $text);
				$val1 = $arr[1].$arr[0];
			}
			
			$ci = $this->obj;
			$val2 = $ci->encrypt->decode($val1);
			return $val2;
		}

		function do_upload($path = './assets/uploads/files/', $config = null , $type = 'gif|jpg|png')
		{	
			$ci = $this->obj;	
			$config['upload_path'] = $path;
			$config['allowed_types'] = $type;
			$config['max_size']	= '2000';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config['remove_spaces'] = true;
			$config['encrypt_name'] = true;
			$ci->load->library('upload', $config);
			$files = (isset($_FILES['tmp_name'])) ? $_FILES : array_shift($_FILES) ;
			//$files = array_shift($_FILES);
			$fileSize = sizeof($files['name']);
			$error = null;
			$success = null;
			for ($i=0; $i < $fileSize; $i++) { 
				$_FILES['uploadedimage']['name'] = $files['name'][$i];
		        $_FILES['uploadedimage']['type'] = $files['type'][$i];
		        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
		        $_FILES['uploadedimage']['error'] = $files['error'][$i];
		        $_FILES['uploadedimage']['size'] = $files['size'][$i];

		        if ( ! $ci->upload->do_upload('uploadedimage'))
				{
					$error[$files['name'][$i]] = $ci->upload->display_errors();
				}
				else
				{
					$success[$files['name'][$i]] =  $ci->upload->data();
				}
			}
			$temp['success'] = $success;
			$temp['error'] = $error;
			return $temp;
			
		}

		function errorMsgcrypt($text = null)
		{
			$ci = $this->obj;
			$ci->load->library("encrypt");
			$val1 = $ci->encrypt->encode($text , "6a214fde6c1f8c84902a5576bbe98834623913cc");
			return $val1;
		}

		public function mgLable($mg = 0 ,$media = false)
		{
			if ($media) {
				$objmedia = "media-object";
			}else{
				$objmedia = "";
			}
			switch ($mg) {
				case 0:
					$text = '<span class="label label-default '.$objmedia.'">'.$mg.' Mg</span>';
					break;
				case 3:
					$text = '<span class="label label-primary '.$objmedia.'">'.$mg.' Mg</span>';
					break;
				case 6:
					$text = '<span class="label label-success '.$objmedia.'">'.$mg.' Mg</span>';
					break;
				case 9:
					$text = '<span class="label label-danger '.$objmedia.'">'.$mg.' Mg</span>';
					break;
				case 12:
					$text = '<span class="label label-warning '.$objmedia.'">'.$mg.' Mg</span>';
					break;
				
				default:
					$text = "error";
					break;					
			}
			return $text;
		}
		public function itemIcon($ty_id = 1)
			{
				switch ($ty_id) {
					case 1:
						$text = base_url().'/assets/nasty/pro1.jpg';
						break;
					case 2:
						$text = base_url().'/assets/nasty/pro2.jpg';
						break;
					case 3:
						$text = base_url().'/assets/nasty/pro3.jpg';
						break;
					case 4:
						$text = base_url().'/assets/nasty/pro4.jpg';
						break;
					case 5:
						$text = base_url().'/assets/nasty/pro5.jpg';
						break;
					case 6:
						$text = base_url().'/assets/nasty/pro6.jpg';
						break;
					case 7:
						$text = base_url().'/assets/nasty/pro7.jpg';
						break;
					case 8:
						$text = base_url().'/assets/nasty/pro8.jpg';
						break;
					
					default:
						$text = "error";
						break;
				}
				return $text;
			}	
	}
	
	/* End of file my_func.php */
	/* Location: ./application/libraries/my_func.php */
	
?>