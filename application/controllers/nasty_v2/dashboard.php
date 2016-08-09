<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
	   	var $parent_page = "nasty_v2/dashboard";

	    function __construct() {
	        parent::__construct();
	        $this->load->library('session');
	    }
	
	    function index() {
	        
	    }

	    private function _show($value='')
	    {
	    	# code...
	    }
	}
	        
?>