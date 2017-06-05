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
    			case 'b11':
                    $this->load->library('my_func');
                    if ($this->my_func->de($this->input->post('key') , 1) == 'betul') {
                        $this->load->database();
                        $this->load->model('m_state');                        
                        $this->load->model('m_type2', 'mty2');
                        $arr['state'] = $this->m_state->get();                        
                        $temp = $this->input->post();
                        $arr['qty'] = $temp['qty'];                    
                        // Double Check Order Quantity limitation.
                        $tQty = 0;
                        foreach ($temp['qty'] as $key) {
                            $tQty += $key;
                        }
                        $m = false;
                        if ($tQty < 20) {
                            $m = true;
                            $this->session->set_flashdata('warning', 'Warning : Quantity Less than 20 pcs');                        
                        }elseif ( $tQty > 100) {
                            $m = true;
                            $this->session->set_flashdata('warning', 'Warning : Quantity More than 100 pcs');                        
                        }else{
                            if ($tQty >= 20 && $tQty <= 40) {
                                $arr['price'] = 17.5;
                            }elseif ($tQty >= 41 && $tQty <= 60) {
                                $arr['price'] = 17;
                            }else{
                                $arr['price'] = 16.5;
                            }
                        }                
                        if ($m) {
                            redirect(site_url('reseller/page/b1'),'refresh');
                            break;
                        }
                        // End Double Check Order Quantity limitation.
                        $berat = 0;
                        for ($i=0; $i < sizeof($temp['id']); $i++) { 
                            $arr['data'][$i] = array_shift($this->mty2->getItem($this->my_func->scpro_decrypt($temp['id'][$i])));
                            $berat += (int)($arr['data'][$i]->ty2_weight * $arr['qty'][$i]);                            
                        }
                        // Get total Shipping price
                        $arr['shippingPrice'] = $this->_shippingPrice($berat);
                        $this->load->model('m_address');
                        $where = array( "us_id" => $this->my_func->scpro_decrypt($this->session->userdata('us_id')));
                        $arr['address']= $this->m_address->getBy($where);
                        // End Get total Shipping price
                        $this->session->set_userdata( $temp );
                        $this->_show('checkout' , $arr , $key);
                        break;                     
                    }               	
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
                   case "e1" :// uesr detail
                        if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                    }else{
                        $p = 0;
                    }
                    $this->load->library('my_func');
                    $this->load->library('my_flag');
                    $this->load->database();
                    $this->load->model('m_order');
                    $staffId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                    if ($this->input->post("search") && $this->input->post("filter") || $this->input->get("search") && $this->input->get("filter")) {
                        if ($this->input->get("search") && $this->input->get("filter")) {
                            $search = $this->input->get("search");
                            $filter = $this->input->get("filter");
                        } else {
                            $search = $this->input->post("search");
                            $filter = $this->input->post("filter");
                        }
                        switch ($filter) {
                            case '10':
                                //Client Name
                                $where = array(
                                    "cl.cl_name" => $search
                                );
                                break;
                            case '1':
                                //Order Code
                                //Hanya Single
                                if (strpos($search, "#") !== false) {
                                    $search = str_replace("#", "", $search);
                                }
                                if (!is_numeric($search)) {
                                    $this->session->set_flashdata('warning', 'Please Enter the Correct Order Code');
                                    redirect(site_url("nasty_v2/dashboard/page/a1"),'refresh');
                                }
                                $str = (string)$search;
                                /*if ($str[1] == '1') {
                                    $id = $search - 110000;
                                    $ver = 1;
                                } else {
                                    $id = $search - 100000;
                                    $ver = 0;
                                }*/
                                $ver = 2;
                                $id = $search - 120000;
                                $where = array(
                                    "ord.or_id" => $id
                                );
                                break;
                            case '2':
                                //Sales Person
                                $where = array(
                                    "us1.us_username" => $search
                                );
                                break;
                            case '3':
                                //Order Status
                                $where = array(
                                    "pr.pr_desc" => $search
                                );
                                break;
                        }
                        if (isset($ver)) {
                            $arr['arr1'] = $this->m_order->listOr($ver , null , null , 0 , $where);
                        }else{
                            $arr['arr1'] = $this->m_order->listSearch(2 , null , null , 0 , $where);                        
                        }
                    } else {
                        $ver = $this->m_order->orderCount1(2,$staffId);
                        $arr['arr1'] = $this->m_order->listOr1(2 , 10 , $p ,0, $staffId);
                         $arr['arr'] = $this->m_order->getItem();
                        $result1 = sizeof($arr['arr1']);
                        //$sizeA = 10 - $result1;
                        /*if ($sizeA != 0) {
                            $p1 = $p + 10 - $ver1;
                            if ($p1 < 10) {
                                $p2 = 0;
                            } else {
                                $p2 = $p1;
                                $p1 = 10;
                            }                        
                            $arr['arr'] = $this->m_order->listOr(0 , $p1 , $p2);
                            $result1 = $result1 + sizeof($arr['arr']);
                        }*/
                        $arr['page'] = $p;
                        $arr['total'] = $ver;
                        $arr['row'] = $result1;
                    }
                    $data['title'] = '<i class="fa fa-credit-card"></i> Bank</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/bankPayment' ,$arr , true);
                    $this->_show('display' , $data , 'e1');
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
                    case 's17':
                        if ($this->input->get('delete')) {
                            $this->load->database();
                            $this->load->library('my_func');
                            $this->load->model('m_address', 'madd');
                            if($this->madd->delete($this->my_func->scpro_decrypt($this->input->get('delete')))){
                                $this->session->set_flashdata('success', 'Delete Done');
                            }else{
                                $this->session->set_flashdata('warning', 'Error #res1201, Address Not found');
                            }
                            redirect(site_url('reseller/page/s12'),'refresh');
                        }  break;
                    case 's15':
                    //edit
                    $data['title'] = '<i class="fa fa-cart-plus"></i> Feedback';
                    $this->_show('feedback' , $data , $key);
                    break;

                    case "s12" :// Address detail
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
                $arr['us_id'] = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                foreach ($arr as $key => $value) {
                    if ($value != null) {                        
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
                $data['num'] = $this->input->post('num');
                $this->load->database();
                $this->load->model('m_type2' , 'mt2');
                $this->load->library('my_func');
                $id = $this->my_func->de($id);
                $data['arr'] = array_shift($this->mt2->getItem($id));
                echo $this->load->view($this->parent_page."/getAjax/getAjaxItem" , $data , false);
            }
        }

        public function getAjaxPriceRate()
        {
            if ($this->input->post('qty')) {
                $qty = $this->input->post('qty');                
                if ($qty < 20) {
                    echo '-1';
                }elseif ($qty >= 20 && $qty <= 40) {
                    echo '17.50';
                }elseif ($qty > 40 && $qty <= 60) {
                    echo '17.00';
                }elseif ($qty > 60 && $qty <= 100) {
                    echo "16.50";
                }else{
                    echo "-1";
                }
            }else{
                echo "0.00";
            }
        }

        private function _shippingPrice($berat)
        {
            $price = 11.5;
            $sBal = (int)$berat-3000;
            if ($sBal <= 0) {
                return $price; //$price;
            }else {
                $extr = (int)($sBal/1000);
                $price += $extr * 1.5;
                $extrBal = $sBal - ($extr*1000);
                if ($extrBal > 0) {
                    $price += 1.5;
                }
                return $price;
            }
        }
	}
?>