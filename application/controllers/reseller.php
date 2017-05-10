<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Reseller extends CI_Controller {
	
	   	var $parent_page = "reseller";
        var $version = "NastyMy RS-ler v1.0 Alpha";

	    function __construct() {
	        parent::__construct();
            $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');
            $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
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
                   case "t1" :// tracking
                        $data['title'] = '<i class="fa fa-cart-plus"></i> Tracking';
                    $this->_show('tracking' , $data , $key);
                    break;
                    case "r1" :// ranking
                        $data['title'] = '<i class="fa fa-cart-plus"></i> Ranking';
                    $this->_show('ranklist' , $data , $key);
                    break;
                     case "s1" :// uesr detail
                        $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        $this->load->database();
                        $this->load->model('m_user');                       
                        $arr['arr'] = $this->m_user->getAll($staffId);
                        
                        $data['title'] = '<i class="fa fa-user"></i> User';
                        $data['display'] = $this->load->view($this->parent_page.'/staffView' , $arr , true);
                        $this->_show('display' , $data , $key);
                        //$this->_show('staffView' , $data , $key);
                    break;

                    case "s12" :// uesr detail
                        $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        $this->load->database();
                        $this->load->model('m_address');                       
                        $arr['arr'] = $this->m_address->getAll();
                       
                        $data['title'] = '<i class="fa fa-home"></i> Address';
                        $data['display'] = $this->load->view($this->parent_page.'/address' , $arr , true);
                        $this->_show('display' , $data , $key);
                        //$this->_show('staffView' , $data , $key);
                    break;

                    

                    case 'c11':
                    //edit
                    $data['title'] = '<i class="fa fa-user"></i> User Edit';
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

                    case 'c12':
                    //edit
                    $data['title'] = '<i class="fa fa-home"></i> Address Edit';
                    if ($this->input->get('edit')) {
                        $staffId = $this->my_func->scpro_decrypt($this->input->get('edit'));
                        //echo $staffId;
                        $this->load->database();
                        $this->load->model('m_user');
                        $arr['id'] = $this->input->get('edit');
                        $arr['lvl'] = $this->m_user->getLvl();
                        $arr['arr'] = $this->m_user->getAll($staffId);
                        $data['display'] = $this->load->view($this->parent_page.'/editAddress' , $arr , true);
                        $this->_show('display' , $data , $key); 
                        break;
                    } 
                     
                    case 'f1':
                    //edit
                    $data['title'] = '<i class="fa fa-cart-plus"></i> Feedback';
                    $this->_show('feedback' , $data , $key);
                    break;

                    case 's14':
                    //add

                        $this->load->database();
                        $this->load->model('m_state');
                        $arr['arr'] = $this->m_state->get();
                        
                         $data['title'] = '<i class="fa fa-home"></i> Add Address';
                        $data['display'] = $this->load->view($this->parent_page.'/addAddress', $arr , true);
                        $this->_show('display' , $data , $key); 
                        break;
                    

    			default:
    				$this->_show();
    				break;
    		}
    	}

        public function addAddress()
        {
            if ($this->input->post()) {
                $arr = $this->input->post();                
                $this->load->database();
                $this->load->model('m_address');
                $this->load->library('my_func');
                foreach ($arr as $key => $value) {
                    if ($value != null) {
                        if ($key == 'pass') {
                            $value = $this->my_func->scpro_encrypt($value);
                        }
                        $arr2[$key] = $value;                     
                    }
                }
                $result = $this->m_address->insert($arr2);
                $this->session->set_flashdata('success', 'Succesfully Added');
                redirect(site_url('reseller/page/s12'),'refresh');
            }else{
                $this->session->set_flashdata('error', 'Not Succesfully Added');
                redirect(site_url('reseller/page/s12'),'refresh');
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
                redirect(site_url('reseller/page/s1'),'refresh');
            }else{
                redirect(site_url('reseller/page/s1'),'refresh');
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