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
            $this->_checkSession();
            $this->_show();
        }

	    public function page($key)
    	{
    		//$arr = $this->input->get();
    		$this->_checkSession();
            $lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    		switch ($key) {

    			case 'b11':
                	//if ($this->input->get('key')) {
                		$data['title'] = '<i class="fa fa-cart-plus"></i> Add Order';
                		$this->load->model('m_order_item_package' , 'moip');
                		$data['arr'] = $this->moip->get(1);
                		$this->_show('addorderview' , $data , $key);

                	//}                	
                	break;                
    			case 'b1':
    				$data['title'] = '<i class="fa fa-cart-plus"></i> Add Order';
    				$this->load->library('my_func');
    				$this->load->database();
    				$this->load->model("m_category" , 'm_cat');
    				$data['cat'] = $this->m_cat->get();
    				$this->_show('addorder' , $data , $key);
    				break;

    			case "a1" :// dashboard
                        //start added
                        $this->load->database();
                        $this->load->model('m_news');
                        $this->load->model('m_detail');  
                        $this->load->model('m_address');                         
                        $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        $arr['arr'] = $this->m_news->get();
                        $arr['arr1'] = $this->m_detail->getAll($staffId);
                        $arr['arr2'] = $this->m_address->getAdd($staffId,1);                          
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
                        $this->load->model('m_detail');                        
                        $arr['arr'] = $this->m_user->getAll($staffId);
                        $arr['arr1'] = $this->m_detail->getAll($staffId);
                        
                        $data['title'] = '<i class="fa fa-user"></i> User';
                        $data['display'] = $this->load->view($this->parent_page.'/staffView' , $arr , true);
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

                   
                    case 's15':
                    //edit
                    $data['title'] = '<i class="fa fa-cart-plus"></i> Feedback';
                    $this->_show('feedback' , $data , $key);
                    break;

                      case "s12" :// uesr detail
                        $userId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                       
                        $this->load->database();
                        $this->load->model('m_address');                       
                        $arr['arr'] = $this->m_address->getAll2();
                       
                        $data['title'] = '<i class="fa fa-home"></i> Address';
                        $data['display'] = $this->load->view($this->parent_page.'/address' , $arr , true);
                        $this->_show('display' , $data , $key);
                    
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
                    
                     case 's16':
                    //edit
                   if ($this->input->get('view')) {
                        $data['title'] = '<i class="fa fa-file-text"></i> Address Detail';
                        $this->load->library('my_func');
                        $addId = $this->my_func->scpro_decrypt($this->input->get('view'));
                        $this->load->database();
                        $this->load->model('m_address');                       
                        $arr['arr'] = $this->m_address->getAll($addId);
                        $data['display'] = $this->load->view($this->parent_page.'/viewAddress' , $arr , true);
                        $this->_show('display' , $data , $key);
                        break;
                    }
                    case "s17" :// uesr detail
                        $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        $this->load->database();
                        $this->load->model('m_detail');                       
                        $arr['arr'] = $this->m_detail->getAll($staffId);
                        
                        $data['title'] = '<i class="fa fa-building"></i> Shop';
                        $data['display'] = $this->load->view($this->parent_page.'/shopDetail' , $arr , true);
                        $this->_show('display' , $data , $key);
                        //$this->_show('staffView' , $data , $key);
                    break;

                     case "s18" :// uesr detail
                        $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        $this->load->database();
                        $this->load->model('m_detail');                       
                        $arr['arr'] = $this->m_detail->getAll($staffId);
                        
                        $data['title'] = '<i class="fa fa-building"></i> Shop';
                        $data['display'] = $this->load->view($this->parent_page.'/addDetail' , $arr , true);
                        $this->_show('display' , $data , $key);
                        //$this->_show('staffView' , $data , $key);
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

        public function addDetail()
        {
            if ($this->input->post()) {
                $arr = $this->input->post();                
                $this->load->database();
                $this->load->model('m_shop');
                $this->load->library('my_func');
                //$this->load->library('upload');
                $config = array(
                'upload_path' => "./assets/uploads/logo/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "0",
                'max_width' => "0",
                'encrypt_name' => true
                );

                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                // $logo = $this->input->post('logo');



                if($this->upload->do_upload('logo')){
                    $data = $this->upload->data();
                    $logo="assets/uploads/logo/".$data['raw_name'].$data['file_ext'];


                  $arr2 = array(
                                                       
                            "logo" => $logo,
                            "sh_name" => $arr['sh_name'],
                            "owner_name" => $arr['owner_name'],
                            "registration_no" => $arr['registration_no'],
                            "phone_no" => $arr['phone_no'],
                            "faks_no" => $arr['faks_no'],
                            "email" => $arr['email'],
                            "us_id" => $arr['us_id']
                            
                           
                        );  
                        $result = $this->m_shop->insert($arr2);
                $this->session->set_flashdata('success', 'Succesfully Added');
                redirect(site_url('reseller/page/s17'),'refresh');  
                }else{
                $this->session->set_flashdata('error', 'Something wrong with your image');
                redirect(site_url('reseller/page/s17'),'refresh');
            }


                // foreach ($arr as $key => $value) {
                //     if ($value != null) {
                //         if ($key == 'pass') {
                //             $value = $this->my_func->scpro_encrypt($value);
                //         }
                //         $arr2[$key] = $value;                     
                //     }
                // }
                
            }else{
                $this->session->set_flashdata('error', 'Not Succesfully Added');
                redirect(site_url('reseller/page/s17'),'refresh');
            }
        }

        function addFeedback(){
            if ($this->input->post()) {
                    $arr = $this->input->post(); 
                    $this->load->database();
                    $this->load->model('m_feedback');

                    $this->load->library('email');

                    $this->email->set_newline("\r\n");

                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://moon.sfdns.net';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = 'reseller@nastyjuice.com';
                $config['smtp_from_name'] = $arr['fe_name'];
                $config['smtp_pass'] = 'reseller@2017';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['newline'] = "\r\n";
                $config['mailtype'] = 'html'; 

            }

            
            $data = $this->m_feedback->insert($arr);
                
     if ($data) {
                $this->email->initialize($config);
                $this->email->from($arr['fe_email'], $arr['fe_name']);
                $this->email->to('reseller@nastyjuice.com');
                $this->email->cc('epul@nastyjuice.com');
                //$this->email->bcc('them@their-example.com');

                $this->email->subject($arr['fe_name'].' send you a feedback on '. @date('Y-m-d H:i:s'));
                $this->email->message($arr['fe_message']);

            

                if ($this->email->send()) 
                {

                $this->session->set_flashdata('success', 'Your feeback is already sent.');
                redirect(site_url('reseller/page/s15'),'refresh');
                }
                else 
                {
                //echo "sending failed";
                show_error($this->email->print_debugger());     
                $this->session->set_flashdata('warning', 'Your feeback is not succesfully sent.');
                redirect(site_url('reseller/page/s15'),'refresh');
                // exit;
                }

                    
                //$this->session->set_userdata( $array );

                
            }
            else{

                $this->session->set_flashdata('warning', 'Your Email is Not Available');
                redirect(site_url('login'));
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

          public function change_status()
        {
                
                //if ($this->input->post('or_id')){
                //echo "<script>alert('test');</script>";
                $this->load->library('my_func'); 
                $add_id = $this->input->post('add_id');
                //$or_id = $this->my_func->scpro_decrypt($this->input->post('or_id'));
                $status = $this->input->post('status');
                $this->load->database();
                
                $this->load->model('m_address');
               

                    $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                    

                    $result=$this->m_address->resetStat($staffId);
                    if($result){
                    $this->m_address->updateStat($status, $add_id);
                        
                    $this->session->set_flashdata('success', 'Succesfully Updated');
                    redirect(site_url('reseller/page/s12'),'refresh');  
                    }
                    else{
                        $this->session->set_flashdata('error', 'Not Succesfully Updated');
                    redirect(site_url('reseller/page/s12'),'refresh');  
                    }
                   

                // }
                // else{
                //     return false;
                // }

                    
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
		public function getAjaxFlavor()
        {
            if ($this->input->post('m')) {
                $m = $this->input->post('m');
                if ($m == -1) {
                    echo $this->load->view($this->parent_page."/getAjax/getAjaxFlavor" , array("m" => -1) , true);
                    return;
                }
                $this->load->database();
                $this->load->library("my_func");
                $this->load->model('m_type2' , 'mt2');
                $cat = $this->my_func->de($m);
                $data['flav'] = $this->mt2->get(array("ca_id" => $cat));
                if (sizeof($data['flav']) == 0) {
                    echo $this->load->view($this->parent_page."/getAjax/getAjaxFlavor" , array("m" => -2) , true);
                    return;
                }else{
                    echo $this->load->view($this->parent_page."/getAjax/getAjaxFlavor" , $data , true);
                    return;
                }
            }
        }
        public function getAjaxItem()
        {
            if ($this->input->post('id')) {
                $id = $this->input->post('id');
                $this->load->database();
                $this->load->model('m_type2' , 'mt2');
                $this->load->library('my_func');
                $id = $this->my_func->de($id);
                $data['arr'] = array_shift($this->mt2->getItem($id));
                echo $this->load->view($this->parent_page."/getAjax/getAjaxItem" , $data , false);
            }
        }
	}
?>