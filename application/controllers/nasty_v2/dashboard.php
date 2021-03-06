<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

	   	var $parent_page = "nasty_v2/dashboard";
	   	var $old_page = "dashboard";
        var $version = "OrdYs v2.4.1 Alpha";
        var $imgUploc = "/assets/uploads/img/";
        var $flags = 'asset/flags/flags.png';

	    function __construct() {
	        parent::__construct();
	        $this->load->library('session');
            date_default_timezone_set('Asia/Kuala_Lumpur');
	    }

	    function index() {
	        $this->page('a1');
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
	    	$this->load->view($this->parent_page.'/'.$page, $data, FALSE);
	    	$this->load->view($this->parent_page.'/page/sidebar7', '', FALSE);
	    	$this->load->view($this->parent_page.'/page/footer', '', FALSE);
	    }

	    public function page($key)
    	{
    		//$arr = $this->input->get();
    		$this->_checkSession();
			$this->load->helper('timeline');
            $lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    		switch ($key) {
                case "x1" :// dashboard
                        //start added
                        $this->load->database();
                        $this->load->model('m_order');
                        $this->load->model('m_client');
                        $this->load->model('m_nico');
                        $arr['neworder'] = $this->m_order->countOrderType(1 , 2);
                        $arr['inprogress'] = $this->m_order->countOrderType(2 , 2);
                        $arr['complete'] = $this->m_order->countOrderType(3 , 2);
                        $arr['unconfirm'] = $this->m_order->countOrderType(4 , 2);
                        $arr['onhold'] = $this->m_order->countOrderType(7 , 2);
                        $arr['vernew'] = $this->m_order->orderCount(2);
                        $arr['verold'] = $this->m_order->orderCount(1) + $this->m_order->orderCount(0);
                        //$arr['totalProfit'] = $this->m_order->totalProfit();
                        $arr['client'] = $this->m_client->get(null , 'asc');
                        $arr['nation'] = $this->m_client->getNation();
                        $arr['mg'] = $this->m_nico->get();
                        //end added                        $data['title'] = '<i class="fa fa-pencil"></i>Main Page</a>';
                        //$data['display'] = $this->load->view($this->parent_page.'/dashboard' ,$arr, true);
                        $this->_show('dashboard' , $arr, $key);
                   break;
                case 'a13':
                    //delete
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if($this->input->get('del')){
                        $or_id = $this->my_func->scpro_decrypt($this->input->get('del'));
                        $arr = array(
                            'or_del' => 1
                        );
                        $this->load->model('m_order');
                        $this->m_order->update($arr , $or_id);
						recordLog($or_id , 5);
                    }
                    $this->session->set_flashdata('info', 'Order Deleted');
                    redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    break;
    			case 'a12':
                    //edit
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($this->input->get('edit')) {
                        $id = $this->input->get('edit');
                        $id = $this->my_func->scpro_decrypt($id);
                        $this->load->model('m_order');
                        $arr['arr'] = array_shift($this->m_order->getList_ext($id));
                        $data['title'] = '<i class="fa fa-pencil"></i>Edit Order Detail</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/orderEdit' ,$arr , true);
                        $this->_show('display' , $data , $key);
                        break;
                    }
                case 'a121':
                    //edit
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($this->input->get('edit')) {
                        $id = $this->input->get('edit');
                        $id = $this->my_func->scpro_decrypt($id);
                        $this->load->model('m_order');
                        $this->load->model('m_client');
                        $this->load->model('m_category');
                        $this->load->model('m_nico');
                        $arr['nico'] = $this->m_nico->get();
                        $arr['cat'] = $this->m_category->get(null , 'asc');
                        if ($this->input->get('v')) {
                            $vers = $this->input->get('v');
                        }else{
                            $vers = 1;
                        }
                        $arr['arr'] = array_shift($this->m_order->getList_ext($id, $vers));
                        $data['title'] = '<i class="fa fa-pencil"></i>Edit Order Detail</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/orderEdit1' ,$arr , true);
                        $this->_show('display' , $data , $key);
                        break;
                    }
                case 'a11':
                    //view
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if($this->input->get('view')){
                        $id = $this->input->get('view');
                        //$this->load->library('my_func');
                        $id = $this->my_func->scpro_decrypt($id);
                        $this->load->database();
                        $this->load->model('m_order');
                        $arr['arr'] = array_shift($this->m_order->getList_ext($id));
                        $data['title'] = '<i class="fa fa-eye"></i> Order Detail</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/orderView' ,$arr , true);
                        $this->_show('display' , $data , $key);
                        break;
                    }
                case 'a111':
                    //view new
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if($this->input->get('view')){
                        $id = $this->input->get('view');
                        //$this->load->library('my_func');
                        $id = $this->my_func->scpro_decrypt($id);
                        $this->load->database();
                        $this->load->model('m_order');
                        $arr['arr'] = array_shift($this->m_order->getList_ext($id , 1));
                        if (sizeof($arr['arr']) == 0) {
                            $arr['arr'] = array_shift($this->m_order->getList_ext($id , 2));
                        }
                        $data['title'] = '<i class="fa fa-eye"></i> Order Detail</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/orderView1' ,$arr , true);
                        $this->_show('display' , $data , $key);
                        break;
                    }
                    case 'i111':
                    //view new
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/i21'),'refresh');
                    }
                    if($this->input->get('view')){
                        $id = $this->input->get('view');
                        //$this->load->library('my_func');
                        $id = $this->my_func->scpro_decrypt($id);
                        $this->load->database();
                        $this->load->model('m_ship');
                        $arr['arr'] = array_shift($this->m_ship->getList_ext($id , 1));
                        if (sizeof($arr['arr']) == 0) {
                            $arr['arr'] = array_shift($this->m_ship->getList_ext($id , 2));
                        }
                        $data['title'] = '<i class="fa fa-eye"></i> Inventory Detail</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/shipView' ,$arr , true);
                        $this->_show('display' , $data , 'i1');
                        break;
                    }
                case 'a1':
    			case 'a1new':
                    //OrdSys 2.3.0
    				if ($lvl == 3 || $lvl == 7) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($lvl == 6) {
                        redirect(site_url('nasty_v2/dashboard/page/i1'),'refresh');
                    }

                    if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                    }else{
                        $p = 0;
                    }
                    $this->load->library('my_func');
                    $this->load->library('my_flag');
                    $this->load->database();
                    $this->load->model('m_order');
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
								$ver = $str[1];
								switch ($ver) {
									case '0':
										$id = $search - 100000;
										break;
									case '1':
										$id = $search - 110000;
										break;
									case '2':
										$id = $search - 120000;
										break;
									default:
										$id = -1;
										break;
								}
                                /*if ($str[1] == '1') {
                                    $id = $search - 110000;
                                    $ver = 1;
                                } else {
                                    $id = $search - 100000;
                                    $ver = 0;
                                }*/
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
                        $ver = $this->m_order->orderCount(2);
                        $arr['arr1'] = $this->m_order->listOr(2 , 10 , $p);
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
						// echo "<pre>";
						// print_r($arr);
						// echo "</pre>";
						// die();
                    }
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> Production</a>';
    				$data['display'] = $this->load->view($this->parent_page.'/orderList1' ,$arr , true);
    				$this->_show('display' , $data , 'a1');
    				break;

                case 'i21':
                    $this->load->database();
                    $this->load->model('m_finish_log');
                    $this->load->library('pagination');

                    $like = null;
                    $filter = null;
                    $month = null;
                    $year = null;

                    $limit_per_page = 10;

                    if (($this->input->post("search") && $this->input->post("filter")) || ($this->input->get("search") && $this->input->get("filter")))
                    {
                        if ($this->input->get("search") && $this->input->get("filter")) {
                            $search = $this->input->get("search");
                            $filterM = $this->input->get("filter");
                        } else {
                            $search = $this->input->post("search");
                            $filterM = $this->input->post("filter");
                        }

                        if (($this->input->post("month") && $this->input->post("year")) || ($this->input->get("month") && $this->input->get("year"))) {

                            if ($this->input->get("month") && $this->input->get("year")) {
                                $month = $this->input->get("month");
                                $year = $this->input->get("year");
                            } else {
                                $month = $this->input->post("month");
                                $year = $this->input->post("year");
                            }
                        }

                        switch ($filterM) {
                            case '1':
                                //item name
                                $like = array('ty2.ty2_desc' => $search );
                            break;

                            case '2':
                                //username
                                $filter = array('us.us_username' => $search );
                            break;

                            case '3':
                                //date
                                $search = date_format(date_create($search) , 'Y-m-d' ) ;
                                $like = array('fl.fi_date' => $search );
                            break;

                            case '4':
                                //log status
                                $filter = array('ls.ls_desc' => $search );
                            break;

                        }
                        $arr['total'] = $this->m_finish_log->count($filter,$like,$month,$year);
                        $limit_per_page = $arr['total'];
                    }
                    else {
                        $arr['total'] = $this->m_finish_log->count($filter,$like);
                    }





                    $page = $this->uri->segment(5,1);
                    $page--;
                    $arr['numPage'] = $page*10;


                    $arr['result'] = $this->m_finish_log->get_curr($limit_per_page , $arr['numPage'] , $filter , $like , $month , $year );

                    $config['base_url'] = site_url('nasty_v2/dashboard/page/i21');
                    $config['total_rows'] = $arr['total'];
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] =5;
                           // custom paging configuration
                    $config['num_links'] = 4;
                    $config['use_page_numbers'] = TRUE;
                    $config['reuse_query_string'] = TRUE;

                    $config['cur_tag_open'] = '<li><a class="current"><strong><b>';
                    $config['cur_tag_close'] = '</b></strong></a></li>';
                    $config['num_tag_open'] = '&nbsp;<li>';
                    $config['num_tag_close'] = '</li>&nbsp;';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['next_link'] = 'Next';
                    $config['prev_link'] = 'Previous';

                    $this->pagination->initialize($config);

                    $arr["link"] = $this->pagination->create_links();

                    $data['title'] = '<i class="fa fa-fw fa-edit"></i> Inventory</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/shipList' ,$arr , true);
                    $this->_show('display' , $data , $key);
                    break;



                case 'a1old':
                    // Ver 2.2.x
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                    }else{
                        $p = 0;
                    }
                    $this->load->library('my_func');
                    $this->load->database();
                    $this->load->model('m_order');
                    if ($this->input->post("search") && $this->input->post("filter")) {
                        $search = $this->input->post("search");
                        switch ($this->input->post("filter")) {
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
                                if ($str[1] == '1') {
                                    $id = $search - 110000;
                                    $ver = 1;
                                } else {
                                    $id = $search - 100000;
                                    $ver = 0;
                                }
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
                            $arr['arr'] = array();
                            $arr['arr1'] = array();
                            if ($ver == 1) {
                                $arr['arr1'] = $this->m_order->listOr($ver , null , null , 0 , $where);
                            } else {
                                $arr['arr'] = $this->m_order->listOr($ver , null , null , 0 , $where);
                            }
                        }else{
                            $arr['arr1'] = $this->m_order->listSearch(1 , null , null , 0 , $where);
                            $arr['arr'] = $this->m_order->listSearch(0 , null , null , 0 , $where);
                        }
                    } else {
                        $ver0 = $this->m_order->orderCount(0);
                        $ver1 = $this->m_order->orderCount(1);
                        $arr['arr1'] = $this->m_order->listOr(1 , 10 , $p);
                        $result1 = sizeof($arr['arr1']);
                        $sizeA = 10 - $result1;
                        if ($sizeA != 0) {
                            $p1 = $p + 10 - $ver1;
                            if ($p1 < 10) {
                                $p2 = 0;
                            } else {
                                $p2 = $p1;
                                $p1 = 10;
                            }
                            $arr['arr'] = $this->m_order->listOr(0 , $p1 , $p2);
                            $result1 = $result1 + sizeof($arr['arr']);
                        }
                        $arr['page'] = $p;
                        $arr['total'] = $ver0 + $ver1;
                        $arr['row'] = $result1;
                    }
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i> Production</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/orderList' ,$arr , true);
                    $this->_show('display' , $data , 'a1');
                    break;
    			case 'a12old':
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
                case 'a221':
                    if ($this->input->get('done')) {
                        $or_id = $this->my_func->scpro_decrypt($this->input->get('done'));
                        $this->load->database();
                        $this->load->model('m_order');
                        $this->load->model('m_order_ext');
                        $finish = date("Y-m-d",time());
                        $ver = 2;
                        if ($this->input->get('ver')) {
                            $ver = $this->input->get('ver');
                        }
                        $this->m_order_ext->update(array("or_finishdate" => $finish), array('or_id' => $or_id));
                        $row = $this->m_order->update(array('pr_id' => 3) , $or_id);
                        if ($row == 0) {
                            $this->session->set_flashdata('warning', 'Ops!! Unable to update the order status...');
                        } else {
							recordLog($or_id , 3);
                            $this->session->set_flashdata('success', 'The order are completed. Please print the D.O. form before shipping.');
                            $email['fromName'] = "Ai System";
                            $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                            $email['toEmail'] = "zul@nastyjuice.com, finance@nastyjuice.com";
                            $email['subject'] = $this->version." #".((10000*$ver)+100000+$or_id)." Completed";
                            $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : Order Complete

Print D.O.Form Link : ".site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($or_id))."&ver=".$ver."
Print Order Detail : ".site_url('order/printO1?id='.$this->my_func->scpro_encrypt($or_id))."&ver=".$ver."

Search Order Page : ".site_url()."
System Login : ".site_url('login')."

Sincerely,
Ai System

Programmer
JauhMerah
jauhmerah@nastyjuice.com
Epul
epul@nastyjuice.com
                        ";
                        $this->sendEmail($email);
                        }
                        redirect(site_url('nasty_v2/dashboard/page/a2?mode=2'),'refresh');
                    }
                    break;
                case 'a21':
                    if ($this->input->get('move')) {
                        $or_id = $this->my_func->scpro_decrypt($this->input->get('move'));
                        $this->load->database();
                        $this->load->model('m_order');
						$this->load->model('m_order_ext' , 'moe');
						if ($this->input->get('ets')) {
							$or_sendDate = $this->input->get('ets');
						}else{
							$this->session->set_flashdata('warning' , 'Please insert ETS to proceed the order!');
							redirect(site_url('nasty_v2/dashboard/page/a2?mode=1'),'refresh');
						}
                        $result = $this->m_order->update(array('pr_id' => 2 ) , $or_id);
						$result = $this->moe->update(array('or_dateline' => $or_sendDate ) , array( 'or_id' => $or_id));
						recordLog($or_id , 2);
                        $orCode = "#".(120000+$or_id);
                        if ($result == 0) {
                            $this->session->set_flashdata('warning', 'Something wrong with your order <strong>'.$orCode.'</strong>, please contact your IT Team');
                        } else {
                            $this->session->set_flashdata('success', 'Successfully move this order <strong>'.$orCode.'</strong> to process queue');
                        }
                        redirect(site_url('nasty_v2/dashboard/page/a2?mode=1'),'refresh');
                        break;
                    }
    			case 'a2':
    				//$this->load->library('my_func');
                    // if ($lvl == 3) {
                    //     redirect(site_url('nasty_v2/dashboard/page/i1'),'refresh');
                    // }
                    if ($lvl == 4 || $lvl == 2 ) {
                        redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    }
                    if ($this->input->get('mode')) {
                        $temp['mode'] = $this->input->get('mode');
                    }
	    			$this->load->database();
	    			$this->load->model('m_order');
                    $this->load->library('l_label');
    				// $temp['arr'] = $this->m_order->getList_ext(null ,1, 1 , 1 , 0);
    				// $temp['arr1'] = $this->m_order->getList_ext(null ,1, 1 , 2 , 0);
                    $temp['arrV'] = $this->m_order->getList_ext(null ,2, 1 , 1 , 0);
                    $temp['arrV1'] = $this->m_order->getList_ext(null ,2, 1 , 2 , 0);
					$temp['arrV2'] = $this->m_order->getList_ext(null ,2, 2 , 3 , 0);
                    $temp['arrHold'] = $this->m_order->getList_ext(null ,2, 1 , 7 , 0);
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i>Order List</a>';
    				$data['display'] = $this->load->view($this->parent_page.'/productionOrder', $temp , TRUE);
					$data['display'] .= $this->productionXdistribution();
    				$this->_show('display' , $data , $key);
    				break;
                case 'a6':
                    $this->load->database();
                    $this->load->library('my_func');
                    $this->load->library('my_flag');
                    $this->load->model('m_order');

                    $arr['arr1'] = $this->m_order->listOr(2 , 10);

                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>Distributor</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/ROSlist', $arr , TRUE);
                    $this->_show('display' , $data , $key);
                    break;

                case 'a62':
					// NOTE : This section will not use any more. Integrate with production. (function productionXdistribution)
                    if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                    }else{
                        $p = 0;
                    }
                     if ($this->input->get('e')) {
                        $e = $this->input->get('e');
                    }else{
                        $e = 0;
                    }

                    if ($this->input->get('page2')) {
                        $p2 = $this->input->get('page2');
                    }else{
                        $p2 = 0;
                    }
                     if ($this->input->get('e2')) {
                        $e2 = $this->input->get('e2');
                    }else{
                        $e2 = 0;
                    }

                    if ($this->input->get('page3')) {
                        $p3 = $this->input->get('page3');
                    }else{
                        $p3 = 0;
                    }
                     if ($this->input->get('e3')) {
                        $e3 = $this->input->get('e3');
                    }else{
                        $e3 = 0;
                    }
                    $this->load->database();
                    $this->load->library('my_func');
                    $this->load->library('my_flag');
                    $this->load->model('m_order');
                    $this->load->model('m_order_process');

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
                            $arr['arr1'] = $this->m_order->listOrROS($ver , 1 , null , null , 0 , $where);
                             $arr['arr2'] = $this->m_order->listOrROS($ver , 2 , null , null , 0 , $where);
                             $arr['arr3'] = $this->m_order->listOrROS($ver , 3 , null , null , 0 , $where);

                        }else{
                            $arr['arr1'] = $this->m_order->listSearch(2 , null , null , 0 , $where);
                            //$arr['arr2'] = $this->m_order->listOr($ver , null , null , 0 , $where);
                        }
                    } else {
                        $ver = $this->m_order->orderCountROS(2, 1);
                        $ver2 = $this->m_order->orderCountROS(2, 2);
                        $ver3 = $this->m_order->orderCountROS(2, 3);

                        $arr['arr1'] = $this->m_order->listOrROS(2 , 1 , 10 , $p);
                        $arr['arr2'] = $this->m_order->listOrROS(2 , 2 , 10 , $p2);
                        $arr['arr3'] = $this->m_order->listOrROS(2 , 3 , 10 , $p3);
                        $result1 = sizeof($arr['arr1']);
                        $result2 = sizeof($arr['arr2']);
                        $result3 = sizeof($arr['arr3']);

                        $arr['page'] = $p;
                        $arr['e'] = $e;
                        $arr['page2'] = $p2;
                        $arr['e2'] = $e2;
                        $arr['page3'] = $p3;
                        $arr['e3'] = $e3;

                        $arr['total'] = $ver;
                        $arr['total2'] = $ver2;
                        $arr['total3'] = $ver3;

                        $arr['row'] = $result1;
                        $arr['row2'] = $result2;
                        $arr['row3'] = $result3;
                        $arr['lvl'] = $this->m_order_process->getLvl(1);
                        $arr['lvl2'] = $this->m_order_process->getLvl(3);
                        $arr['lvl3'] = $this->m_order_process->getLvl(2);

                    }
                    //$arr['arr'] = $this->m_order->getAll();
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>Distributor</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/ROSlist2', $arr , TRUE);
                    $this->_show('display' , $data , $key);
                    break;
                    case 'a7':
                    //$this->load->library('my_func');
                   /* if ($lvl == 4) {
                        redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    }
                    if ($this->input->get('mode')) {
                        $temp['mode'] = $this->input->get('mode');
                    }          */
                    $this->load->database();
                    $this->load->library('my_func');
                    $this->load->library('my_flag');
                    $this->load->model('m_order');
                    $this->load->model('m_order_process');

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
                        $ver = $this->m_order->orderCount(2);
                        $arr['arr1'] = $this->m_order->listOr(2 , 10);



                    $arr['arr'] = $this->m_order->getList_ext(null ,1, 1 , 1 , 0);
                    //$arr['arr1'] = $this->m_order->getList_ext(null ,1, 1 , 2 , 0);
                    $arr['arrV'] = $this->m_order->getList_ext(null ,2, 1 , 1 , 0);
                    $arr['arrV1'] = $this->m_order->getList_ext(null ,2, 1 , 2 , 0);
                    $arr['arrHold'] = $this->m_order->getList_ext(null ,2, 1 , 7 , 0);
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
                        //$arr['page'] = $p;
                        $arr['total'] = $ver;
                        $arr['row'] = $result1;
                        $arr['lvl'] = $this->m_order_process->getLvl();
                    }
                    //$arr['arr'] = $this->m_order->getAll();
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>RST List</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/RSTlist', $arr , TRUE);
                    $this->_show('display' , $data , $key);
                    break;

                    case 'a8':
                    //$this->load->library('my_func');
                   /* if ($lvl == 4) {
                        redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    }
                    if ($this->input->get('mode')) {
                        $temp['mode'] = $this->input->get('mode');
                    }          */
                    $this->load->database();
                    $this->load->model('m_order');
                    $this->load->library('l_label');
                    $temp['arr'] = $this->m_order->getList_ext(null ,1, 1 , 1 , 0);
                    $temp['arr1'] = $this->m_order->getList_ext(null ,1, 1 , 2 , 0);
                    $temp['arrV'] = $this->m_order->getList_ext(null ,2, 1 , 1 , 0);
                    $temp['arrV1'] = $this->m_order->getList_ext(null ,2, 1 , 2 , 0);
                    $temp['arrHold'] = $this->m_order->getList_ext(null ,2, 1 , 7 , 0);
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>RST Action</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/RSTaction', $temp , TRUE);
                    $this->_show('display' , $data , $key);
                    break;

                    case 'a9':
                    //$this->load->library('my_func');
                   /* if ($lvl == 4) {
                        redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    }
                    if ($this->input->get('mode')) {
                        $temp['mode'] = $this->input->get('mode');
                    }          */
                    $this->load->database();
                    $this->load->model('m_order');
                    $this->load->library('l_label');
                    $temp['arr'] = $this->m_order->getList_ext(null ,1, 1 , 1 , 0);
                    $temp['arr1'] = $this->m_order->getList_ext(null ,1, 1 , 2 , 0);
                    $temp['arrV'] = $this->m_order->getList_ext(null ,2, 1 , 1 , 0);
                    $temp['arrV1'] = $this->m_order->getList_ext(null ,2, 1 , 2 , 0);
                    $temp['arrHold'] = $this->m_order->getList_ext(null ,2, 1 , 7 , 0);
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>ROS List</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/ROSswitch', $temp , TRUE);
                    $this->_show('display' , $data , $key);
                    break;

                case 'i1':
                    $this->load->database();
                    $this->load->library('l_label');
                    $this->load->model('m_finish_inv' , 'mfi');
                    $this->load->model('m_finish_log' , 'mfl');
                    $this->load->model('m_category');
                    $this->load->model('m_nico');
                    $this->load->model('m_type2');

                    $date = date('Y-m-d');


                    $temp['color'] = $this->m_type2->get();
                    $temp['series'] = $this->m_category->get();
                    $temp['nico'] = $this->m_nico->get();
                    $temp['countDgr'] = $this->mfi->countDgr();
                    $temp['countWrn'] = $this->mfi->countWrn();
                    $temp['stockIn'] = $this->mfl->countStock(1,$date);
                    $temp['stockOut'] = $this->mfl->countStock(2,$date);
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>Inventory</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/invDashboard', $temp , TRUE);
                    $this->_show('display' , $data , $key);
                break;

                case 'i2':
                    $this->load->database();
                    $this->load->model('m_barcode_item');
                    $this->load->model('m_finish_inv' , 'mfi');

                    $this->load->library('pagination');
                    $this->load->helper('array');

                    $arr['countDgr'] = $this->mfi->countDgr();
                    $arr['countWrn'] = $this->mfi->countWrn();

                    $like = null;
                    $filter = null;
                    $limit_per_page = 10;
                    if ($this->input->post("search") )
                    {
                            $search = $this->input->post("search");

                            if(strpos($search, ',') !== false)
                            {
                                $search = explode(',', $search);



                                $sizeArr = sizeof($search);

                                foreach ($search as $key => $value){
                                    $filter[] = $value;
                                }


                            }
                            else
                            {
                                $filter = array('bi.bi_code' => $search );
                            }

                        $arr['total'] = $this->m_barcode_item->count($filter,$like);
                        $limit_per_page = $arr['total'];
                    }
                    elseif ($this->input->post("search2") &&  $this->input->post("filter")) {

                            $search = $this->input->post("search2");
                            $filterM = $this->input->post("filter");


                        switch ($filterM) {
                            case '1':
                                //item name
                                $like = array('ty2.ty2_desc' => $search );
                            break;

                            case '2':
                                //category
                                $like = array('ca.ca_desc' => $search );
                            break;

                            case '3':
                                //nicotine
                                $like = array('ni.ni_mg' => $search );
                            break;


                        }
                        $arr['total'] = $this->m_barcode_item->count($filter,$like);
                        $limit_per_page = $arr['total'];
                    }
                    else
                    {
                        $arr['total'] = $this->m_barcode_item->count($filter,$like);
                    }


                    $page = $this->uri->segment(5,1);
                    $page--;

                    $arr['numPage'] = $page*10;




                    $arr['result'] = $this->m_barcode_item->get_curr($limit_per_page , $arr['numPage'] , $filter , $like);

                    $config['base_url'] = site_url('nasty_v2/dashboard/page/i2');
                    $config['total_rows'] = $arr['total'];
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] =5;

                    // custom paging configuration
                    $config['num_links'] = 3;
                    $config['use_page_numbers'] = TRUE;
                    $config['reuse_query_string'] = TRUE;

                    $config['cur_tag_open'] = '<li><a class="current"><strong>';
                    $config['cur_tag_close'] = '</strong></a></li>';
                    $config['num_tag_open'] = '&nbsp;<li>';
                    $config['num_tag_close'] = '</li>&nbsp;';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['next_link'] = 'Next';
                    $config['prev_link'] = 'Previous';
                    $this->pagination->initialize($config);
                    $arr["link"] = $this->pagination->create_links();

                    $data['title'] = '<i class="fa fa-fw fa-edit"></i>Inventory</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/itemList', $arr , TRUE);
                    $this->_show('display' , $data , $key);

                break;

                case 'i4':



                    $this->load->database();
                    $this->load->model('m_barcode_item');
                    $this->load->library('pagination');
                    $this->load->helper('array');

                    $like = null;
                    $filter = null;
                    $limit_per_page = 10;

                    if ($this->input->post("search2") &&  $this->input->post("filter")) {

                            $search = $this->input->post("search2");
                            $filterM = $this->input->post("filter");


                        switch ($filterM) {
                            case '1':
                                //item name
                                $like = array('ty2.ty2_desc' => $search );
                            break;

                            case '2':
                                //category
                                $like = array('ca.ca_desc' => $search );
                            break;

                            case '3':
                                //nicotine
                                $like = array('ni.ni_mg' => $search );
                            break;


                        }
                        $arr['total'] = $this->m_barcode_item->count($filter,$like);
                        $limit_per_page = $arr['total'];
                    }
                    else
                    {
                        $arr['total'] = $this->m_barcode_item->count($filter,$like);
                    }


                    $page = $this->uri->segment(5,1);
                    $page--;

                    $arr['numPage'] = $page*10;




                    $arr['result'] = $this->m_barcode_item->get_curr($limit_per_page , $arr['numPage'] , $filter , $like);

                    $config['base_url'] = site_url('nasty_v2/dashboard/page/i4');
                    $config['total_rows'] = $arr['total'];
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] =5;

                    // custom paging configuration
                    $config['num_links'] = 3;
                    $config['use_page_numbers'] = TRUE;
                    $config['reuse_query_string'] = TRUE;

                    $config['cur_tag_open'] = '<li><a class="current"><strong>';
                    $config['cur_tag_close'] = '</strong></a></li>';
                    $config['num_tag_open'] = '&nbsp;<li>';
                    $config['num_tag_close'] = '</li>&nbsp;';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['next_link'] = 'Next';
                    $config['prev_link'] = 'Previous';
                    $this->pagination->initialize($config);
                    $arr["link"] = $this->pagination->create_links();

                    $data['title'] = '<i class="fa fa-fw fa-gear"></i>Barcode Setting</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/barcodeSetting', $arr , TRUE);
                    $this->_show('display' , $data , $key);

                    // $this->_loadCrud();
                    // $crud = new grocery_CRUD();
                    // $crud->set_model('m_barcode_item_crud');
                    // $crud->set_table('barcode_item');
                    // $crud->set_subject('Finish Item');
                    // $crud->required_fields('ca_id','ty2_id');
                    // $crud->set_relation('ni_id','nicotine','ni_mg');

                    // $crud->columns('bi_code','ty2_id','ni_id');
                    // $crud->display_as('bi_code','Barcode Number')
                    //     ->display_as('ca_id','Series')
                    //      ->display_as('ty2_id','Item Description')
                    //      ->display_as('ni_id','Nicotine');
                    // $crud->callback_column('ty2_id',array($this,'callback_col_item2'));
                    // $crud->callback_add_field('ca_id', function () {
                    //         $this->load->database();
                    //         $this->load->model('m_category');
                    //         $cat = $this->m_category->get();
                    //         $text2 = "";
                    //         foreach ($cat as $key) {
                    //             $text2 = $text2 . '<option style="background-color:'.$key->ca_color.'" value="'.$key->ca_id .'">'. $key->ca_desc.' </option>';
                    //         }
                    //         $text = '
                    //         <div class="form-group">
                    //             <div class="col-sm-8">
                    //                 <select id="item" name= "ty2_id">
                    //                     <option value="-1">-- Select Category --</option>
                    //                     '.$text2.'
                    //                 </select>
                    //             </div>
                    //         </div>
                    //         ';
                    //         return $text;
                    //     });
                    // $crud->callback_add_field('ty2_id', function () {
                    //         $this->load->database();
                    //         $this->load->model('m_type2');
                    //         $item = $this->m_type2->get();
                    //         $text2 = "";
                    //         foreach ($item as $key) {
                    //             $text2 = $text2 . '<option value="'.$key->ty2_id .'">'. $key->ty2_desc.' </option>';
                    //         }
                    //         $text = '
                    //         <div class="form-group">
                    //             <div class="col-sm-8">
                    //                 <select id="item" name= "ty2_id">
                    //                     <option value="-1">-- Select Item --</option>
                    //                     '.$text2.'
                    //                 </select>
                    //             </div>
                    //         </div>
                    //         ';
                    //         return $text;
                    //     });

                    // $crud->unset_print();
		    		// $crud->unset_export();




					// $output = $crud->render();
		    		// $data['display'] = $this->load->view('crud' , $output , true);
		    		// $this->_show('display' , $data , $key);
    				// break;
                break;
                case 'i41':
                    if ($this->input->get('view')) {
    					$data['title'] = '<i class="fa fa-file-eye"></i> Finish Item Detail';
    					$id = $this->my_func->scpro_decrypt($this->input->get('view'));
    					$this->load->database();
    					$this->load->model('m_barcode_item');
    					$arr['arr'] = $this->m_barcode_item->getAll($id);
    					$data['display'] = $this->load->view($this->parent_page.'/barcode_item_view' , $arr , true);
		    			$this->_show('display' , $data , $key);
    					break;
    				}
                break;
                 case 'i42':
                    if ($this->input->get('edit')) {
    					$data['title'] = '<i class="fa fa-file-eye"></i> Finish Item Detail';
    					$id = $this->my_func->scpro_decrypt($this->input->get('edit'));
    					$this->load->database();
    					$this->load->model('m_barcode_item');
    					$this->load->model('m_type2');
    					$this->load->model('m_category');
    					$this->load->model('m_nico');
    					$arr['arr'] = $this->m_barcode_item->getAll($id);
    					$arr['cat'] = $this->m_category->get();
    					$arr['nico'] = $this->m_nico->get();
    					$arr['type2'] = $this->m_type2->get();
    					$data['display'] = $this->load->view($this->parent_page.'/barcode_item_edit' , $arr , true);
		    			$this->_show('display' , $data , $key);
    					break;
    				}
                break;
                 case 'i43':

    					$data['title'] = '<i class="fa fa-file-eye"></i> Finish Item Detail';

    					$this->load->database();
    					$this->load->model('m_barcode_item');
    					$this->load->model('m_type2');
    					$this->load->model('m_category');
    					$this->load->model('m_nico');
    					$arr['cat'] = $this->m_category->get();
    					$arr['nico'] = $this->m_nico->get();
    					$arr['type2'] = $this->m_type2->get();
    					$data['display'] = $this->load->view($this->parent_page.'/barcode_item_add' , $arr , true);
		    			$this->_show('display' , $data , $key);
    					break;

                break;
                case 'i3':
                $this->load->database();
                    $this->load->model('m_client');
                    $this->load->model('m_category');
                    $this->load->model('m_nico');
                    $arr['nico'] = $this->m_nico->get();
                    $arr['cat'] = $this->m_category->get(null , 'asc');
                    $arr['client'] = $this->m_client->get(null , 'asc');
                    $data['title'] = '<i class="fa fa-fw fa-cubes"></i> Shipping Log</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/shipLog', $arr , TRUE);
                    $this->_show('display' , $data , 'i1');
                break;
                case 'c4':
                    //Category
                    $this->_loadCrud();
                    $crud = new grocery_CRUD();

                    $crud->set_table('category');
                    $crud->set_subject('Event');
                    $crud->required_fields('ca_desc','ca_color');
                    $crud->unset_add_fields("ca_date");
                    $crud->unset_edit_fields('ca_date');
                    $crud->callback_add_field('ca_color', function () {
                            return '<input type="color" name="ca_color" id="inputCa_color" value="" title="Pick Color" width = 10px>';
                        });
                    $crud->callback_add_field('ca_desc', function () {
                            return '<input type="text" name="ca_desc" id="inputCa_desc" value="" title="Event Title">';
                        });
                    $crud->display_as('ca_desc','Event Title')
                        ->display_as('ca_color', 'Event Color')
                        ->display_as('ca_note' , 'Event Note')
                        ->display_as('ca_date' , 'Event Date Created');
                    $crud->callback_column('ca_color',array($this,'callback_col_cat'));
                    $crud->callback_edit_field('ca_color',array($this,'edit_field_callback_cat'));
                    $output = $crud->render();
                    $data['display'] = $this->load->view('crud' , $output , true);
                    $this->_show('display' , $data , $key);
                    break;
    			case 'c2':
    				//Item
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Item List';
    				//$this->path_callback = 'channel';
    				$this->_loadCrud();
		    		$crud = new grocery_CRUD();
		    		$crud->set_table('type2');
		    		$crud->set_subject('Item Type');
                    $crud->display_as('ty2_desc','Item Detail')
                         ->display_as('ca_id','Event Category');
                    $crud->required_fields('ty2_desc', 'ca_id');
		    		$crud->unset_print();
		    		$crud->unset_export();
					$crud->unset_texteditor('ty2_desc');
                    $crud->callback_column('ca_id',array($this,'callback_col_item'));
                    $crud->callback_add_field('ca_id', function () {
                            $this->load->database();
                            $this->load->model('m_category');
                            $cat = $this->m_category->get();
                            $text2 = "";
                            foreach ($cat as $key) {
                                $text2 = $text2 . '<option style="background-color:'.$key->ca_color.'" value="'.$key->ca_id .'">'. $key->ca_desc.' </option>';
                            }
                            $text = '
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <select id="cat" name= "ca_id" class="form-control input-circle">
                                        <option value="-1">-- Select Category --</option>
                                        '.$text2.'
                                    </select>
                                </div>
                            </div>
                            ';
                            return $text;
                        });
                    $crud->callback_before_insert(array($this,'callback_before_insert_item'));
					$output = $crud->render();
		    		$data['display'] = $this->load->view('crud' , $output , true);
		    		$this->_show('display' , $data , $key);
    				break;
    			case 'c3':
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
                    if ($lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
    				$data['title'] = '<i class="fa fa-fw fa-link"></i> Client Detail';
    				$this->_loadCrud();
		    		$crud = new grocery_CRUD();
		    		//$crud->set_theme('twitter-bootstrap-new');
		    		$crud->set_table('client');
		    		$crud->set_subject('Client Detail');
		    		//$crud->unset_export();
		    		//$crud->unset_print();
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
                case 'z121':
                //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>disabled<<<<<<<<<<<<<<<<<<<<
                    //edit order
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($this->input->post() && $this->input->get('key')) {
                        $msg = '';
                        $arr = $this->input->post();
                        $or_id = $this->my_func->scpro_decrypt($this->input->get('key'));
                        $us_id=$this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        $this->load->database();
                        $this->load->model('m_order_item');
                        $this->load->model('m_log');
                        $this->load->model('m_stock_inventory' , 'msi');
                        if (isset($arr['idE'])) {
                            if (sizeof($arr['idE']) != 0) {
                                for ($i=0; $i < sizeof($arr['idE']); $i++) {
                                    $oi_id = $arr['idE'][$i];
                                    $temp = array(
                                       'oi_price' => $arr['priceE'][$i],
                                       'oi_qty' => $arr['qtyE'][$i],
                                       'oi_tester' => $arr['testerE'][$i]
                                    );
                                    $arr2=$this->m_order_item->get($oi_id);
									$this->m_order_item->update($temp , $oi_id);
                                }
                            }
                        }
                        if (isset($arr['itemId'])) {
                            if (sizeof($arr['itemId'])) {
                                for ($i=0; $i < sizeof($arr['itemId']) ; $i++) {
                                    $item = array(
                                        'orex_id' => $arr['orex_id'],
                                        'ty2_id' => $arr['itemId'][$i],
                                        'ni_id' => $arr['nico'][$i],
                                        'oi_price' => $arr['price'][$i],
                                        'oi_qty' => $arr['qty'][$i],
                                        'oi_tester' => $arr['tester'][$i]
                                    );
                                    $this->m_order_item->insert($item);
                                }
                            }
                        }
                        $this->load->model('m_order');
                        $order = array(
                            "or_note" => $arr['note'],
                            'pr_id' => $arr['pr_id']
                        );
                        $or = $this->m_order->update($order , $or_id);
                        //echo $or_id.'or_id =>'.$or;
                        $order_ext = array(
                            'or_dateline' => $arr['dateline'],
                            'or_wide' => $arr['wide'],
                            'or_finishdate' => $arr['finishdate'],
                            'or_shipcom' => $arr['sh_company'],
                            'or_shipopt' => $arr['sh_opt'],
                            'dec_id' => $arr['sh_declare'],
                            'or_traking' => $arr['traking']
                        );
                        if (isset($arr['currency'])) {
                            $order_ext['cu_id'] = $arr['currency'];
                        }
                        $this->load->model('m_order_ext');
                        $orex_id = $this->m_order_ext->update($order_ext , array('or_id' => $or_id));
						//recordLog($or_id , 15);
                        //echo "<br>Update => ".$orex_id;
                    }
                    $this->session->set_flashdata('success', 'Update Success');
                    redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    break;
    			case 'z11':
                //add order
                    if ($lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    $ver = 2;
    				if ($this->input->post()) {
                        $arr = $this->input->post();
                        $this->load->library('my_func');
                        $this->load->database();
                        $us_id=$this->my_func->scpro_decrypt($this->session->userdata('us_id'));
						// FIXME: ni ada error la pull
                        // if (!$this->checkStock($arr['itemId'] , $arr['nico'] , $arr['qty'] , $arr['tester'])) {
                        //     redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                        // }
                        $this->load->model('m_order');
                        if ($arr['client'] == -1) {
                            $cl = array(
                                'cl_name' => $arr['name'],
                                'cl_company' => $arr['company'],
                                'cl_tel' => $arr['tel'],
                                'cl_address' => $arr['address'],
                                'cl_email' => $arr['email'],
                                'cl_country' => $arr['country'],
                            );
                            $this->load->model('m_client');
                            $arr['client'] = $this->m_client->insert($cl);
                        }
                        $order = array(
                            "cl_id" => $arr['client'],
                            "us_id" => $this->my_func->scpro_decrypt($this->session->userdata('us_id')),
                            "or_date" => $arr['orderdate'],
                            "or_note" => $arr['note'],
                            "pr_id" => $arr['pr_id']
                        );
                        $or_id = $this->m_order->insert($order);

                        $order_ext = array(
                            'or_id' => $or_id,
                            'or_dateline' => $arr['dateline'],
                            'or_finishdate' => $arr['finishdate'],
                            'cu_id' => $arr['currency'],
                            'or_wide' => $arr['wide'],
                            'or_shipcom' => $arr['sh_company'],
                            "or_traking" => $arr['traking'],
                            'or_shipopt' => $arr['sh_opt'],
                            'dec_id' => $arr['sh_declare']
                        );
                        $this->load->model('m_order_ext');
                        $orex_id = $this->m_order_ext->insert($order_ext);
                        $this->load->model('m_order_item');
                        $this->load->model('m_barcode_item');
                        $this->load->model('m_finish_inv');

                        $sizeArr = sizeof($arr['itemId']);
                        for ($i=0; $i < $sizeArr ; $i++) {
                            $item = array(
                                'orex_id' => $orex_id,
                                'ty2_id' => $arr['itemId'][$i],
                                'ni_id' => $arr['nico'][$i],
                                'oi_price' => $arr['price'][$i],
                                'oi_qty' => $arr['qty'][$i],
                                'oi_tester' => $arr['tester'][$i]
                            );
                            $this->m_order_item->insert($item);

                        }
                        /*$this->load->model('m_shipping_note');
                        $shipping_note = array(
                            'sn_company' => $arr['sh_company'],
                            'sn_opt' => $arr['sh_opt'],
                            'sn_declare' => $arr['sh_declare'],
                            'sn_wide' => $arr['wide'],
                            'cl_id' => $arr['client']
                        );
                        $this->m_shipping_note->insert($shipping_note);*/
                        // if ($arr['pr_id'] != 4) {
                        //#email1
                            //$this->load->model('m_user');
                            // $sendToMail['us_id'] = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                            // $sendToMail['ver'] = $ver;
                            // $sendToMail['or_id'] = $or_id;
                            // $this->emailSendNew($sendToMail , $ver);
                        // }

                          $arr['arr'] = array(

                            "id" => $orex_id,
                             "username" => $this->my_func->scpro_decrypt($this->session->userdata('us_username')),
                        );

                        $email['fromName'] = "Ai System";
                        $email['fromEmail'] = "noreply@nastyjuice.com";
                        $email['toEmail'] = ' finance@nastyjuice.com , zul@nastyjuice.com , distribution@nastyjuice.com.my';
                        $email['subject'] = 'New Purchase Order #'.(120000+$or_id);
                        $email['html'] = true;
                        //$content=$this->load->view('/mail/send_email',$arr,true);
                        $email['msg'] =$this->load->view('/mail/send_email',$arr,true);
                        $this->sendEmail2($email);
						recordLog($or_id , 1);
                        $this->session->set_flashdata('success', 'New Order successfully added');
                        redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
    					break;
                    }
    			case 'z1':
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
    				$data['title'] = '<i class="fa fa-file-text"></i> Order Form';
    				$this->load->database();
    				$this->load->model('m_client');
                    $this->load->model('m_category');
                    $this->load->model('m_nico');
                    $arr['nico'] = $this->m_nico->get();
                    $arr['cat'] = $this->m_category->get(null , 'asc');
    				$arr['client'] = $this->m_client->get(null , 'asc');
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
                        $where = null;
                        if ($lvl == 5) {
                            $where = array('7' , '8' , '9' , '1');
                        }
                        if ($lvl == 9) {
                            $where = array('2' , '3' , '5' , '1');
                        }
    					$arr['lvl'] = $this->m_user->getLvl($where);
    					$arr['arr'] = array_shift($this->m_user->getAll($staffId));
    					$data['display'] = $this->load->view($this->parent_page.'/editStaff' , $arr , true);
    					$this->_show('display' , $data , $key);
    					break;
    				}
    			case 'c1':
                    if ($lvl != 1 && $lvl != 5 && $lvl != 9) {
                        redirect(site_url('order'),'refresh');
                    }
    				$data['title'] = '<i class="fa fa-file-text"></i> User Setting';
                    $this->load->library('my_func');
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
    				$where = null;
                    if ($lvl == 5) {
                        $where = array('7' , '8' , '9' , '1');
                    }
                    if ($lvl == 9) {
                        $where = array('2' , '3' , '5' , '1', '6', '8', '4');
                    }
                    $arr['lvl'] = $this->m_user->getLvl($where);
    				$data['display'] = $this->load->view($this->parent_page.'/addStaff' ,$arr , true);
		    		$this->_show('display' , $data , $key);
    				break;
                case 'k1':
                    //OrdSys 2.5.6
                    //Accounting Module
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($this->input->get('page')) {
                        $p = $this->input->get('page');
                    }else{
                        $p = 0;
                    }
                    $this->load->library('my_func');
                    $this->load->library('my_flag');
                    $this->load->database();
                    $this->load->model('m_order');
                    //echo $this->input->get("search").$this->input->get("filter");
                    //die();
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
                                    redirect(site_url("nasty_v2/dashboard/page/k1"),'refresh');
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
                        $ver = $this->m_order->orderCount(2);
                        $arr['arr1'] = $this->m_order->listOr(2 , 10 , $p);
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
                    $data['title'] = '<i class="fa fa-fw fa-edit"></i> Accounting</a>';
                    $data['display'] = $this->load->view($this->parent_page.'/acc/orderListAc' ,$arr , true);
                    $this->_show('display' , $data , 'k1');
                    break;
				case 'e1':
					// Parcel Management
					$page = 'barcode/barcodePage';
					$data['title'] = '<i class="fa fa-archive" aria-hidden="true"></i> Parcel Management</a>';
					$this->load->database();
					$this->load->model('m_order');
					$this->load->helper('parcel');
					$data['arr'] = $this->m_order->listOrROS(2 , 3 );
					$this->_show($page , $data , $key);
					break;
				case 'e2':
					$page = 'barcode/barcodeManage';
					if ($this->input->get('id')) {
						$id = $this->input->get('id');
						$this->load->library('my_func', NULL , 'mf');
						$id = $this->mf->scpro_decrypt($id);
						$arr = explode('|' , $id);
						if ($arr[1] == "parcel") {
							$id = $arr[0];
							unset($arr);
							$or_id = "#".(120000+$id);
							$data['title'] = '<i class="fa fa-book" aria-hidden="true"></i> '.$or_id.'</a>';
							$this->load->model('m_order');
							$this->load->model('m_category');
		                    $this->load->model('m_nico');
							$this->load->model('m_parcel', 'mp');
							$data['parcel'] = $this->mp->get_ext(array('or_id' => $id));
							$data['order'] = array_shift($this->m_order->getList_ext($id , 2));
							$data['nico'] = $this->m_nico->get();
							$data['cat'] = $this->m_category->get(null , 'asc');
							$this->_show($page , $data , $key);
						}else {
							$this->session->set_flashdata('error' ,  'Ops!! , wrong path');
							redirect(site_url('nasty_v2/dashboard/page/e1'));
						}
					}else{
						$this->session->set_flashdata('error' ,  'Ops!! , wrong path');
						redirect(site_url('nasty_v2/dashboard/page/a2'));
					}
					break;
				case 'e3':
					//Parcel Processing
					if ($this->input->get('key')) {
						$parcelProcess = $this->my_func->scpro_decrypt($this->input->get('key'));
						if ($parcelProcess == 'parcelprocess') {
							unset($parcelProcess);
							$arr = $this->input->post();
							$or_id = $this->my_func->scpro_decrypt($arr['or_id']);
							if (!isset($arr['qty'])) {
								$this->session->set_flashdata('warning' , 'Please Item Detail');
								redirect(site_url('nasty_v2/dashboard/page/e1?id='.$this->my_func->scpro_encrypt($or_id."|parcel")) , 'refresh');
							}
							$this->load->model('m_parcel', 'mp');
							$pa = array(
								'or_id' => $or_id,
								'us_id' => $this->my_func->scpro_decrypt($arr['us_id'])
							);
							$pa_id = $this->mp->insert($pa);
							unset($pa);
							$this->load->model('m_parcel_ext', 'mpe');
							$j = sizeof($arr['itemId']);
							for ($i = 0; $i < $j; $i++) {
								$pae = array(
									'pa_id' => $pa_id,
									'ty2_id' => $arr['itemId'][$i],
									'ni_id' => $arr['nico'][$i],
									'pa_tester' => $arr['tester'][$i],
									'pa_qty' => $arr['qty'][$i],
									'pa_batch' => $arr['batch'][$i],
									'pa_hologram' => $arr['hologram'][$i]
								);
								$this->mpe->insert($pae);
							}
                            // Generate Barcode image.
							$this->load->helper('barcode');
							$orderCode = (120000+$or_id);
							$pa_hex = dechex($pa_id);
							$temp = rand(0, 999);
							$barcode = $orderCode.'-'.$pa_hex.'-'.$temp;
							unset($orderCode);unset($pa_hex);unset($temp);
							if (set_barcode($barcode) == FALSE) {
								$this->session->set_flashdata('warning' , 'Ops! Someting wrong on generating barcode, contact your admin.<br /> Error Code : #e301');
							}else{
								$this->load->model('M_parcel_barcode', 'mpb');
								$link = 'assets/uploads/barcode/'.$barcode.'.jpg';
								$arrParcel = array(
									'pa_id' => $pa_id,
									'pb_link' => $link,
									'pb_code' => $barcode
								);
								$this->mpb->insert($arrParcel);
							}
							$this->session->set_flashdata('success' , 'Parcel Added');
							redirect(site_url('nasty_v2/dashboard/page/e2?id='.$this->my_func->scpro_encrypt($or_id."|parcel")) , 'refresh');
						}else{
							$this->session->set_flashdata('warning' , 'Ops! Wrong path.');
							redirect(site_url('nasty_v2/dashboard/page/e1') , 'refresh');
						}
					}else{
						$this->session->set_flashdata('warning' , 'Ops! Wrong path.');
						redirect(site_url('nasty_v2/dashboard/page/e1') , 'refresh');
					}
					break;
				case 'e4':
					//Delete parcel
					/* mode : 1 - Reset all
							  2 - delete parcel
					*/
					if ($this->input->get('key')) {
						//Delete parcel;
						$text = $this->my_func->scpro_decrypt($this->input->get('key'));
						$arr = explode('|' , $text);
						unset($text);
						if ($arr[1] == 'parcelDel') {
							$this->load->database();
							$this->load->model('m_parcel', 'mp');
							$this->load->model('m_parcel_ext' , 'mpe');
							$this->load->model('M_parcel_barcode', 'mpb');
							if ($arr[2] == 1) {
								$parcel = array(
									'or_id' => $arr[0]
								);
								$arrPa = $this->mp->getPa_idDel($parcel);
								foreach ($arrPa as $pakey) {
									$pa_id = $pakey->pa_id;
									$this->mpe->delete(array('pa_id' => $pa_id));
									$paBarcode = $this->mpb->get(array('pa_id' => $pa_id));
									if (sizeof($paBarcode) != 0) {
										$paBarcode = array_shift($paBarcode);
										unlink('./'.$paBarcode->pb_link);
									}
									unset($paBarcode);
									$this->mpb->delete(array('pa_id' => $pa_id));
								}
								unset($arrPa);
								$this->session->set_flashdata('success' , 'Reset process done.');
							}elseif ($arr[2] == 2) {
								$parcel = array(
									'pa_id' => $arr[0]
								);
								$this->mp->delete($parcel);
								$this->mpe->delete($parcel);
								$paBarcode = $this->mpb->get($parcel);
								if (sizeof($paBarcode) != 0) {
									$paBarcode = array_shift($paBarcode);
									unlink('./'.$paBarcode->pb_link);
								}
								unset($paBarcode);
								$this->mpb->delete($parcel);
								$this->session->set_flashdata('success' , 'delete parcel done.');
							}else {
								$this->session->set_flashdata('error' , 'Parcel Mode Error');
							}
							if(isset($_SERVER['HTTP_REFERER']))
								$url = $_SERVER['HTTP_REFERER'];
							else
								$url = site_url('nasty_v2/dashboard/page/e1');
							redirect($url , 'refresh');
						}else {
							$this->session->set_flashdata('error' , 'Ops Wrong Path');
							redirect(site_url('nasty_v2/dashboard/page/e1'));
						}
					}
					break;
					case 'f1':
						// timeline
						$page = 'timeline/tl';
						$data = NULL;
						if ($this->input->get('time')) {
							$this->load->library('my_func', NULL , 'mf');
							$or_id = $this->input->get('time');
							$or_id = $this->mf->scpro_decrypt($or_id);
							$this->load->database();
							$this->load->model('timeline/M_timeline', 'mtl');
							$data['tl'] = $this->mtl->getAll(array('tl.or_id' => $or_id));
							$data['or_id'] = $or_id;
						}else{
							$this->session->set_flashdata('warning' , 'Ops! wrong Path');
							redirect(site_url('nasty_v2/dashboard/page/a1'));
						}
						$this->_show($page , $data , $key);
						break;
					case 'g1':
                        // Display Deleted Log;
						// TODO: kena sambung buat pagination. add recordLog on upload payment.
						$page = 'cancellog/cancel';
						$data = NULL;
						$this->load->database();
						$this->load->model('m_order', 'mor');
						$this->load->library('my_func', NULL , 'mf');
						$data['list'] = $this->mor->listOr();
						$numPage = $this->uri->segment(5 , 1);
						$numPage --;
						$data['indexNum'] = $numPage * 10;
						$data['list'] = $this->mor->listOr(2 , 10 , $data['indexNum'] , 1);
						$data['tCount'] = $this->mor->orderCount(2 , 1);
						$this->load->library('pagination');
						$config['base_url'] = site_url('nasty_v2/dashboard/page/g1');
						$config['total_rows'] = $data['tCount'];
						$config['per_page'] = 10;
						$config['uri_segment'] = 5;
						$config['num_links'] = 3;
						$config['use_page_numbers'] = TRUE;
		    			$config['cur_tag_open'] = '<li><a class="current"><strong>';
						$config['cur_tag_close'] = '</strong></a></li>';
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['prev_tag_open'] = '<li>';
						$config['prev_tag_close'] = '</li>';
						$config['last_tag_open'] = '<li>';
						$config['last_tag_close'] = '</li>';
						$config['next_tag_open'] = '<li>';
						$config['next_tag_close'] = '</li>';
						$config['first_tag_open'] = '<li>';
						$config['first_tag_close'] = '</li>';
						$config['next_link'] = 'Next';
						$config['prev_link'] = 'Previous';;

						$this->pagination->initialize($config);

						$data['link'] = $this->pagination->create_links();

						$this->_show($page , $data , $key);
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
        public function edit_field_callback_cat($value, $primary_key)
        {
            return '<input type="color" name="ca_color" id="inputCa_color" value="'.$value.'" title="Pick Color" width = 10px>';
        }
    	public function callback_col_nico($value, $primary_key)
    	{
    		return '<input type="color" name="ni_color" id="inputNi_color" value="'.$value.'" title="Pick Color" width = 10px disabled>';
    	}
        public function callback_col_cat($value, $primary_key)
        {
            return '<input type="color" name="ca_color" id="inputNi_color" value="'.$value.'" title="Pick Color" width = 10px disabled>';
        }
        public function callback_before_insert_item($post_array)
        {
            if ($post_array['ca_id'] == -1) {
                return false;
            } else {
                return $post_array;
            }
        }
        public function callback_col_item($value, $primary_key)
        {
            $this->load->database();
            $this->load->model('m_category');
            $cat = $this->m_category->get($value);
            $text = '<span class="label" style="background-color: '.$cat->ca_color.';" ><strong>'.$cat->ca_desc.'</strong></span>';
            return $text ;
        }
        public function callback_col_item2($value, $primary_key)
        {
            $this->load->database();
            $this->load->model('m_type2');
            $this->load->model('m_category');
            $ty2 = $this->m_type2->get2($value);
            $arr = array('ca_id' => $ty2->ca_id );
            $cat = $this->m_category->get($arr);
            $text = $ty2->ty2_desc.'          <span class="label" style="background-color: '.$cat->ca_color.';" ><strong>'.$cat->ca_desc.'</strong></span>';
            return $text ;
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
                           if ($value == null || $value == '') {
                              continue;
                           }
    						$value = $this->my_func->scpro_encrypt($value);
    					}
                        if ($key == 'lvl') {
                            $value = $this->my_func->de($value, 1);
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

        public function updateFinish()
        {
    		if ($this->input->post()) {
                $this->load->database();
    			$this->load->model('m_barcode_item');
                $this->load->library('my_func');
    			$arr = $this->input->post();

                $id = $this->my_func->scpro_decrypt($arr['id']);

                $arr2 = array(
                    'bi_code' => $arr['barcode'],
                    'ty2_id' => $arr['type2'],
                    'ni_id' => $arr['nico']
                );

                $this->m_barcode_item->update($arr2 , $id);

                $this->session->set_flashdata('success', 'Item are successfully updated');
    			redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');

            }
            else {
                $this->session->set_flashdata('error', 'Item are not updated');
    			redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');
            }
        }

        public function addFinish()
        {
    		if ($this->input->post()) {
                $this->load->database();
    			$this->load->model('m_barcode_item');
    			$this->load->model('m_finish_inv');
                $this->load->library('my_func');
    			$arr = $this->input->post();

                $arr2 = array(
                    'bi_code' => $arr['barcode'],
                    'ty2_id' => $arr['type2'],
                    'ni_id' => $arr['nico']
                );

                $bi_id = $this->m_barcode_item->insert($arr2);
                $inv = array(
                    'bi_id' => $bi_id,
                );

                $this->m_finish_inv->insert($inv);

                $this->session->set_flashdata('success', 'Item are successfully added');
    			redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');

            }
            else {
                $this->session->set_flashdata('error', 'Item are not added');
    			redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');
            }
        }

        public function del_item()
        {
    		if ($this->input->post()) {


            $this->load->library('my_func');

            $id = $this->my_func->scpro_decrypt($this->input->post('id'));
            $us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));

            $this->load->database();

            $this->load->model('m_barcode_item');
            $this->load->model('m_finish_inv');

            $this->m_barcode_item->delete($id);

            $this->m_finish_inv->new_log(null,$id,$us_id,3);


            $this->m_finish_inv->delete($id);

            $this->session->set_flashdata('success', 'Item are successfully deleted');

                redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');
             }
            else {

            $this->session->set_flashdata('error', 'Item are not deleted');

    			redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');
            }

        }


        public function stockIn()
        {
            if ($this->input->post())
            {
                $this->load->database();
                $this->load->library('my_func');
                $this->load->model('m_finish_inv');

                $bi_id = $this->my_func->scpro_decrypt($this->input->post('id'));
                $us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));

                $qty = $this->input->post('qty');

                $this->m_finish_inv->new_log($qty,$bi_id,$us_id,1);

                $result = $this->m_finish_inv->stockIn($qty,$bi_id);

                if ($result) {
                    echo true;
                }
                else {
                    echo false;
                }

            }
        }

        public function stockOut()
        {
            if ($this->input->post())
            {
                $this->load->database();
                $this->load->library('my_func');
                $this->load->model('m_finish_inv');

                $bi_id = $this->my_func->scpro_decrypt($this->input->post('id'));
                $us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));

                $qty = $this->input->post('qty');

                $this->m_finish_inv->new_log($qty,$bi_id,$us_id,2);

                $result = $this->m_finish_inv->stockOut($qty,$bi_id);

                if ($result) {
                    echo true;
                }
                else {
                    echo false;
                }
            }
        }

        public function updateDanger()
        {
            if ($this->input->post()) {
                $this->load->database();

                $this->load->model('m_finish_inv');

                $id = $this->input->post('id');
                $danger = $this->input->post('danger');

                $arr = array('fi_danger' => $danger );
                $result = $this->m_finish_inv->update($arr , $id);

                if ($result) {
                    $this->session->set_flashdata('success', 'The danger zone item are successfully updated!!');
                    redirect(site_url('nasty_v2/dashboard/page/i2'),'refresh');
                }
                else {
                   $this->session->set_flashdata('error', 'The danger zone item not updated!! Please check again');
                    redirect(site_url('nasty_v2/dashboard/page/i2'),'refresh');
                }

            }
        }
        public function updateBarcode()
        {
            if ($this->input->post()) {
                $this->load->database();

                $this->load->model('m_barcode_item');

                $id = $this->input->post('id');
                $barcode = $this->input->post('barcode');

                $arr = array('bi_code' => $barcode );
                $result = $this->m_barcode_item->update($arr , $id);

                if ($result) {
                    $this->session->set_flashdata('success', 'The barcode item are successfully updated!!');
                    redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');
                }
                else {
                   $this->session->set_flashdata('error', 'The barcode item not updated!! Please check again');
                    redirect(site_url('nasty_v2/dashboard/page/i4'),'refresh');
                }

            }
        }


        public function updateQty1()
        {
            //redirect(site_url('nasty_v2/dashboard/page/i2'),'refresh');
            if ($this->input->post()) {

                 $sti_id = $this->input->post('sti_id');
                  $qty = $this->input->post('qty');
                $this->load->database();

                $this->load->library('my_func');
                $this->load->model('m_stock_inventory' , 'msi');
                $us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                $wh = array(
                                    'sti_id' => $sti_id

                                );
                //$result = $this->m_user->update($arr2 , $id);
                $this->msi->updateQty1($qty , $wh,$us_id);
                $this->session->set_flashdata('success', 'The order status was Updated!!');
                redirect(site_url('nasty_v2/dashboard/page/i2'),'refresh');
            }else{
                 $this->session->set_flashdata('error', 'The order status was not Updated!! Please check agai');
                redirect(site_url('nasty_v2/dashboard/page/i2'),'refresh');
            }
        }


        public function updatePr_id()
        {
             if ($this->input->post()) {
                $arr = $this->input->post();
                $this->load->database();
				$us_id = $arr['us_id'];
				$this->load->library('my_func', NULL , 'mf');
				$us_id = $this->mf->scpro_decrypt($us_id);
                $this->load->model('m_order');
                $this->load->model('m_order_ext');
                $id=$arr['id'];
                $arr2 = array(
                    "pr_id" => $arr['pr_id']
                );
                if(isset($arr['no']))
                {
                    $arr3 = array(
                    "or_trackno" => $arr['no']
                    );
                    $result1 = $this->m_order_ext->update($arr3 , $id);
                }
                if($this->m_order->update($arr2 , $id)){
					$this->load->model('timeline/M_timeline', 'mt');
					$array = array(
						'or_id' => $id,
						'pr_id' => $arr['pr_id'],
						'us_id' => $us_id
					);
					$this->mt->insert($array);
				}
                $this->session->set_flashdata('success', 'Order are successfully updated');
                redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
            }else{
                $this->session->set_flashdata('error', 'Order are not updated');
                redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
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
        public function uploadPaid()
        {
            if ($this->input->get('key')) {
                $this->load->library('my_func');
                $key = $this->my_func->scpro_decrypt($this->input->get('key'));
                if ($key == "betul") {
                    $this->load->database();
                    $this->load->model("m_order");
                    $this->load->model('m_picture');
                    $or_id = $this->my_func->scpro_decrypt($this->input->post('or_id'));
                    $result = $this->my_func->do_upload('./assets/uploads/img/');
                    $pi_id = null;
                    $success = array();
                    if (sizeof($result['success']) != 0) {
						$this->load->helper('timeline');
						recordLog($or_id , 18);
                        $m_pic = array();
                        foreach ($result['success'] as $filename => $detail) {
                                $m_pic = array(
                                    'pi_title' => $filename,
                                    'img_url' => $detail['file_name'],
                                    'ne_id' => $or_id
                                );
                                $success[] = $filename;
                        }
                        $this->m_order->update(array('or_paid' => 1),$or_id);
                        $this->change_pr_id2($or_id);

                        // this part for replace image if already uploaded.
                        /*if ($this->m_picture->getbyne_id($or_id)) {
                            $this->load->library('file');
                            $t = $this->m_picture->get(array("ne_id" => $or_id));
                            if (delete_files('./assets/uploads/img/'.$t->img_url)) {
                                $this->m_picture->update($m_pic , $t->pi_id);
                            }else{
                                $this->session->set_flashdata('error', 'Ops !! , Unable to Find The old Image');
                                delete_files('./assets/uploads/img/'.$m_pic['img_url']);
                            }
                        }else{*/
                            $this->m_picture->insert($m_pic);
                        //}
                    }
                    $i = sizeof($success);
                    $e = sizeof($result['error']);
                    if ($e == 0) {
                        $this->session->set_flashdata('success' , '<b>Well done!</b> You successfully send the picture.');

                            foreach ($result['success'] as $filename => $detail)
                            {
                                $arr['arr']  = array(
                                    'id' => $or_id,
                                    'img_url' => $detail['file_name'],

                                );

                            }

                            $email['fromName'] = "Ai System";
                            $email['fromEmail'] = "noreply@nastyjuice.com";
                            $email['toEmail'] = ' finance@nastyjuice.com , zul@nastyjuice.com ';
                            $email['subject'] =  $this->version.', Payment are already uploaded for Purchase Order #'.(120000+$or_id);
                            $email['html'] = true;
                            $content=$this->load->view('/mail/payment_email',$arr,true);
                            $email['msg'] =$content;


                            $result=$this->sendEmail2($email);

                    }elseif ($i == 0) {
                        $code = "<ul>";
                        foreach ($result['error'] as $filename => $errormsg) {
                            $code .= "<li> ".$filename." : ".$errormsg."
                            </li>";
                        }
                        $code = "<b>Oh snap!</b> Change a few things up and try submitting again.</br>" . $code;
                        $this->session->set_flashdata('error' , $code);
                    }else{
                        $code = "<ul>";
                        foreach ($result['error'] as $filename => $errormsg) {
                            $code .= "<li> ".$filename." : ".$errormsg."
                            </li>";
                        }
                        $code = "<b>Warning!</b> You successfully send the news but <b>some your image not looking too good<b>.</br>".$code;
                        $this->session->set_flashdata('warning' , $code);
                    }
                }
            }
            redirect('nasty_v2/dashboard/page/a1new','refresh');
        }


         public function change_pr_id3()
        {
            $or_id = $this->input->post('or_id');
            $pr_id = $this->input->post('pr_id');
			$us_id = $this->input->post('us_id');
			$this->load->library('my_func', NULL , 'mf');
			$us_id = $this->mf->scpro_decrypt($us_id);
            $this->load->database();
            $this->load->model('m_order');
			/*
          	1 - New Order
            2 - In Progress
            3 - Complete
            4 - Unconfirm
            5 - Cancel
            6 - Cancel In Progress
            7 - On Hold In Progress
            8 - ROS
            9 - DOC
            10 - RTS
            11 - Shipping
            12 - Arrived
            13 - Return */
            if($this->m_order->updateROS($pr_id, $or_id)){
                // NOTE: This section cant use by timeline_helpers. because it is get ajax.
				$this->load->model('timeline/M_timeline', 'mt');
				$array = array(
					'or_id' => $or_id,
					'pr_id' => $pr_id,
					'us_id' => $us_id
				);
				$this->mt->insert($array);
			}
            //redirect(site_url('nasty_v2/dashboard/page/a1new'),'refresh');
        }
        private function change_pr_id2($or_id = null)
        {

            if ($or_id != null) {
                $this->load->database();
                $this->load->model('m_order');

                $arr = $this->m_order->get($or_id , "pr_id");
                if ($arr->pr_id == 4) {
                    $this->m_order->update(array("pr_id" => 1) , $or_id);
                }
            }else{
                return false;
            }
        }

        function change_pr_id(){
			// NOTE: Ni unconfirm function is disable because ada error. and no recordLog
            if ($this->input->post('id')) {
                $this->load->library('my_func' , 'session');
                $id = $this->my_func->scpro_decrypt($this->input->post('id'));
                $this->load->database();
                $this->load->model('m_order');
                $sendToMail['us_id'] = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                $sendToMail['ver'] = 2;
                $sendToMail['or_id'] = $id;
                /*  1 - New Order
                    2 - In Progress
                    3 - Complete
                    4 - Unconfirm
                    5 - Cancel
                    6 - Cancel In Progress
                    7 - On Hold In Progress */
                switch ($this->input->post('pr_id')) {
                    case '1':
                        // change to 4
                        $arr = array(
                            'pr_id' => 4
                        );
                        break;
                    case '2':
                        // Change to 7
                        $arr = array(
                            'pr_id' => 7
                        );
                        break;
                    case '4':
                        // Change to 1
                        $arr = array(
                            'pr_id' => 1
                        );
                        break;
                    case '7':
                        // Change to 2
                        $arr = array(
                            'pr_id' => 2
                        );
                        break;
                }
                $betul = $this->m_order->update($arr , $id);
                $sendToMail['us_id'] = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                $sendToMail['ver'] = 2;
                $sendToMail['or_id'] = $id;
                switch ($this->input->post('pr_id')) {
                    case '1':
                        // change to 4
                        //#email2
                        $this->emailSendUnconfirm($sendToMail , $ver);
                        break;
                    case '2':
                        //#email3
                        $this->emailSendOnhold($sendToMail , $ver);
                        break;
                    case '4':
                        //#email1
                        $this->emailSendNew($sendToMail , $ver);
                        break;
                    case '7':
                        // Change to 2
                        //#email4
                        $arr = array(
                            'pr_id' => 2
                        );
                        break;
                }
                if($betul){
                    $this->session->set_flashdata('success', 'The order Confirmation was Updated!!');

                }else{
                    $this->session->set_flashdata('error', 'Ops!!! Someting wrong, Contact Jm');
                }
            }
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

        public function getAjaxSeries()
        {
            if ($this->input->post('ca')) {
                $ca_id = $this->input->post('ca');
                $this->load->database();

                $this->load->model('m_type2');

                if ($ca_id == -1) {
                      $type['cat'] = $ca_id;
                  } else {

                      $type['type2'] = $this->m_type2->getList($ca_id);


                      $type['cat'] = $ca_id;
                  }

                $this->load->view($this->parent_page."/ajax/getAjaxType2",$type );

            }

        }
        public function getAjaxDanger(Type $var = null)
        {
            $this->load->database();

            $this->load->model('m_finish_inv');
            $this->load->model('m_barcode_item');
            $this->load->library('my_func');

            $beid = $this->my_func->scpro_decrypt($this->input->post('be_id'));

            $page = $this->input->post('page');

            $arr['page'] = $page;

            $be_id = array('bi_id' => $beid );

            $arr['arr'] = $this->m_finish_inv->get($be_id);

			echo $this->load->view($this->parent_page. "/ajax/getAjaxDanger", $arr , true);

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
        public function getAjaxProItem()
        {
            $this->load->library("my_func");
            $arr = $this->input->post('key');
            $arr = $this->my_func->scpro_decrypt($arr);
            $arr = explode('|', $arr);
            $arr2 = array(
                    $arr[1] => 3
                );
            $this->load->database();
            $this->load->model('m_order_note');
            $rowChange = $this->m_order_note->update($arr2 , $arr[0]);
            $rowChange = ($rowChange == 0) ? false : true ;
            echo $rowChange;
        }
        function let21()
        {
            if ($this->input->post('key')) {
                $this->load->library('encrypt');
                $lock = "lnrfKjfdPRoxAwyiu9gluTjaZF7iadFi5EKPtlLYzF09m07+DhsMZP7T/wAbVRs9of+lz2Hc7b67hbfzm6185A==";
                $key = $this->input->post('key');
                if ($key == $this->encrypt->decode($lock, $key)) {
                    $this->load->view($this->parent_page."/valve");
                }
            }
        }
        public function sendEmail($email = null){
            if ($email != null && is_array($email)) {
                $this->load->library('email');

                $this->email->from($email['fromEmail'], $email['fromName']);
                if(isset($email['toEmail'])){
                    if (is_array($email['toEmail'])) {
                        foreach ($email['toEmail'] as $key => $toEmail) {
                            $this->email->to($toEmail);
                        }
                    }else{
                        $this->email->to($email['toEmail']);
                    }
                }else{
                    $this->session->set_flashdata('error', 'Please set to->email');
                    return false;
                }
                if (isset($email['toCc'])) {
                    if (is_array($email['toCc'])) {
                        foreach ($email['toCc'] as $key) {
                            $this->email->cc($key);
                        }
                    }else{
                        $this->email->cc($email['toCc']);
                    }
                }
                if (isset($email['toBcc'])) {
                    if (is_array($email['toBcc'])) {
                        foreach ($email['toBcc'] as $key) {
                            $this->email->bcc($key);
                        }
                    }else{
                        $this->email->bcc($email['toBcc']);
                    }
                }
                $this->email->subject($email['subject']);
                $this->email->message($email['msg']);
                if($this->email->send()){
                    $this->session->set_flashdata('info', "Successfully Send the Notification");
                }else{
                    $this->session->set_flashdata('Warning', "Unable To send The email");
                }
                //$msg = $this->email->print_debugger();

                return true;
            }
            return false;
        }

        public function sendEmail2($email = null){
            if ($email != null && is_array($email)) {
                $this->load->library('email');

                $this->email->from($email['fromEmail'], $email['fromName']);
                if(isset($email['toEmail'])){
                    if (is_array($email['toEmail'])) {
                        foreach ($email['toEmail'] as $key => $toEmail) {

                            $this->email->to($toEmail);
                            if (isset($email['toCc'])) {
                                    if (is_array($email['toCc'])) {
                                                foreach ($email['toCc'] as $key)         {
                                                    $this->email->cc($key);
                                                }
                                    }else{
                                        $this->email->cc($email['toCc']);
                                    }
                                }
                                if (isset($email['toBcc'])) {
                                    if (is_array($email['toBcc'])) {
                                        foreach ($email['toBcc'] as $key)
                                        {
                                            $this->email->bcc($key);
                                        }
                                    }else{
                                        $this->email->bcc($email['toBcc']);
                                    }
                                }
                                $this->email->subject($email['subject']);
                                $this->email->message($email['msg']);
                                if (isset($email['html'])) {
                                $this->email->set_mailtype('html');
                                }
                                $this->email->send();

                                return true;

                        }
                    }else{
                                $this->email->to($email['toEmail']);

                                if (isset($email['toCc'])) {
                                    if (is_array($email['toCc'])) {
                                                foreach ($email['toCc'] as $key)         {
                                                    $this->email->cc($key);
                                                }
                                    }else{
                                        $this->email->cc($email['toCc']);
                                    }
                                }
                                if (isset($email['toBcc'])) {
                                    if (is_array($email['toBcc'])) {
                                        foreach ($email['toBcc'] as $key)
                                        {
                                            $this->email->bcc($key);
                                        }
                                    }else{
                                        $this->email->bcc($email['toBcc']);
                                    }
                                }
                                $this->email->subject($email['subject']);
                                $this->email->message($email['msg']);
                                if (isset($email['html'])) {
                                $this->email->set_mailtype('html');
                                }
                                $this->email->send();

                                return true;
                    }
                }else{

                    $this->session->set_flashdata('error', 'Please set to->email');
                    return false;
                }



            }
            return false;
        }


        public function getAjaxcrud()
        {
            $this->load->library('encrypt');
            if ($this->input->get('kunci')) {
                if ("a94a8fe5ccb19ba61c4c0873d391e987982fbbd3" == $this->input->get('kunci')) {
                    $tab = $this->input->get('table');
                    echo $tab;
                    $this->_loadCrud();
                    $crud = new grocery_CRUD();
                    $crud->set_table($tab);
                    $output = $crud->render();
                    $this->load->view('crud' , $output , false);
                }
            }
        }

        public function getAjaxItem()
        {
            $this->load->database();
            $ca_id = $this->input->post('ca_id');
            $this->load->model('m_type2');
            if ($ca_id == -1) {
                $type['cat'] = $ca_id;
            } else {
                $type['type'] = $this->m_type2->get(array('ca_id' => $ca_id));
                $type['cat'] = $ca_id;
            }

            echo $this->load->view($this->parent_page."/ajax/getAjaxType", $type , true);
        }

        public function getAjaxItemList($parcel = 'Item')
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
			if ($parcel == 'parcel') {
				echo $this->load->view($this->parent_page."/ajax/getAjaxItemParcel", $temp , true);
			}else{
				echo $this->load->view($this->parent_page."/ajax/getAjaxItem", $temp , true);
			}
        }

        public function getAjaxInvItemList()
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
            echo $this->load->view($this->parent_page."/ajax/getAjaxInvItem", $temp , true);
        }

		public function getAjaxDelItem()
        {
            $oi_id = $this->input->post('oi_id');
            $this->load->database();
            $this->load->model('m_order_item');
            $row = $this->m_order_item->delete($oi_id);
            echo $row;
        }

        public function getAjaxUpload()
        {
            $this->load->library("my_func");
            $arr = $this->input->post();
            $this->load->database();
            $this->load->model('m_picture');
            $temp = array(
                "ne_id" => $this->my_func->scpro_decrypt($this->input->post('or_id'))
            );
            $arr['img'] = $this->m_picture->getPaid($temp);
            echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxUpload', $arr , TRUE);
        }

        public function getAjaxBarcode()
        {
            $this->load->database();

            // $this->load->model('m_finish_inv');
            $this->load->model('m_barcode_item');
            $this->load->library('my_func');

            $beid = $this->my_func->scpro_decrypt($this->input->post('be_id'));

            $page = $this->input->post('page');

            $arr['page'] = $page;

            $be_id = array('bi_id' => $beid );

            $arr['arr'] = $this->m_barcode_item->get($beid);

			echo $this->load->view($this->parent_page. "/ajax/getAjaxBarcode", $arr , true);
        }

        public function getAjaxTableItem()
        {
            $this->load->database();
                    $this->load->model('m_barcode_item');
                    $this->load->library("my_func");
                    $this->load->library('pagination');
                    $this->load->helper('array');

                    $like = null;
                    $filter = null;

                    if ($this->input->post("search") )
                    {
                            $search = $this->input->post("search");

                            if(strpos($search, ',') !== false)
                            {
                                $search = explode(',', $search);



                                $sizeArr = sizeof($search);

                                foreach ($search as $key => $value){
                                    $filter[] = $value;
                                }


                            }
                            else
                            {
                                $filter = array('bi.bi_code' => $search );
                            }

                    }

                    $limit_per_page = 10;

                    $page = $this->uri->segment(5,1);
                    $page--;

                    $arr['numPage'] = $page*10;
                    $arr['total'] = $this->m_barcode_item->count($filter,$like);



                    $arr['result'] = $this->m_barcode_item->get_curr($limit_per_page , $arr['numPage'] , $filter , $like);

                    $config['base_url'] = site_url('nasty_v2/dashboard/page/i2');
                    $config['total_rows'] = $arr['total'];
                    $config['per_page'] = $limit_per_page;
                    $config["uri_segment"] =5;

                    // custom paging configuration
                    $config['num_links'] = 3;
                    $config['use_page_numbers'] = TRUE;
                    $config['reuse_query_string'] = TRUE;

                    $config['cur_tag_open'] = '<li><a class="current"><strong>';
                    $config['cur_tag_close'] = '</strong></a></li>';
                    $config['num_tag_open'] = '&nbsp;<li>';
                    $config['num_tag_close'] = '</li>&nbsp;';
                    $config['prev_tag_open'] = '<li>';
                    $config['prev_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li>';
                    $config['last_tag_close'] = '</li>';
                    $config['next_tag_open'] = '<li>';
                    $config['next_tag_close'] = '</li>';
                    $config['first_tag_open'] = '<li>';
                    $config['first_tag_close'] = '</li>';
                    $config['next_link'] = 'Next';
                    $config['prev_link'] = 'Previous';
                    $this->pagination->initialize($config);
                    $arr["link"] = $this->pagination->create_links();

                    // $data['title'] = '<i class="fa fa-fw fa-edit"></i>Inventory</a>';
                    // $data['display'] = $this->load->view($this->parent_page.'/itemList', $arr , TRUE);
                    echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxTableItem',$arr,TRUE);
        }

        private function emailSendNew($arr = null , $ver = 1)
        {
            //unconfirm to new order;
            //#email1
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr['or_id'];
                $saleman = $this->m_user->getName($arr['us_id']);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = "zul@nastyjuice.com, finance@nastyjuice.com , distribution@nastyjuice.com.my";
                $email['subject'] =  $this->version." New Order #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : New Order
Salesman : ".$saleman."

(#Note : Once this link clicked, the Ai system will automaticaly change the order status into \"Processing Mode\".)
Print Order Link : ".site_url('order/printOrder1?id='.$this->my_func->scpro_encrypt($or_id))."&ver=".$ver."
Invoice Form : ".site_url('invoice/Invoice?id='.$this->my_func->scpro_encrypt($or_id))."&ver=".$ver."

Search Order Page : ".site_url()."
System Login : ".site_url('login')."

Sincerely,
Ai OrdSys System

Programmer
JauhMerah
jauhmerah@nastyjuice.com
Epul
epul@nastyjuice.com

                ";
                $this->sendEmail($email);
            }
        }

        private function emailSendUnconfirm($arr = null , $ver = 2)
        {
            //Confirm to Unconfirm;
            //#email2
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = "zul@nastyjuice.com, finance@nastyjuice.com , distribution@nastyjuice.com.my";
                $email['subject'] =  $this->version." Unconfirm #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : Unconfirm
Salesman : ".$saleman."

Please Note.
This order have been unconfirm by Salesman.

Search Order Page : ".site_url()."
System Login : ".site_url('login')."

Sincerely,
Ai System

Programmer
JauhMerah
jauhmerah@nastyjuice.com
Epul
epul@nastyjuice.com

                ";
                $this->sendEmail($email);
            }
        }
        private function emailSendOnhold($arr = null , $ver = 2)
        {
            //inProgress to On hold;
            //#email3
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = "zul@nastyjuice.com,finance@nastyjuice.com , distribution@nastyjuice.com";
                $email['subject'] =  $this->version." On Hold Order #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : On Hold Order
Salesman : ".$saleman."

Please Take Note!!!
This Order was On hold by its salesman.

Search Order Page : ".site_url()."
System Login : ".site_url('login')."

Sincerely,
Ai System

Programmer
JauhMerah
jauhmerah@nastyjuice.com
Epul
epul@nastyjuice.com

                ";
                $this->sendEmail($email);
            }
        }

        private function emailSendInProgress($arr = null , $ver = 2)
        {
            //On hold to inProgress;
            //#email1
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = "zul@nastyjuice.com,finance@nastyjuice.com , distribution@nastyjuice.com.my";
                $email['subject'] =  $this->version." In Progress Order #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : In Progress Order
Salesman : ".$saleman."

Please Take Note!!!
This Order was change to In-progress by its salesman.

Search Order Page : ".site_url()."
System Login : ".site_url('login')."

Sincerely,
Ai System

Programmer
JauhMerah
jauhmerah@nastyjuice.com
Epul
epul@nastyjuice.com

                ";
                $this->sendEmail($email);
            }
        }

        public function getAjaxGraph4()
        {
            $arr = $this->input->post();
            echo $this->load->view($this->parent_page.'/ajax/getAjaxGraph4', $arr, false);
        }

        public function getAjaxGraph5($box = null , $cu = 1)
        {
            //#graph5
            // flat rate usd 4.40
            // flat rate GBP 5.50
            $this->load->database();
            $this->load->model('m_order');
            $temp['box'] = $box;
            $arr['net'] = $this->m_order->getIncome(1);
            $arr['acc'] = $this->m_order->getIncome(1,1);
            $arr['net1'] = $this->m_order->getIncome(2);
            $arr['acc1'] = $this->m_order->getIncome(2,1);
            $arr['net2'] = $this->m_order->getIncome(3);
            $arr['acc2'] = $this->m_order->getIncome(3,1);
            $sizeNet = sizeof($arr['net']);
            if ($sizeNet != 0) {
                $temp['cu'] = $arr['net'][0]->cu_desc;
            }
            if ($sizeNet != 0) {
                for ($i = 0 ; $i < $sizeNet ; $i++) {
                    $data[$i]['date'] = $arr['net'][$i]->month."|".$arr['net'][$i]->year;
                    $data[$i]['net'] = $arr['net'][$i]->sales;
                    if (sizeof($arr['net1']) > ($i)) {
                        $data[$i]['net'] += $arr['net1'][$i]->sales * 4.4;
                    }
                    if (sizeof($arr['net2']) > ($i)) {
                        $data[$i]['net'] += $arr['net2'][$i]->sales * 5.5;
                    }
                    $data[$i]['acc'] = 0;
                    if (sizeof($arr['acc']) != 0 ) {
                        if ($arr['net'][$i]->month == $arr['acc'][0]->month && $arr['net'][$i]->year == $arr['acc'][0]->year) {
                            $data[$i]['acc'] += $arr['acc'][0]->sales;
                            array_shift($arr['acc']);
                        } else {
                            $data[$i]['acc'] += 0;
                        }
                    }
                    if (sizeof($arr['acc1']) != 0 ) {
                        if ($arr['net1'][$i]->month == $arr['acc1'][0]->month && $arr['net1'][$i]->year == $arr['acc1'][0]->year) {
                            $data[$i]['acc'] += $arr['acc1'][0]->sales * 4.4;
                            array_shift($arr['acc1']);
                        } else {
                            $data[$i]['acc'] += 0;
                        }
                    }
                    if (sizeof($arr['acc2']) != 0 ) {
                        if ($arr['net2'][$i]->month == $arr['acc2'][0]->month && $arr['net2'][$i]->year == $arr['acc2'][0]->year) {
                            $data[$i]['acc'] += $arr['acc2'][0]->sales * 5.5;
                            array_shift($arr['acc2']);
                        } else {
                            $data[$i]['acc'] += 0;
                        }
                    }
                }
                $size = sizeof($data);
                if ($size <= 12) {
                    for ($j=($size); $j < 12 ; $j++) {
                        $data[$j]['date'] = ($j+1)."|2017";
                        $data[$j]['net'] = 0;
                        $data[$j]['acc'] = 0;
                    }
                }
            }else{
                $data = null;
            }
            $temp['data'] = $data;
            unset($data);
            echo $this->load->view($this->parent_page.'/ajax/getAjaxGraph5', $temp, false);
        }

        public function cancelConfirm()
        {
            $this->load->database();
            $this->load->library('my_func');
            if ($this->input->post('or_id') && $this->input->get("cancel")) {
                if ($this->my_func->scpro_decrypt($this->input->get("cancel")) == "cancel") {
                $this->load->library('my_func');
                $or_id = $this->my_func->scpro_decrypt($this->input->post('or_id'));
				$this->load->helper('timeline');
				$tl_id = recordLog($or_id , 14);
                $msg = $this->input->post('msg');
				cancelRequest($tl_id , $msg );
                $this->load->model('m_user');
                //$or_id = $arr->or_id;
                $ver = $this->input->post('ver');
                $saleman = $this->m_user->get($this->input->post('us_id'));
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = $saleman->us_email;
                $email['toEmail'] = 'it@nastyjuice.com, zul@nastyjuice.com , finance@nastyjuice.com';
                $email['subject'] =  $this->version." Request for Cancel #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : Request for Cancel
Salesman : ".$saleman->us_username."

Reason : ".$this->input->post('msg')."

Click This Link to accept the request.
".site_url('order/deleteOrder?del='.$this->input->post('or_id'))."

Print Order Link : ".site_url('order/printOrder1?id='.$this->my_func->scpro_encrypt($or_id))."&ver=".$ver."

Search Order Page : ".site_url()."
System Login : ".site_url('login')."

Sincerely,
Ai System

Programmer
JauhMerah
jauhmerah@nastyjuice.com
Epul
epul@nastyjuice.com

                ";
                $this->sendEmail($email);
                }
            }
            $this->session->set_flashdata('success', 'Success Send the Request');
            redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
        }
        public function getAjaxDone()
        {
            if ($this->input->post('or_id')) {
                $this->load->library('my_func');
                $this->load->database();
				//$this->load->helper('time');
                $or_id = $this->my_func->scpro_decrypt($this->input->post('or_id'));
				$us_id = $this->input->post('us_id');
				$us_id = $this->my_func->scpro_decrypt($us_id);
                $this->load->model('m_order');
                $arr = array(
                    "or_acc" => 1
                );
				if ($this->m_order->update($arr, $or_id)) {
					$this->load->model('timeline/M_timeline', 'mt');
					$array = array(
						'or_id' => $or_id,
						'pr_id' => 16,
						'us_id' => $us_id
					);
					$this->mt->insert($array);
				}
            }
        }

        public function getAjaxCancel()
        {
            if ($this->input->post('or_id')) {
                $this->load->library('my_func');
                $this->load->database();
                $or_id = $this->my_func->scpro_decrypt($this->input->post('or_id'));
				$us_id = $this->input->post('us_id');
				$us_id = $this->my_func->scpro_decrypt($us_id);
                $this->load->model('m_order');
                $arr = array(
                    "or_acc" => 0
                );
				if ($this->m_order->update($arr, $or_id)) {
					$this->load->model('timeline/M_timeline', 'mt');
					$array = array(
						'or_id' => $or_id,
						'pr_id' => 17,
						'us_id' => $us_id
					);
					$this->mt->insert($array);
				}
            }
        }

        public function getAjaxDelImg()
        {
            $pi_id = $this->input->post("pi_id");
			$or_id = $this->input->post('or_id');
			$this->load->library('my_func', NULL , 'mf');
			$or_id = $this->mf->scpro_decrypt($or_id);
			// FIXME: Record log ada problem. kena fix. klu enable. gmbar xleh delete.
			//$log = recordLog($or_id , 19);
            $this->load->database();
            $this->load->model("m_picture");
            $img = $this->m_picture->get($pi_id);
            $this->load->helper('file');
            if (unlink('./assets/uploads/img/'.$img->img_url)) {
                $this->m_picture->delete($pi_id);
                echo "true";
            }else{
                echo "false";
            }
        }
        public function getAjaxImg()
        {
            $this->load->library("my_func");
            $ne_id = $this->my_func->scpro_decrypt($this->input->post("or_id"));
            $this->load->database();
            $this->load->model("m_picture");
            $arr['img'] = $this->m_picture->getPaid(array("ne_id" => $ne_id));
            echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxImg', $arr , TRUE);
        }

        public function getAjaxColor()
        {
            $ca_id = $this->input->post("ca");

            $this->load->database();
            $this->load->model("m_type2");

            $arr['color'] = $this->m_type2->get(array("ca_id" => $ca_id));
            echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxColor', $arr , TRUE);

        }

        public function getAjaxColor2()
        {
            $ca_id = $this->input->post("ca");

            $this->load->database();
            $this->load->model("m_type2");

            $arr['color'] = $this->m_type2->get(array("ca_id" => $ca_id));
            echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxColor2', $arr , TRUE);

        }

        public function getAjaxQtyColumn()
        {
            $this->load->library("my_func");
            $this->load->database();
            $this->load->model("m_barcode_item");

            $bi_id = $this->my_func->scpro_decrypt($this->input->post("id"));
            $arr['key'] = $this->m_barcode_item->get5($bi_id);
            $arr['n'] = $this->input->post("n");

            echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxQtyColumn', $arr , TRUE);


        }
         public function getAjaxNoti()
        {
            $arr = $this->input->post();
            $this->load->database();

            $this->load->model('m_barcode_item');

            $ty2_id = $this->input->post("type");
            $nico = $this->input->post("nico");


            $w = array(
                    'ty2.ty2_id' => $ty2_id,
                    'ni.ni_id' => $nico
            );



            $arr1['arr'] = $this->m_barcode_item->get2($w) ;

            echo $this->load->view($this->parent_page."/ajax/getAjaxNoti",$arr1, true);
        }

        public function testqr()
        {
            $this->load->library('qrgen');
            echo $this->qrgen->gen("test jauhmerh" , 'jm');
        }
        public function checkStock($id , $nico , $qty , $tester)
        {
            $this->load->library('my_func');
            $status = true;
            $msg = "";
            $this->load->model('m_barcode_item' , 'mbi');
            $arr = $this->mbi->get2();
            for ($i=0; $i < sizeof($id); $i++) {
                $w = array(
                    'ty2.ty2_id' => $id[$i],
                    'ni.ni_id' => $nico[$i]
                );
                $temp = array_shift($this->mbi->get1($w));
                if (sizeof($temp) != 0) {
                    $qty1 = $qty[$i] + $tester[$i];
                    if ($temp->fi_qty - $qty1 < 0 ) {
                        // klu qty xckup;
                        $msg = $msg."<strong>Insufficient Quantity</strong> : ".$temp->ty2_desc." - ".$temp->ca_desc." > ".$temp->ni_mg."mg</br>";
                        $status = false;
                    }
                }else{
                    // klu xda dlm database;
                    $msg = $msg."<strong>Item Not Registered</strong> : Item Code ".$this->my_func->en($id[$i])." Nico Id ".$nico[$i]."</br>";
                    $status = false;
                }
            }
            if ($msg != '') {
                $this->session->set_flashdata('error', $msg);
            }
            return $status;
        }
         public function checkStock2($id , $nico , $qty , $tester)
        {
            $this->load->library('my_func');
            $status = true;
            $msg = "";
            $this->load->model('m_stock_inventory' , 'msi');
            $arr = $this->msi->get2();
            for ($i=0; $i < sizeof($id); $i++) {
                $w = array(
                    'sti.ty2_id' => $id,
                    'sti.ni_id' => $nico
                );
                $temp = array_shift($this->msi->get2($w));
                if (sizeof($temp) != 0) {
                    $qty1 = $qty[$i] + $tester[$i];
                    if ($temp->sti_total - $qty1 < 0 ) {
                        // klu qty xckup;
                        $msg = $msg."<strong>Insufficient Quantity</strong> : ".$temp->ty2_desc." - ".$temp->ca_desc." > ".$temp->ni_mg."mg</br>";
                        $status = false;
                    }
                }else{
                    // klu xda dlm database;
                    $msg = $msg."<strong>Item Not Registered</strong> : Item Code ".$this->my_func->en($id[$i])." Nico Id ".$nico[$i]."</br>";
                    $status = false;
                }
            }
            if ($msg != '') {
                $this->session->set_flashdata('error', $msg);
            }
            return $status;
        }
        private function _checkStockUpdate($oi_id = null , $change = null)
        {
            // 'oi_price' => $arr['priceE'][$i],
            // 'oi_qty' => $arr['qtyE'][$i],
            // 'oi_tester' => $arr['testerE'][$i]
            $this->load->database();
            $this->load->model('m_order_item' , 'moi');
            $this->load->model('m_stock_inventory' , 'msi');
            $data = $this->moi->get($oi_id);
            $inv = $this->msi->get(array('ty2_id' => $data->ty2_id , 'ni_id' => $data->ni_id));
            if ($change['oi_qty'] != $data->oi_qty || $change['oi_qty'] != $data->oi_tester) {
                $diff = 0 ;
                $diff += $change['oi_qty'] - $data->oi_qty;
                $diff += $change['oi_tester'] - $data->oi_tester;
                if ($diff == 0) {
                    return true;
                }
                if ($diff > 0) {
                    $bal = $inv->sti_total - $diff;
                    if ($bal >= 0) {
                        if($this->msi->update(array('sti_total' => $bal) , $inv->sti_id)){
                            return true;
                        }else{
                            echo "Error #a121_1";
                            die();
                        }
                    }else{
                        return false;
                    }
                }else{
                    $bal = $inv->sti_total + (-1 * $diff);
                    if($this->msi->update(array('sti_total' => $bal) , $inv->sti_id)){
                        return true;
                    }else{
                        echo "Error #a121_2";
                        die();
                    }
                }
            }else{
                return true;
            }
        }


		public function getAjaxGraph()
        {
            $this->load->database();
            $this->load->model('m_item');
            $arr['arr'] = $this->m_item->totalByOrder();
            echo $this->load->view($this->parent_page.'/ajax/getAjaxGraph', $arr, false);
        }

        public function getAjaxGraph2()
        {
            $arr1 = $this->input->post();
            $this->load->database();
            $this->load->model('m_item');
            $this->load->model('m_nico');
            $arr['arr'] = $this->m_item->totalByFlavor($arr1['year1'] , $arr1['month1'] , $arr1['client'] , $arr1['mg'], $arr1['country']);
            //echo $this->load->view($this->parent_page.'/ajax/getAjaxGraph2', $arr , false);
			echo "<pre>";
			print_r($arr);
			echo "</pre>";
        }

		public function productionXdistribution()
		{
			if ($this->input->get('page')) {
				$p = $this->input->get('page');
			}else{
				$p = 0;
			}
			 if ($this->input->get('e')) {
				$e = $this->input->get('e');
			}else{
				$e = 0;
			}

			if ($this->input->get('page2')) {
				$p2 = $this->input->get('page2');
			}else{
				$p2 = 0;
			}
			 if ($this->input->get('e2')) {
				$e2 = $this->input->get('e2');
			}else{
				$e2 = 0;
			}

			if ($this->input->get('page3')) {
				$p3 = $this->input->get('page3');
			}else{
				$p3 = 0;
			}
			 if ($this->input->get('e3')) {
				$e3 = $this->input->get('e3');
			}else{
				$e3 = 0;
			}
			$this->load->database();
			$this->load->library('my_func');
			$this->load->library('my_flag');
			$this->load->model('m_order');
			$this->load->model('m_order_process');

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
					$arr['arr1'] = $this->m_order->listOrROS($ver , 1 , null , null , 0 , $where);
					 $arr['arr2'] = $this->m_order->listOrROS($ver , 2 , null , null , 0 , $where);
					 $arr['arr3'] = $this->m_order->listOrROS($ver , 3 , null , null , 0 , $where);

				}else{
					$arr['arr1'] = $this->m_order->listSearch(2 , null , null , 0 , $where);
					//$arr['arr2'] = $this->m_order->listOr($ver , null , null , 0 , $where);
				}
			} else {
				$ver = $this->m_order->orderCountROS(2, 1);
				$ver2 = $this->m_order->orderCountROS(2, 2);
				$ver3 = $this->m_order->orderCountROS(2, 3);

				$arr['arr1'] = $this->m_order->listOrROS(2 , 1 , 10 , $p);
				$arr['arr2'] = $this->m_order->listOrROS(2 , 2 , 10 , $p2);
				$arr['arr3'] = $this->m_order->listOrROS(2 , 3 , 10 , $p3);
				$result1 = sizeof($arr['arr1']);
				$result2 = sizeof($arr['arr2']);
				$result3 = sizeof($arr['arr3']);

				$arr['page'] = $p;
				$arr['e'] = $e;
				$arr['page2'] = $p2;
				$arr['e2'] = $e2;
				$arr['page3'] = $p3;
				$arr['e3'] = $e3;

				$arr['total'] = $ver;
				$arr['total2'] = $ver2;
				$arr['total3'] = $ver3;

				$arr['row'] = $result1;
				$arr['row2'] = $result2;
				$arr['row3'] = $result3;
				$arr['lvl'] = $this->m_order_process->getLvl(1);
				$arr['lvl2'] = $this->m_order_process->getLvl(3);
				$arr['lvl3'] = $this->m_order_process->getLvl(2);
			}
			return $this->load->view($this->parent_page.'/ROSlist2', $arr , TRUE);
		}
	}
?>
