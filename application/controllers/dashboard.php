<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		var $parent_page = "dashboard";

	    function __construct() {
	        parent::__construct();
	        $this->load->helper('url');
	    }
	
	    function index() {
	    	$code['data'] = $this->load->view($this->parent_page.'/'.'index_exp' , '' , true);
	        $this->_show( 'index' , $code);
	    }

	    function _show($page = 'index' , $data = null){
	    	$this->load->view($this->parent_page.'/'.'header');
	    	$this->load->view($this->parent_page.'/'.'navmenu');
	    	$this->load->view($this->parent_page.'/'.'headTitle');
    		$this->load->view($this->parent_page.'/'.$page , $data);
    		$this->load->view($this->parent_page.'/'.'footer');
    	}

    	private function _returnPage($page = 'index_exp')
    	{
    		$page = $this->parent_page . '/' . $page;
    		return $this->load->view($page , '' , true);
    	}

    	function getAjaxWebsitePage()
    	{
    		$arr = $this->input->get();

    		switch ($arr['menu']) {
    			case 'a1':
    				# code...
    				break;
    			case 'a2':
    				# code...
    				break;
    			case 'a3':
    				# code...
    				break;
    			case 'a4':
    				# code...
    				break;
    			case 'a5':
    				# code...
    				break;
    			case 'a6':
    				# code...
    				break;
    			case 'b1':
    				# code...
    				break;
    			case 'b2':
    				# code...
    				break;
    			case 'b3':
    				# code...
    				break;
    			case 'b4':
    				# code...
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}

    	private function _loadCrud()
    	{
    		
    	}

    	public function websiteProfile()
    	{
    		//$this->_loadCrud();
    		$this->load->database();
    		$this->load->library('grocery_CRUD');
    		$crud = new grocery_CRUD();
    		
    		$crud->set_table('table');
    		$crud->set_subject('subject');
    		
    		//$output['display'] = $crud->render();
			$output = $crud->render();
    		$data['display'] = $this->load->view('crud' , $output , true);
    		$this->_show('index' , $data);
    		
    	}
	}
	        
?>