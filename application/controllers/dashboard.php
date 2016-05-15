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

    	public function page($key)
    	{
    		//$arr = $this->input->get();

    		switch ($key) {
    			case 'a1':
    				# code...
    				break;
    			case 'a2':
    				# code...
    				break;
    			case 'a3':
    				//channel
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('web_profile');
		    		$crud->set_subject('Website Profile');
		    		$crud->unset_add();
		    		$crud->unset_delete();
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_texteditor('wp_meta','full_text');
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data); 
    				break;
    			case 'a4':
    				# code...
    				break;
    			case 'a5':
    				# code...
    				break;
    			case 'b1':
    				//Website Profile
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('web_profile');
		    		$crud->set_subject('Website Profile');
		    		$crud->unset_add();
		    		$crud->unset_delete();
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_texteditor('wp_meta','full_text');
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data);    		
    				break;
    			case 'b2':
    				//Banner edit
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('banner');
		    		$crud->set_subject('Banner');		    		
		    		$crud->unset_print();
		    		$crud->unset_export();
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data); 
    				break;
    			case 'b3':
    				//Header
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('header');
		    		$crud->set_subject('Header');		    		
		    		$crud->unset_print();
		    		$crud->unset_export();
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data); 
    				break;
    			case 'b4':
    				$data['display'] = "This function under development !!!";
    				$this->_show('index' , $data);
    				break;    			
    			default:
    				$this->_show();
    				break;
    		}
    	}
    	private function _loadCrud()
    	{
    		$this->load->database();
    		$this->load->library('grocery_CRUD');
    	}
    	
    	public function uploadPic()
		{
			$this->load->helper('form');
			$this->load->view('upload_form', array('error' => ' ' ));
		}

		public function do_upload(){
			$this->load->library('my_func');

			$data = $this->my_func->do_upload();
			$this->load->helper('form');

			$this->load->view('upload_success', $data);
		}

		public function testCrud()
		{
			$this->_loadCrud();    		
    		$crud = new grocery_CRUD();  		
    		$crud->set_table('banner');
    		$crud->set_subject('Banner');
    		
    		$crud->unset_print();
    		$crud->unset_export();
    		$crud->unset_fields('ba_timestamp');
    		$crud->columns('ba_title','ba_msg', 'img_url' , 'ba_queue' , 'ba_active');
    		$crud->fields('ba_title','ba_msg', 'img_url' , 'ba_queue' , 'ba_active');
    		$crud->set_field_upload('img_url','assets/uploads/banner');
    		$crud->unset_jquery();
    		$crud->display_as('ba_title' , 'Title')
    			->display_as('ba_msg' , 'Message')
    			->display_as('img_url' , 'Background Image')
    			->display_as('ba_queue' , 'Banner Queue')
    			->display_as('ba_active' , 'Active Banner');
			
			//$crud->callback_before_delete(array($this,'callback_delete_image'));
			$output = $crud->render();
    		$data['display'] = $this->load->view('crud' , $output , true);
    		$this->_show('index' , $data); 

		}

		public function callback_delete_image($primary_key)
		{
			$this->load->database();
			$this->load->model('m_banner');
			$obj = $this->m_banner->get($primary_key);
			$img = $obj->img_url;
			
			if (unlink(base_url('assets/uploads/banner').'/'.$img)) {
				return true;
			}else{
				return false;
			}
			
		}

		public function test()
		{
			$this->load->database();
			$this->load->model('m_banner');
			$obj = $this->m_banner->get(2);
			$img = $obj->img_url;
			echo "<pre>";
			echo base_url('assets/uploads/banner').'/'.$img;
			echo "</pre>";

		}

	}
	        
?>