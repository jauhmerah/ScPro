<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Encrypt extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();
	    }
	
	    function test($mode,$code) {
	        $this->load->library('my_func');
	        switch ($mode) {
	        	case '1': 
	        		echo $this->my_func->scpro_encrypt($code);
	        		break;
	        	case '2': 
	        		echo $this->my_func->scpro_decrypt($code);
	        		break;
	        	
	        	default:
	        		echo "error";
	        		break;
	        }
	    }
	}
	        
?>