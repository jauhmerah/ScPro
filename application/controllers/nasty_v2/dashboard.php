<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
	   	var $parent_page = "nasty_v2/dashboard";
	   	var $old_page = "dashboard";

	    function __construct() {
	        parent::__construct();
	        $this->load->library('session');
	    }
	
	    function index() {
	        $this->page('a1');
	    }

	    public function testpage()
	    {
	    	echo "Jadi";
	    	$this->_show('index');
	    }

	   private function _show($page = 'display' , $data = null , $key = 'a1'){	    	
	    	$link['link'] = $key;
	    	$link['admin'] = $this->_checkLvl();
	    	if (!$link['admin']) {
	    		$link['link'] = 'a2';
	    	}
	    	if (isset($data['title'])) {
	    		$T['title'] = $data['title'];
	    	}else{
	    		$T = null;
	    	}
	    	$this->load->view($this->parent_page.'/head', '', FALSE);
	    	$this->load->view($this->parent_page.'/head2', $link, FALSE);
	    	$this->load->view($this->parent_page.'/navmenu3', $link, FALSE);
	    	$this->load->view($this->parent_page.'/theme4', '', FALSE);
	    	$this->load->view($this->parent_page.'/title5', $T, FALSE);
	    	$this->load->view($this->parent_page.'/'.$page, $data, FALSE);
	    	$this->load->view($this->parent_page.'/sidebar7', '', FALSE);
	    	$this->load->view($this->parent_page.'/footer', '', FALSE);
	    }

	    function orderPDF($data = null){

	    	$html = $this->load->view($this->parent_page.'/printPdf/head', '', true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/head2', '', true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/navmenu3', '', true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/theme4', '', true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/title5', '', true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/orderForm', $data, true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/sidebar7', '', true);
	    	$html = $html . $this->load->view($this->parent_page.'/printPdf/footer', '', true);
	    	//$this->pdfPrint($html);
	    	echo $html;
	    }

	     function pdfPrint($html = "<h1>Hellow World</h1>"){
	    	$this->load->library("Pdf");
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
	        // Add a page
	        $pdf->AddPage();
	        $pdf->writeHTML($html, true, false, true, false, '');
	        $pdf->Output();
	    }

	    public function page($key)
    	{
    		//$arr = $this->input->get();
    		$this->_checkSession();
    		switch ($key) {
    			case 'a11':
    				if ($this->input->post()) {
    					$this->load->database();
    					$arr = $this->input->post();
    					echo "<pre>";
    					print_r($arr);
    					echo "</pre>";
    					die();
	    				/*$temp = array(
	    					'cl_name' => $arr['name'],
	    					'cl_tel' => $arr['telnumber'],
	    					'cl_country' => $arr['country']
	    				);
	    				$this->load->model("m_client");
	    				$cl_id = $this->m_client->insert($temp);  */
	    				$cl_id = $arr['name'];
	    				if ($cl_id) {
	    					//unset($temp);
	    					$temp = array(
	    						'cl_id' => $cl_id,
	    						'or_sendDate' => $arr['sendDate'],
	    						'or_bank' => $arr['bank'],
	    						'or_deposit' => $arr['deposit'],
	    						'or_note' => $arr['note']
	    					);
	    					$this->load->model('m_order');
	    					$or_id = $this->m_order->insert($temp);
	    					if ($or_id) {
	    						$this->load->model('m_item');
	    						foreach ($arr['proOrder'] as $item) {
	    							$arrItem = explode('|', $item);
	    							unset($temp);
	    							$temp = array(
	    								'ty_id' => $arrItem[0],
	    								'it_mg' => $arrItem[1],
	    								'it_qty' => $arrItem[2],
	    								'or_id' => $or_id,
	    								'it_promo' => $arrItem[3]
	    							);	    							
	    							$this->m_item->insert($temp);	    							
	    						}
	    						$this->session->set_flashdata('success' , '<b>Well done!</b> You successfully add the order.');
	    						redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
	    					}
	    				}   
    				}   				
    				 			
    			case 'a1':
    				if (!$this->_checkLvl()) {
    					redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
    				}
    				$this->load->library('my_func');
    				$this->load->database();
    				$this->load->model('m_order');
    				$arr = $this->m_order->getList();
    				$temp['arr'] = $arr;
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> Production</a>';
    				$data['display'] = $this->load->view($this->old_page.'/news_menu' , $temp , true);
    				$this->_show('display' , $data , $key);
    				break;
    			case 'a12':
    				if (!$this->_checkLvl()) {
    					redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
    				}
    				$this->load->library('my_func');
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> Add Order</a>';
    				$this->load->library('my_func');
    				$this->load->database();
    				$this->load->model('m_type');
    				$this->load->model('m_nico');
    				$this->load->model('m_client');
    				$temp['client'] = $this->m_client->get();
    				$temp['type'] = $this->m_type->get();
    				$temp['nico'] = $this->m_nico->get();
    				$data['display'] = $this->load->view($this->old_page.'/addOrder' , $temp , true);
 					$this->_show('display' , $data , $key);
    				break;
    			case 'a13':
    				$this->load->library('my_func');
    				$this->load->database();
    				$this->load->model('m_order');
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> Order History</a>';
    				$temp['arr'] = $this->m_order->getList(0,1,1);
    				$data['display'] = $this->load->view($this->old_page.'/history' , $temp , true);
 					$this->_show('display' , $data , $key);
    				break;
    			case 'a21':    				
    				if ($this->input->get('key')) {
    					$this->load->library('my_func');
	    				$this->load->database();
	    				$this->load->model('m_order');
    					$key = $this->input->get('key');    				
    					$or_id = $this->my_func->scpro_decrypt($key);
    					$this->m_order->update(array('pr_id' => 2),$or_id);
    					redirect(site_url('nasty_v2/dashboard/page/a2'), 'refresh');
    				}    				
    			case 'a2':  
    				$this->load->library('my_func');
	    			$this->load->database();
	    			$this->load->model('m_order');   				
    				$temp['arr'] = $this->m_order->getList(1);
    				$temp['arr1'] = $this->m_order->getList(2);
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i>Order List</a>';
    				$data['display'] = $this->load->view($this->old_page.'/productionOrder', $temp , TRUE);
    				$this->_show('display' , $data , $key);
    				break;
    			case 'a22':    				
    				if ($this->input->get('done') && $this->input->get('key')) {
    					$this->load->library('my_func');
	    				$this->load->database();
	    				$this->load->model('m_item');
	    				$this->load->model('m_order');
	    				$it_id = $this->my_func->scpro_decrypt($this->input->get('done'));
	    				$or_id = $this->my_func->scpro_decrypt($this->input->get('key'));
	    				$this->m_item->update(array('pr_id' => 3), $it_id);
	    				$this->m_order->checkDone($or_id);
	    				redirect(site_url('nasty_v2/dashboard/page/a2'), 'refresh');
    				}
    				break;
    			case 'b1':
    				//Item
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Item List';
    				//$this->path_callback = 'channel';
    				$this->_loadCrud();    		
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('type');
		    		$crud->set_subject('Item Type');
		    		$crud->unset_print();
		    		$crud->unset_export();
		    		$crud->required_fields('ty_desc','ty_icon','ty_img');
		    		$crud->display_as('ty_desc' , 'Item Name')
		    			->display_as('ty_icon' , 'Item Icon')
		    			->display_as('ty_img' , 'Item Image')
		    			->display_as('ty_detail' , 'Item Detail');
		    		$crud->set_field_upload('ty_icon','assets/uploads/item')
		    			->set_field_upload('ty_img','assets/uploads/item');
		    		$crud->callback_before_delete(array($this,'callback_delete_image_item'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('display' , $data , $key); 
    				break;
    			case 'b2':
    				//Nico
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Nicotine List';
    				//$this->path_callback = 'channel';
    				$this->_loadCrud();    		 
		    		$crud = new grocery_CRUD();    		
		    		$crud->set_table('nicotine');
		    		$crud->set_subject('Nicotine');
		    		$crud->unset_print();
		    		$crud->unset_export();		    		
		    		$crud->required_fields('ni_mg','ni_color');
		    		$crud->display_as('ni_mg' , 'Amount (Mg)')
		    			->display_as('ni_color' , 'Label Color (hex)');
		    		$crud->callback_add_field('ni_color', function () {
		    		        return '<input type="color" name="ni_color" id="inputNi_color" value="" title="Pick Color" width = 10px>';
		    		    });
		    		$crud->callback_edit_field('ni_color',array($this,'edit_field_callback_nico'));
		    		$crud->callback_column('ni_color',array($this,'callback_col_nico'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);		    		
		    		$this->_show('display' , $data , $key); 
    				break;
    			case 'a4':
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Client Detail';
    				$this->_loadCrud();
		    		$crud = new grocery_CRUD();
		    		//$crud->set_theme('twitter-bootstrap-new');    		
		    		$crud->set_table('client');
		    		$crud->set_subject('Client Detail');
		    		$crud->unset_export();
		    		$crud->unset_print();
		    		$crud->unset_jquery();
		    		$crud->required_fields('cl_name','cl_tel','cl_country','cl_address' , 'cl_email');
		    		$crud->display_as('cl_name','Client Name')
		    		->display_as('cl_tel','Contact Number')
		    		->display_as('cl_country','Country')
		    		->display_as('cl_address','Shipping Address')
		    		->display_as('cl_email','Email')
		    		->display_as('cl_company','Company')
		    		->display_as('cl_note','Note');
		    		$crud->unset_texteditor('cl_address','full_text');
		    		$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('display' , $data , $key); 
    				break;
    			case 'a5':
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Currency';
    				$this->_loadCrud();
    				$crud = new grocery_CRUD();
    				$crud->set_table('currency');
    				$crud->set_subject('Currency');
    				$crud->unset_jquery();
    				$crud->unset_print();
    				$crud->unset_export();
    				$crud->display_as('cu_desc','Currency');
    				$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('display' , $data , $key); 
    				break;
    			case 'z1':
    				$data['title'] = '<i class="fa fa-file-text"></i> Order Form';
    				$this->load->database();
    				$this->load->model('m_client');
    				$arr['client'] = $this->m_client->get();
    				$data['display'] = $this->load->view($this->parent_page.'/orderForm' , $arr , true);
		    		$this->_show('display' , $data , $key); 
    				break;
    			case 'c13':
    				//view
    				if ($this->input->get('view')) {
    					$data['title'] = '<i class="fa fa-file-text"></i> Staff Detail';
    					$staffId = $this->my_func->scpro_decrypt($this->input->get('view'));
    					$this->load->database();
    					$this->load->model('m_user');    					
    					$arr['arr'] = $this->m_user->getAll($staffId);
    					$data['display'] = $this->load->view($this->parent_page.'/staffView' , $arr , true);
		    			$this->_show('display' , $data , $key);
    					break;
    				}
    			case 'c12':
    				//delete
    				if ($this->input->get('delete')) {
    					$staffId = $this->my_func->scpro_decrypt($this->input->get('delete'));
    					$this->load->model('m_user');
    					$this->m_user->delete($staffId);
    					//redirect(site_url('nasty_v2/dashboard/page/c1'),'refresh');
    					break;
    				}    			
    			case 'c11':
    				//edit
    				$data['title'] = '<i class="fa fa-file-text"></i> User Edit';
    				if ($this->input->get('edit')) {
    					$staffId = $this->my_func->scpro_decrypt($this->input->get('edit'));
    					//echo $staffId;
    					$this->load->database();
    					$this->load->model('m_user');
    					$arr['id'] = $this->input->get('edit');
    					$arr['lvl'] = $this->m_user->getLvl();
    					$arr['arr'] = $this->m_user->getAll($staffId);
    					$data['display'] = $this->load->view($this->parent_page.'/editStaff' , $arr , true);
    					$this->_show('display' , $data , $key); 
    					break;
    				}    				
    			case 'c1':
    				$data['title'] = '<i class="fa fa-file-text"></i> User Setting';
    				$this->load->database();
    				$this->load->model("m_user");
    				$this->load->library('my_func');
    				if (!$this->_checkLvl()) {
    					$where = array(
    						'us_lvl !=' => 1
    						);
    					$arr['arr'] = $this->m_user->getAll($where);
    				}else{
    					$arr['arr'] = $this->m_user->getAll();
    				}
    				
    				$data['display'] = $this->load->view($this->parent_page.'/userlist' , $arr , true);
		    		$this->_show('display' , $data , $key); 
    				break;
				case 'c14':
					$this->load->database();
    				$this->load->model('m_user');
    				$arr['lvl'] = $this->m_user->getLvl();
    				$data['display'] = $this->load->view($this->parent_page.'/addStaff' ,$arr , true);
		    		$this->_show('display' , $data , $key); 
    				break;    			
    			default:
    				$this->_show();
    				break;
    		}
    	}
    	public function edit_field_callback_nico($value, $primary_key)
    	{
    		return '<input type="color" name="ni_color" id="inputNi_color" value="'.$value.'" title="Pick Color" width = 10px>';
    	}
    	public function callback_col_nico($value, $primary_key)
    	{
    		return '<input type="color" name="ni_color" id="inputNi_color" value="'.$value.'" title="Pick Color" width = 10px disabled>';
    	}
    	private function _loadCrud()
    	{
    		$this->load->database();
    		$this->load->library('grocery_CRUD');
    	}
    	public function addStaff()
    	{
    		if ($this->input->post()) {
    			$arr = $this->input->post();    			
    			$this->load->database();
    			$this->load->model('m_user');
    			$this->load->library('my_func');
    			foreach ($arr as $key => $value) {
    				if ($value != null) {
    					if ($key == 'pass') {
    						$value = $this->my_func->scpro_encrypt($value);
    					}
    					$arr2['us_'.$key] = $value;   					
    				}
    			}
    			$result = $this->m_user->insert($arr2);
    			redirect(site_url('nasty_v2/dashboard/page/c1'),'refresh');
    		}else{
    			redirect(site_url('nasty_v2/dashboard/page/c1'),'refresh');
    		}
    	}
    	
    	public function updateStaff()
    	{
    		if ($this->input->post()) {
    			$arr = $this->input->post();    			
    			$this->load->database();
    			$this->load->model('m_user');
    			$this->load->library('my_func');
    			foreach ($arr as $key => $value) {
    				if ($value != null) {
    					if ($key == 'pass') {
    						$value = $this->my_func->scpro_encrypt($value);
    					}
    					if ($key == 'id') {
    						$id = $this->my_func->scpro_decrypt($value);
    					}else{
    						$arr2['us_'.$key] = $value;
    					}    					
    				}
    			}
    			$result = $this->m_user->update($arr2 , $id);
    			redirect(site_url('nasty_v2/dashboard/page/c1'),'refresh');
    		}else{
    			redirect(site_url('nasty_v2/dashboard/page/c1'),'refresh');
    		}
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

		public function callback_delete_image_banner($primary_key)
		{
			$this->load->database();
			$this->load->model('m_banner');
			$obj = $this->m_banner->get($primary_key);
			$img = $obj->img_url;			
			if (unlink('./assets/uploads/banner/'.$img)) {
				return true;
			}else{
				return false;
			}			
		}
		//-------------------VVVVVVVVVVVVVV sini kene oter balik VVVVVVVV-------------
		public function callback_delete_image_item($primary_key)
		{
			$this->load->database();
			$this->load->model('m_type');
			$obj = $this->m_type->get($primary_key);
			$img = $obj->ty_icon;
			$img2 = $obj->ty_img;			
			if (unlink('./assets/uploads/item/'.$img)) {
				if (unlink('./assets/uploads/item/'.$img2)) {
					return true;
				}
			}else{
				return false;
			}			
		}

		public function callback_delete_image_news($primary_key)
		{
			$this->load->database();
			$this->load->model('m_picture');
			$obj = $this->m_picture->get($primary_key);
			$imgnum = $this->m_picture->getbyne_id($obj->ne_id);
			//check number of image;
			$img = $obj->img_url;			
			if (unlink('./assets/uploads/img/'.$img)) {
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
				$success = array();
				//$error = array();
				if (sizeof($result['success']) != 0) {
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
				}
				
				
				//$code = "<pre>";
				//$code .= print_r($success , true) . print_r($result['error'] , true) . "</pre>";
				//return $code;
				$i = sizeof($success);
				$e = sizeof($result['error']);
				if ($e == 0) {
					$this->session->set_flashdata('success' , '<b>Well done!</b> You successfully send the news.');
					//redirect(site_url('dashboard/page/a11?success='.$this->my_func->scpro_encrypt('1')),'refresh');
				}elseif ($i == 0) {
					$this->m_news->delete($ne_id);
					$code = "<ul>";
					foreach ($result['error'] as $filename => $errormsg) {
						$code .= "<li> ".$filename." : ".$errormsg."
						</li>";
					}
					$code = "<b>Oh snap!</b> Change a few things up and try submitting again.</br>" . $code;
					$this->session->set_flashdata('error' , $code);

					//redirect(site_url('dashboard/page/a11?fail='.$this->my_func->scpro_encrypt('3')),'refresh');
				}else{
					$code = "<ul>";
					foreach ($result['error'] as $filename => $errormsg) {
						$code .= "<li> ".$filename." : ".$errormsg."
						</li>";
					}
					$code = "<b>Warning!</b> You successfully send the news but <b>some your image not looking too good<b>.</br>".$code;
					$this->session->set_flashdata('warning' , $code);
					//redirect(site_url('dashboard/page/a11?success='.$this->my_func->scpro_encrypt('2')),'refresh');
				}
						
			}else{
				$this->session->set_flashdata('error' , "<b>Oh snap!</b> Unable to send the news, change a few things up and try submitting again.");
			}
			redirect('nasty_v2/dashboard/page/a1','refresh');			
		}
		public function getAjaxNews()
		{
			$this->load->database();
			$this->_loadCrud();
			$crud = new grocery_CRUD();
			
			$crud->set_table('news');
			$crud->set_subject('News list');
			$crud->unset_add();
			$crud->unset_print();
			$crud->unset_export();
			$crud->unset_columns('pi_id');
			$crud->display_as('ne_title','News Title')
				->display_as('ne_msg' , 'Message')
				->display_as('ne_timestamp' , 'Time')
				->display_as('ne_active' , 'Active');
			$crud->add_action('Photo', '', '', 'fa fa-file-image-o',array($this,'callbackGalary'));
			$crud->callback_before_delete(array($this,'callback_before_delete_allimg_news'));
			$output = $crud->render();

			return $output;
		}

		function callbackGalary($pk , $row)
		{	
			$this->load->library('my_func');
			return site_url('nasty_v2/dashboard/page/a11').'?pk='.$this->my_func->scpro_encrypt($pk);
		}

		function callback_before_delete_allimg_news($pk)
		{
			$this->load->database();
			$this->load->model('m_picture');
			//$arr = array('ne_id' => $pk );
			$obj = $this->m_picture->getbyne_id($pk);
			if ($obj === false) {
				$this->load->library('my_func');
				$msg = "<b>Error!</b> No image was found in database, please contact developer for this situation!<br>
						<ul><li>Msg Code : ".$this->my_func->erroMsgcrypt('image id'.$pk)."</li></ul>
				";
				$this->session->set_flashdata('error', $msg);
				return false;
			}
			foreach ($obj as $row) {
				$img = $row->img_url;
				if (unlink('./assets/uploads/img/'.$img)) {
					$this->m_picture->delete($row->pi_id);
				}else{
					$msg = "<b>Warning!</b> System unable to detect the picture location<br>
						<ul>
							<li>".$row->pi_title."</li></ul>";
					$this->session->set_flashdata('warning', 'value');
					return false;
				}
			}
			//$img = $obj->img_url;			
			return true;	
		}

		public function getAjaxOrderBox()
		{ 
			/*
			flavname : flavname , 
			qty : qty , 
			promo : promo ,
			flavcode : flavcode , 
			niccode : niccode,
			num :num
			*/
			$this->load->database();
			$this->load->model('m_type');
			$this->load->model('m_nico');
			$arr = $this->input->post();
			$arr['icon'] = base_url()."assets/uploads/item/".$arr['imgIcon'];			
			echo $this->load->view($this->old_page. "/ajax/getAjaxOrderBox2", $arr , true);
		}
		public function testAjax()
		{
			echo $this->load->view($this->old_page."/ajax/testajax","", TRUE);
		}

		public function deleteOrder($or_id = null)
		{	
			if ($this->input->get('key')) {
				$key = true;				
			}		
			if ($or_id == null && !isset($key)) {
				return false;
			}
			$this->load->library('my_func');
			if ($or_id == null) {
				$or_id = $this->input->get('key');
				$or_id = $this->my_func->scpro_decrypt($or_id);
			}
			
			$this->load->database();
			$this->load->model('m_order');
			if ($this->m_order->deleteList($or_id)) {
				$this->session->set_flashdata('success', 'Success delete the order');
			}else{
				$this->session->set_flashdata('danger', 'Unable to delete the order, please contact the webmaster');
			}
			redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
		}

		public function logout()
		{
			$this->session->unset_userdata('us_id');
			$this->session->unset_userdata('us_lvl');
			$this->session->sess_destroy();
			redirect(site_url('login'),'refresh');
		}

		function _checkSession()
		{
			$this->load->database();
			$this->load->model('m_login');
			$this->load->library('my_func');
			if ($this->session->userdata('us_id')) {
				$id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
				if ($this->m_login->get($id)) {
					return true;
				}else{
					redirect(site_url('login'),'refresh');
				}
			}else{
				redirect(site_url('login'),'refresh');
			}			
		}
		public function getAjaxClient()
		{
			if ($this->input->post('key')) {
				$arr = $this->input->post('key');
				$this->load->database();
				$this->load->model('m_client');
				$this->load->library('my_func');
				if($arr != -1){
					$data['client'] = $this->m_client->get($arr);
					echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxClient', $data, TRUE);
				}else{
					echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxClient', '', TRUE);
				}
				
			}			
		}
		function _checkLvl()
		{			
			$this->load->library('my_func');
			$lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
			if ($lvl == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
	        
?>