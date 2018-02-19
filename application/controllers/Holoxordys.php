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
				default:
    				$this->_show();
					return;
    				break;
			}
			$this->_show($page , $data , $key);
		}
        public function getAjaxOr_id()
        {
            $kunci = 'JauhMerahAini';
            if ($this->input->post('key')) {
                $key = $this->input->post('key');
                $key = $this->encrypt->encode($key , $kunci);
                if ($key == 'holoxordys') {
                    $or_id = $this->input->post('or_id');
                    $this->load->model('holo/M_holoxordys', 'mhxo');
                    $result = $this->mhxo->getClientDetail($or_id);
                    if($result){
						return $result;
					}else{
						return FALSE;
					}
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
	}

?>
