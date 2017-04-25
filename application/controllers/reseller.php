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
            $this->page('a1');
        }

	    public function page($key)
    	{
    		//$arr = $this->input->get();
    		$this->_checkSession();
            $lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    		switch ($key) {                
    			case 'b1':
    				$data['title'] = '<i class="fa fa-cart-plus"></i> Add Order';
    				$this->_show('addorder' , $data , $key);
    				break;

    			case "a1" :// dashboard
                        //start added
                         $this->load->database();
                         $this->load->model('m_news');
                         //$this->load->model('news');
                        // $this->load->model('m_nico');
                        // $arr['neworder'] = $this->m_order->countOrderType(1 , 2);
                        // $arr['inprogress'] = $this->m_order->countOrderType(2 , 2);
                        // $arr['complete'] = $this->m_order->countOrderType(3 , 2);
                        // $arr['unconfirm'] = $this->m_order->countOrderType(4 , 2);
                        // $arr['onhold'] = $this->m_order->countOrderType(7 , 2);
                        // $arr['vernew'] = $this->m_order->orderCount(2);
                        // $arr['verold'] = $this->m_order->orderCount(1) + $this->m_order->orderCount(0);
                        // $arr['totalProfit'] = $this->m_order->totalProfit();
                        // $arr['client'] = $this->m_client->get(null , 'asc');
                        // $arr['mg'] = $this->m_nico->get();
                        //end addeds
                        $arr['arr'] = $this->m_news->get();                        
                        $data['title'] = '<i class="fa fa-pencil"></i>Main Page</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/dashboard' ,$arr, true);
                        $this->_show('dashboard', $data , $key);
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
	}
	        
?>