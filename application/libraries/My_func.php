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

		public function en($text , $mode = 0)
		{
			if ($mode === 0) {
				return bin2hex($text);
			}
			$ci = $this->obj;
			$ci->load->library("encrypt");
			$defaultKey = "jauhmerahAini";
			return $ci->encrypt->encode($text , $defaultKey);
		}
		public function de($text , $mode = 0)
		{
			if ($mode === 0) {
				return pack("H*" , $text);
			}
			$ci = $this->obj;
			$ci->load->library("encrypt");
			$defaultKey = "jauhmerahAini";
			return $ci->encrypt->decode($text , $defaultKey);

		}

		function do_upload($path = './assets/uploads/files/', $config = null , $type = 'gif|jpg|png|jpeg')
		{
			$ci = $this->obj;
			$config['upload_path'] = $path;
			$config['allowed_types'] = $type;
			$config['max_size']	= '10000';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config['remove_spaces'] = true;
			$config['encrypt_name'] = true;
			$ci->load->library('upload', $config);
			$error = null;
			$success = null;
			foreach ($_FILES as $fileImg) {
				$_FILES['uploadedimage']['name'] = $fileImg['name'];
		        $_FILES['uploadedimage']['type'] = $fileImg['type'];
		        $_FILES['uploadedimage']['tmp_name'] = $fileImg['tmp_name'];
		        $_FILES['uploadedimage']['error'] = $fileImg['error'];
		        $_FILES['uploadedimage']['size'] = $fileImg['size'];
		        if (!$ci->upload->do_upload('uploadedimage'))
				{
					$error[$fileImg['name']] = $ci->upload->display_errors();
				}
				else
				{
					$success[$fileImg['name']] =  $ci->upload->data();
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
	}

	/* End of file my_func.php */
	/* Location: ./application/libraries/my_func.php */

?>
