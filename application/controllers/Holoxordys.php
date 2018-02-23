<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Holoxordys extends CI_Controller {

		var $parent_page = "nasty_v2/dashboard";
	   	var $child_page = "nasty_v2/dashboard/holoxordys";
        var $version = "OrdYs v2.4.1 Alpha";
        var $imgUploc = "/assets/uploads/img/";
        var $flags = 'asset/flags/flags.png';

		function __construct() {
	        parent::__construct();
            $this->load->library('encrypt');
			$this->load->library('session');
			$this->load->library('my_func');
            $this->load->database();
	    }

	    function index() {

	    }

		private function _show($page = 'display' , $data = null , $key = 'a1'){
            $link['link'] = $key;
	    	$link['admin'] = $this->_checkLvl();
	    	// if (!$link['admin']) {
	    	// 	$link['link'] = 'a2';
	    	// }
	    	if (isset($data['title'])) {
	    		$T['title'] = $data['title'];
	    	}else{
	    		$T = null;
	    	}
	    	$this->load->view($this->parent_page.'/page/head', array('ver' => $this->version) , FALSE);
	    	$this->load->view($this->parent_page.'/page/head2', $link, FALSE);
	    	$this->load->view($this->parent_page.'/page/navmenu3', $link, FALSE);
	    	$this->load->view($this->parent_page.'/page/theme4', '', FALSE);
	    	$this->load->view($this->parent_page.'/page/title5', $T, FALSE);
	    	$this->load->view($this->child_page.'/'.$page, $data, FALSE);
	    	$this->load->view($this->parent_page.'/page/sidebar7', '', FALSE);
	    	$this->load->view($this->parent_page.'/page/footer', '', FALSE);
	    }

		public function page($key)
    	{
			$data = NULL;
			$page = NULL;
			$this->_checkSession();
            $lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    		switch ($key) {
				case 'b1':
					$page = 'search';
					$data['title'] = 'Search Hologram Number';

					break;
				case 'b2':
					$page = 'formin';
					$data['title'] = 'Insert Hologram detail';
					break;
				case 'b21':
					$page = 'formin2';
					$data['title'] = 'Insert Hologram Detail 2';
					$this->load->model('m_category');
                    $this->load->model('m_nico');
                    $data['nico'] = $this->m_nico->get();
                    $data['cat'] = $this->m_category->get(null , 'asc');
					if ($this->input->post('key')) {
						$temp = $this->input->post('key');
						$temp = $this->my_func->scpro_decrypt($temp);
						if ($temp == 'addHolo') {
							unset($temp);
							$data['arr'] = $this->input->post();
							unset($data['arr']['key']);
							$this->load->model('holo/M_holoxordys', 'mhxo');
							if ($this->input->post('or_id')) {
								$or_id = $this->my_func->scpro_decrypt($this->input->post('or_id'));
								$data['client'] = $this->mhxo->getClientDetail($or_id);
							}
						}else {
							$this->session->set_flashdata('warning' , 'Opss wrong path!!!');
							$this->redTo();
						}
					}else {
						$this->session->set_flashdata('warning' , 'Opss wrong path!!!');
						$this->redTo();
					}
					break;
				case 'b22':
					$arr = $this->input->post();
					echo "<pre>";
					print_r($arr);
					echo "</pre>";
					return;
					$temp['ho_orcode'] = $arr['ho_orcode'];
					if (isset($arr['or_id'])) {
						$temp['or_id'] = $arr['or_id'];
					}
					$this->load->model('holo/M_hologram', 'mh');
					$ho_id = $this->mh->insert($temp);

					if (isset($arr['or_id'])) {
						$hoex = array(
							'ho_id' => $ho_id,
							'ho_name' => $arr['ho_name'],
							'ho_country' => $arr['ho_country']
						);

					}
					$size = sizeof($arr['box']);
					$temp2 = array();
					for ($i=0; $i < $size; $i++) {
						if (strpos($arr['post'][$i] , 'NS') === FALSE || strpos($arr['pre'][$i] , 'NS') === FALSE) {
							$this->session->set_flashdata('warning' , 'System Detect that some Hologram Number Dont Have NS code. Please insert again.');
							$this->mh->delete($ho_id);
							$this->redTo('holoxordys/page/b11');
							return;
						}
						$pre = $arr['pre'][$i];
						$post = $arr['post'][$i];
						$itemid = $arr['itemId'][$i];
						$nico = $arr['nico'][$i];
						$pre = str_replace('NS' , '' , $pre);
						$post = str_replace('NS' , '' , $post);
						$temp2[] = array(
							'ho_id' => $ho_id,
							'ty2_id' => $itemid,
							'ni_id' => $nico,
							'tih_pre' => $pre,
							'tih_post' => $post
						);
					}
					$this->load->model('holo/M_type_item_holo', 'mih');
					if (!$this->mih->insertBatch($temp2)) {
						$this->session->set_flashdata('error' , 'Insert Data Error');
						$this->mh->delete($ho_id);
						$this->redTo('holoxordys/page/b11');
						return;
					}else{
						$this->session->set_flashdata('success' , 'Adding Hologram Sequence Data Completed');
						$this->redTo('holoxordys/page/b2');
						return;
					}
					return;
					break;
				default:
    				$this->_show();
					return;
    				break;
			}
			$this->_show($page , $data , $key);
		}
        public function getAjaxOr_id()
        {
            if ($this->input->post('key')) {
                $key = $this->input->post('key');
				$key = $this->my_func->scpro_decrypt($key);
                if ($key == 'holoxordys') {
                    $or_id = $this->input->post('or_id');
					$or_id = str_replace('#1' , '' , $or_id);
					$or_id = $or_id - 20000;
                    $this->load->model('holo/M_holoxordys', 'mhxo');
					if ($or_id <= 0) {
						$data['result'] = FALSE;
					}else{
                		$data['result'] = $this->mhxo->getClientDetail($or_id);
					}
					if ($data['result'] == FALSE) {
						$data['ordercode'] = $this->input->post('or_id');
					}
					echo $this->load->view($this->parent_page.'/holoxordys/getAjax/getAjaxHoloForm', $data , TRUE);
                }
            }
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

		function _checkLvl($page = null)
		{
			$this->load->library('my_func');
			$lvl = $this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
            if ($lvl == 1) {
                return true;
            }else{
                return false;
            }
		}

		public function getAjaxItemList()
        {
            $arr = $this->input->post();
            $this->load->database();
            $this->load->model('m_nico');
            $this->load->model('m_type2');
            $this->load->model('m_category');
            $temp['cat'] = $this->m_category->get($arr['cat']);
            $temp['nico'] = $this->m_nico->get($arr['nico']);
            $temp['item'] = $this->m_type2->get($arr['type']);
            $temp['num'] = $arr['num'];
			echo $this->load->view("nasty_v2/dashboard/holoxordys/getAjax/getAjaxItem", $temp , true);
        }

		public function redTo($url = NULL)
		{
			if ($url == NULL) {
				$url = site_url('holoxordys/page/b1');
			}
			redirect($url , 'refresh');
		}
	}

?>
