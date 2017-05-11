<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Reseller extends CI_Controller {
	
	   	var $parent_page = "reseller";
        var $version = "NastyMy RS-ler v1.0 Alpha";

	    function __construct() {
	        parent::__construct();
	        $this->load->library('session');
            date_default_timezone_set('Asia/Kuala_Lumpur');
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
	    	$this->load->view($this->parent_page.'/page/head', array('ver' => $this->version) , FALSE);
	    	$this->load->view($this->parent_page.'/page/head2', $link, FALSE);
	    	$this->load->view($this->parent_page.'/page/navmenu3', $link, FALSE);
	    	$this->load->view($this->parent_page.'/page/theme4', '', FALSE);
	    	$this->load->view($this->parent_page.'/page/title5', $T, FALSE);
	    	$this->load->view($this->parent_page.'/'.$page, $data, FALSE);
	    	$this->load->view($this->parent_page.'/page/sidebar7', '', FALSE);
	    	$this->load->view($this->parent_page.'/page/footer', '', FALSE);
	    }

        public function index()
        {
            $this->_show();
        }

	    public function page($key)
    	{
    		//$arr = $this->input->get();
    		$this->_checkSession();
            $lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    		switch ($key) {                
    			case 'b1':
    				$data['title'] = '<i class="fa fa-cart-plus"></i> Add Order';
    				$this->load->library('my_func');
    				$this->load->database();
    				$this->load->model("m_category" , 'm_cat');
    				$this->load->model('m_type2' , 'mt2');
    				$data['cat'] = $this->m_cat->get();
    				$data['type'] = $this->mt2->getProduct();
    				$this->_show('addorder' , $data , $key);
    				break;
    			default:
    				$this->_show();
    				break;
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
			$lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
            if ($lvl == 1) {
                return true;
            }else{
                return false;
            }			
		}
		public function getAjaxProduct(){
			$this->load->database();
			$this->load->model('m_type2');
			$text = '';
			$this->load->library('my_func');
			$f = $this->input->post('filter');
			$s = $this->input->post('series');
			if ($s != -1) {
				$s = $this->my_func->de($s);
			}
			if ($f == '') {
				$f = null;
			}
			$arr = $this->m_type2->getProduct($f , $s);	
			if ($arr) {
				foreach ($arr as $key){
					$a['arr'] = $key;
					$text = $text . $this->load->view('reseller/getAjax/getAjaxProduct', $a , true);
				}
			} else {
				$text = '
                <div align="center">
                	<br>
                    <h1><i class="fa fa-flask"></i></h1><br>
                    <h3><strong>No Data</strong></h3>
                </div>';
			}
			echo $text;
		}

		public function getAjaxCart()
		{
			$this->load->database();
			$this->load->library('my_func');
			$mg = $this->input->post('mg');
			$id = $this->my_func->de($this->input->post('id') , 1);
			$n = $this->input->post('num');
			$this->load->model('m_type2');
			$arr['arr'] = array_shift($this->m_type2->get($id));
			$arr['mg'] = $mg;
			$arr['n'] =$n;
			echo $this->load->view('reseller/getAjax/getAjaxCart', $arr , true);
		}
		public function getAjaxCartInv()
		{
			$this->load->database();
			$this->load->library('my_func');
			$mg = $this->input->post('mg');
			$id = $this->my_func->de($this->input->post('id') , 1);
			$n = $this->input->post('num');
			$this->load->model('m_type2');
			$this->load->model('m_nico');
		}

		public function getAjaxProductDetail(){
			if($this->input->post('id')){
				$this->load->database();
				$this->load->model('m_type2');
				$this->load->library('my_func');
				$id = $this->my_func->de($this->input->post('id') , 1);
				$data['data'] = array_shift($this->m_type2->get($id));
				if (sizeof($data) != 0) {
					echo $this->load->view("reseller/getAjax/getAjaxProductDetail" , $data , true);
				}else{
					echo "<h2>No Data</h2>";
				}
			}
		}
	}
?>