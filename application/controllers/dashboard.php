<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		var $parent_page = "dashboard";
		private $path_callback;

	    function __construct() {
	        parent::__construct();
	        $this->load->helper('url');
	    }
	
	    function index() {
	    	$code['data'] = $this->load->view($this->parent_page.'/'.'bootstrap-elements' , '' , true);
	    	$code['data'] .= $this->load->view($this->parent_page.'/'.'index_exp' , '' , true);
	        $this->_show( 'index' , $code);
	    }

	    function _show($page = 'index' , $data = null , $key = 'a'){
	    	$link['link'] = $key;
	    	if (isset($data['title'])) {
	    		$T['title'] = $data['title'];
	    	}else{
	    		$T = null;
	    	}
	    	$this->load->view($this->parent_page.'/'.'header');	    	
	    	$this->load->view($this->parent_page.'/'.'navmenu' , $link);	    	
	    	$this->load->view($this->parent_page.'/'.'headTitle' , $T);
    		$this->load->view($this->parent_page.'/'.$page , $data);
    		$this->load->view($this->parent_page.'/'.'footer');
    	}

    	public function page($key)
    	{
    		//$arr = $this->input->get();

    		switch ($key) {
    			case 'a11':
    				if ($this->input->get()) {
    					$this->load->library('my_func');
    					if ($this->input->get('success')) {
    						$info = $this->my_func->scpro_decrypt($this->input->get('success'));    						
    					}elseif($this->input->get('fail')){
    						$info = $this->my_func->scpro_decrypt($this->input->get('fail'));
    					}
    					switch ($info) {
    						case '1':
    							$message = '
    								
    							';
    							break;
    						
    						default:
    							# code...
    							break;
    					}
    				}
    			case 'a1':
    				// News
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> News</a>';
    				$data['display'] = $this->load->view($this->parent_page.'/news_menu' , ' ' , true);
    				$this->_show('index' , $data , $key);
    				break;
    			case 'a2':
    				# code...
    				break;
    			case 'a3':
    				//channel
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Channel';
    				$this->path_callback = 'channel';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('channel');
		    		$crud->set_subject('Linked Page');
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->required_fields('img_url','ch_link');
		    		$crud->display_as('ch_title' , 'Link Title')
		    			->display_as('img_url' , 'Page Logo')
		    			->display_as('ch_link' , 'Page Url')
		    			->display_as('ch_queue' , 'Queue Number');
		    		$crud->set_field_upload('img_url','assets/uploads/channel');
		    		$crud->callback_before_delete(array($this,'callback_delete_image'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key); 
    				break;
    			case 'a4':
    				# code...
    				break;
    			case 'a5':
    				# code...
    				break;
    			case 'b1':
    				//Website Profile
    				$data['title'] = "<i class=\"fa fa-fw fa-desktop\"></i> Website Profile";
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('web_profile');
		    		$crud->set_subject('Website Profile');
		    		$crud->unset_add();
		    		$crud->unset_delete();
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_texteditor('wp_meta','full_text');
		    		$crud->set_field_upload('wp_logo','assets/cover');
		    		$crud->set_field_upload('wp_favicon','assets/cover');
		    		
					$output = $crud->render();
					$data['search_filter'] = false;
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key);    		
    				break;
    			case 'b2':
    				//Banner edit
    				$data['title'] = '<i class="fa fa-fw fa-bookmark-o"></i> Banner';
    				$this->path_callback = 'banner';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();  		
		    		$crud->set_table('banner');
		    		$crud->set_subject('Banner');
		    		
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_fields('ba_timestamp');
		    		$crud->columns('ba_title','ba_msg', 'img_url' , 'ba_queue' , 'ba_active');
		    		//$crud->fields('ba_title','ba_msg', 'img_url' , 'ba_queue' , 'ba_active');
		    		$crud->set_field_upload('img_url','assets/uploads/banner');
		    		$crud->unset_jquery();
		    		$crud->display_as('ba_title' , 'Title')
		    			->display_as('ba_msg' , 'Message')
		    			->display_as('img_url' , 'Background Image')
		    			->display_as('ba_queue' , 'Banner Queue')
		    			->display_as('ba_active' , 'Active Banner');
					
					$crud->callback_before_delete(array($this,'callback_delete_image'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key);
    				break;
    			case 'b3':
    				//Header
    				$data['title'] = '<i class="fa fa-fw fa-list-alt"></i> Header';
    				$this->path_callback = 'header';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('header');
		    		$crud->set_subject('Header');		    		
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->unset_add();
		    		$crud->unset_delete();
		    		$crud->unset_fields('he_timestamp');
					$crud->columns('he_title','he_msg', 'img_url' , 'he_queue' , 'he_active');
					$crud->set_field_upload('img_url','assets/uploads/header');
		    		$crud->unset_jquery();
		    		$crud->display_as('he_title' , 'Title')
		    			->display_as('he_msg' , 'Message')
		    			->display_as('img_url' , 'Icon Image')
		    			->display_as('he_queue' , 'Header Queue')
		    			->display_as('he_active' , 'Active Header');

		    		$data['search_filter'] = false;
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('index' , $data , $key); 
    				break;
    			case 'b4':
    				$data['title'] = '<i class="fa fa-fw fa-tags"></i> Tag Announcement';
    				$data['display'] = "This function under development !!!";
    				$this->_show('index' , $data , $key);
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

		public function callback_delete_image($primary_key)
		{
			$this->load->database();
			$this->load->model('m_'.$this->path_callback);
			$obj = $this->m_banner->get($primary_key);
			$img = $obj->img_url;
			
			if (unlink('./assets/uploads/'.$this->path_callback.'/'.$img)) {
				return true;
			}else{
				return false;
			}
			
		}

		public function test()
		{
			$this->load->database();
			$this->load->model('m_banner');
			$obj = $this->m_banner->get(1);
			$img = $obj->img_url;
			echo "<pre>";
			echo base_url('assets/uploads/banner').'/'.$img;
			print_r($obj);
			echo "</pre>";

		}

		public function add_news()
		{
			$arr = $this->input->post();		
			$input = array(
					'ne_title' => $arr['title'],
					'ne_msg' => $arr['msg'] 
				);
			$this->load->database();
			$this->load->model('m_news');
			$this->load->model('m_picture');
			$ne_id = $this->m_news->insert($input);
			if ($ne_id !== false) {
				$this->load->library('my_func');
				$result = $this->my_func->do_upload('./assets/uploads/img/');
				$pi_id = null;
				//$success = array();
				//$error = array();
				foreach ($result['success'] as $filename => $detail) {					
					$id = $this->m_picture->insert(array(
							'pi_title' => $filename,
							'img_url' => $detail['file_name'],
							'ne_id' => $ne_id
						));
					if ($pi_id == null) {
						$pi_id = $id;
					}
					$success[] = $filename;
				}
				$this->m_news->update(array('pi_id' => $pi_id),$ne_id);
				//$code = "<pre>";
				//$code .= print_r($success , true) . print_r($result['error'] , true) . "</pre>";
				//return $code;
				$i = sizeof($success);
				$e = sizeof($result['error']);
				if ($e == 0) {
					redirect(site_url('dashboard/page/a11?success='.$this->my_func->scpro_encrypt('1')),'refresh');
				}elseif ($i == 0) {
					redirect(site_url('dashboard/page/a11?fail='.$this->my_func->scpro_encrypt('3')),'refresh');
				}else{
					redirect(site_url('dashboard/page/a11?success='.$this->my_func->scpro_encrypt('2')),'refresh');
				}			
				
			}			
		}

	}
	        
?>