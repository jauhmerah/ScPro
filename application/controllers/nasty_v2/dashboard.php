<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
	   	var $parent_page = "nasty_v2/dashboard";

	    function __construct() {
	        parent::__construct();
	        $this->load->library('session');
	    }
	
	    function index() {
	        $this->_show();
	    }

	    private function _show()
	    {
	    	$this->load->view($this->parent_page.'/head', '', FALSE);
	    	$this->load->view($this->parent_page.'/head2', '', FALSE);
	    	$this->load->view($this->parent_page.'/navmenu3', '', FALSE);
	    	$this->load->view($this->parent_page.'/theme4', '', FALSE);
	    	$this->load->view($this->parent_page.'/title5', '', FALSE);
	    	$this->load->view($this->parent_page.'/blank', '', FALSE);
	    	$this->load->view($this->parent_page.'/sidebar7', '', FALSE);
	    	$this->load->view($this->parent_page.'/footer', '', FALSE);
	    }
	}
	        
?>