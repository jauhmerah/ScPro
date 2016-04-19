<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		var $parent_page = "dashboard";

	    function __construct() {
	        parent::__construct();
	        $this->load->helper('url');
	    }
	
	    function index() {
	        $this->_show();
	    }

	    function _show($page = 'index' , $data = null){
	    	$this->load->view($this->parent_page.'/'.'header');
	    	$this->load->view($this->parent_page.'/'.'navmenu');
	    	$this->load->view($this->parent_page.'/'.'headTitle');
    		$this->load->view($this->parent_page.'/'.$page , $data);
    		$this->load->view($this->parent_page.'/'.'footer');
    	}
	}
	        
?>