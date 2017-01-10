<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
	   	var $parent_page = "nasty_v2/dashboard";
	   	var $old_page = "dashboard";
        var $version = "OrdYs v2.3.0 Alpha";
        var $imgUploc = "/assets/uploads/img/";

	    function __construct() {
	        parent::__construct();
	        $this->load->library('session');
	    }
	
	    function index() {
	        $this->page('a1');
	    }

	    public function testpage()
	    {
	    	
            $this->load->view('test');
	    }
          public function dummyInvoice()
        {
        
            $html =$this->load->view($this->parent_page.'/orderDummy' , '' , true); 
            echo $html;
        }
          public function Invoice()
        {
        
            $html =$this->load->view($this->parent_page.'/orderInvoice' , '' , true); 
            echo $html;
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

	   function pdfPrint($html = "<h1>Hello World</h1>"){
	    	$this->load->library("Pdf");
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
	        // Add a page
	        $pdf->AddPage();
	        $pdf->writeHTML($html, true, false, true, false, '');
	        $pdf->Output();
	    }

        public function formPrint($or_id = null)
        {
            //if ($or_id != null || $this->input->get('key')) {
                $html = $this->load->view($this->parent_page.'/printPdf/printForm' , '' , true);            
                //$this->pdfPrint($html);
                echo $html;
            //}
        }

        public function testEmail()
        {
            $email['fromEmail'] = 'jauhmerah@nastyjuice.com';
            $email['fromName'] = 'Jauhmerah';
            $email['toEmail'] = 'jauhmerah@gmail.com';
            $email['subject'] = 'test Email system';
            $email['msg'] = 'Test jadi';
            $this->sendEmail($email);
            $this->page('a1');
        }


	    public function page($key)
    	{
    		//$arr = $this->input->get();
    		$this->_checkSession();
            $lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    		switch ($key) {
                case "x1" :// dashboard
                        //start added
                        $this->load->database();
                        $this->load->model('m_order');
                         
                        $arr['neworder'] = $this->m_order->countOrderType($num=1);
                        $arr['inprogress'] = $this->m_order->countOrderType($num=2);
                        $arr['complete'] = $this->m_order->countOrderType($num=3);
                        $arr['totalOrder'] = $this->m_order->countOrderType($num=0);
                        $arr['totalProfit'] = $this->m_order->totalProfit();
                        //end added

                        $data['title'] = '<i class="fa fa-pencil"></i>Main Page</a>';
                        $data['display'] = $this->load->view($this->parent_page.'/dashboard' ,$arr, true);
                        $this->_show('display' , $data, $key);
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
                case 'a1':
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    $this->load->database();
                    $this->load->model('m_order');
                    $arr['vernew'] = $this->m_order->orderCount(2);
                    $arr['verold'] = $this->m_order->orderCount(1) + $this->m_order->orderCount(0);
                    $data['title'] = '<i class="fa fa-fw fa-edit">Switchover</i> </a>';
                    $data['display'] = $this->load->view($this->parent_page.'/switch_ver' ,$arr, true);
                    $this->_show('display' , $data , $key);
                    break;
                break;
    			case 'a1new':
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
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i> Production</a>';
    				$data['display'] = $this->load->view($this->parent_page.'/orderList1' ,$arr , true);
    				$this->_show('display' , $data , 'a1');
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
                        $ver = 1;
                        if ($this->input->get('ver')) {
                            $ver = $this->input->get('ver');
                        }
                        $this->m_order_ext->update(array("or_finishdate" => $finish), array('or_id' => $or_id));
                        $row = $this->m_order->update(array('pr_id' => 3) , $or_id);
                        if ($row == 0) {
                            $this->session->set_flashdata('warning', 'Ops!! Unable to update the order status...');
                        } else {
                            $this->session->set_flashdata('success', 'The order are completed. Please print the D.O. form before shipping.');
                            $email['fromName'] = "Ai System";
                            $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                            $email['toEmail'] = array('0' => "faeiz@nastyjuice.com", '1' => "account@nastyjuice.com" , '2' => 'hairi@nastyjuice.com');
                            $email['subject'] = "Order #".((10000*$ver)+100000+$or_id)." Completed";
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
                        $result = $this->m_order->update(array('pr_id' => 2) , $or_id);
                        $orCode = "#".(100000+$or_id);
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
                    if ($lvl == 4) {
                        redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    }
                    if ($this->input->get('mode')) {
                        $temp['mode'] = $this->input->get('mode');                 
                    }                    
	    			$this->load->database();
	    			$this->load->model('m_order');  
                    $this->load->library('l_label');
    				$temp['arr'] = $this->m_order->getList_ext(null ,1, 1 , 1 , 0);
    				$temp['arr1'] = $this->m_order->getList_ext(null ,1, 1 , 2 , 0);
                    $temp['arrV'] = $this->m_order->getList_ext(null ,2, 1 , 1 , 0);
                    $temp['arrV1'] = $this->m_order->getList_ext(null ,2, 1 , 2 , 0);
                    $temp['arrHold'] = $this->m_order->getList_ext(null ,2, 1 , 7 , 0);
    				$data['title'] = '<i class="fa fa-fw fa-edit"></i>Order List</a>';
    				$data['display'] = $this->load->view($this->parent_page.'/productionOrder', $temp , TRUE);
    				$this->_show('display' , $data , $key);
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
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
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
                case 'z121':
                    //edit order
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    if ($this->input->post() && $this->input->get('key')) {
                        $arr = $this->input->post();
                        $or_id = $this->my_func->scpro_decrypt($this->input->get('key'));
                        $this->load->database();
                        $this->load->model('m_order_item');
                        if (isset($arr['idE'])) {
                            if (sizeof($arr['idE']) != 0) {
                                for ($i=0; $i < sizeof($arr['idE']); $i++) { 
                                    $oi_id = $arr['idE'][$i];
                                    $temp = array(
                                       'oi_price' => $arr['priceE'][$i],
                                       'oi_qty' => $arr['qtyE'][$i],
                                       'oi_tester' => $arr['testerE'][$i]
                                    );
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
                            "or_sendDate" => $arr['sendDate'],
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
                            'dec_id' => $arr['sh_declare']
                        );
                        if (isset($arr['currency'])) {
                            $order_ext['cu_id'] = $arr['currency'];
                        }                        
                        $this->load->model('m_order_ext');                        
                        $orex_id = $this->m_order_ext->update($order_ext , array('or_id' => $or_id));
                        //echo "<br>Update => ".$orex_id;                         
                    }
                    $this->session->set_flashdata('success', 'Update Success');
                    redirect(site_url('nasty_v2/dashboard/page/a1'),'refresh');
                    break;
    			case 'z11':
                //add order
                    if ($lvl == 2 || $lvl == 3) {
                        redirect(site_url('nasty_v2/dashboard/page/a2'),'refresh');
                    }
                    $ver = 2;
    				if ($this->input->post()) {
                        $arr = $this->input->post();
                        $this->load->library('my_func');
                        $this->load->database();
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
                            "or_sendDate" => $arr['sendDate'],
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
                            'or_shipopt' => $arr['sh_opt'],
                            'dec_id' => $arr['sh_declare']                            
                        );
                        $this->load->model('m_order_ext');                        
                        $orex_id = $this->m_order_ext->insert($order_ext);                        
                        $this->load->model('m_order_item');
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
                            echo $this->m_order_item->insert($item);
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
                        if ($arr['pr_id'] != 4) {
                            $this->load->model('m_user');
                        $saleman = $this->m_user->getName($this->my_func->scpro_decrypt($this->session->userdata('us_id')));
                        $email['fromName'] = "Ai System";
                        $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                        $email['toEmail'] = "abun@nastyjuice.com";
                        $email['subject'] = "New Order #".(120000+$or_id);
                        $email['msg'] = "
Order Detail

Order No : #".(120000+$or_id)."
Order Status : New Order
Salesman : ".$saleman."
Order Date : ".$arr['orderdate']."
Due Date : ".$arr['dateline']."

(#Note : Once this link clicked, the Ai system will automaticaly change the order status into \"Processing Mode\".)
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
    					$arr['lvl'] = $this->m_user->getLvl();
    					$arr['arr'] = $this->m_user->getAll($staffId);
    					$data['display'] = $this->load->view($this->parent_page.'/editStaff' , $arr , true);
    					$this->_show('display' , $data , $key); 
    					break;
    				}    				
    			case 'c1':
                    if ($lvl != 1) {
                        redirect(site_url('order'),'refresh');
                    }
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
                        if ($this->m_picture->getbyne_id($or_id)) {
                            $this->load->library('file');
                            $t = $this->m_picture->get(array("ne_id" => $or_id));
                            if (delete_files('./assets/uploads/img/'.$t->img_url)) {
                                $this->m_picture->update($m_pic , $t->pi_id);
                            }else{
                                $this->session->set_flashdata('error', 'Ops !! , Unable to Find The old Image');
                                delete_files('./assets/uploads/img/'.$m_pic['img_url']);
                            }                            
                        }else{
                            $this->m_picture->insert($m_pic);
                        }                        
                    }
                    $i = sizeof($success);
                    $e = sizeof($result['error']);
                    if ($e == 0) {
                        $this->session->set_flashdata('success' , '<b>Well done!</b> You successfully send the picture.');
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

        private function change_pr_id2($or_id = null)
        {
            //utk upload image part
            if ($or_id != null) {
                $this->load->database();
                $this->load->model('m_order');
                /*  1 - New Order
                    2 - In Progress
                    3 - Complete
                    4 - Unconfirm
                    5 - Cancel
                    6 - Cancel In Progress
                    7 - On Hold In Progress */
                $arr = $this->m_order->get($or_id , "pr_id");
                if ($arr->pr_id == 4) {
                    $this->m_order->update(array("pr_id" => 1) , $or_id);
                }                
            }else{
                return false;
            }
        }
        function change_pr_id(){
            if ($this->input->post('id')) {
                $this->load->library('my_func' , 'session');
                $id = $this->my_func->scpro_decrypt($this->input->post('id'));
                $this->load->database();
                $this->load->model('m_order');
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
                if($this->m_order->update($arr , $id)){
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
		function _checkLvl($page = null)
		{			
			//$this->load->library('my_func');
			$lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
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
            echo $this->load->view($this->parent_page."/ajax/getAjaxItem", $temp , true);
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
            echo $this->load->view('nasty_v2/dashboard/ajax/getAjaxUpload', $this->input->post(), TRUE);
        }

        private function emailSendNew($arr = null , $ver = 1)
        {
            //unconfirm to new order;
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;                
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = array('0' => "faeiz@nastyjuice.com", '1' => "account@nastyjuice.com" , '2' => 'hairi@nastyjuice.com' , '3' => 'abun@nastyjuice.com');
                $email['subject'] = "New Order #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : New Order
Salesman : ".$saleman."
Order Date : ".$arr['orderdate']."
Due Date : ".$arr['dateline']."

(#Note : Once this link clicked, the Ai system will automaticaly change the order status into \"Processing Mode\".)
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

        private function emailSendUnconfirm($arr = null , $ver = 1)
        {
            //Confirm to Unconfirm;
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;                
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = array('0' => "faeiz@nastyjuice.com", '1' => "account@nastyjuice.com" , '2' => 'hairi@nastyjuice.com' , '3' => 'abun@nastyjuice.com');
                $email['subject'] = "Unconfirm #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : Unconfirm
Salesman : ".$saleman."
Order Date : ".$arr['orderdate']."
Due Date : ".$arr['dateline']."

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
        private function emailSendOnhold($arr = null , $ver = 1)
        {
            //inProgress to On hold;
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;                
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = array('0' => "faeiz@nastyjuice.com", '1' => "account@nastyjuice.com" , '2' => 'hairi@nastyjuice.com' , '3' => 'abun@nastyjuice.com');
                $email['subject'] = "On Hold Order #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : On Hold Order
Salesman : ".$saleman."
Order Date : ".$arr['orderdate']."
Due Date : ".$arr['dateline']."

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

        private function emailSendInProgress($arr = null , $ver = 1)
        {
            //On hold to inProgress;
            if ($arr != null) {
                $this->load->model('m_user');
                $this->load->library('my_func');
                $or_id = $arr->or_id;                
                $saleman = $this->m_user->getName($arr->us_id);
                $email['fromName'] = "Ai System";
                $email['fromEmail'] = "nstylabc@sirius.sfdns.net";
                $email['toEmail'] = array('0' => "faeiz@nastyjuice.com", '1' => "account@nastyjuice.com" , '2' => 'hairi@nastyjuice.com' , '3' => 'abun@nastyjuice.com');
                $email['subject'] = "In Progress Order #".((10000*$ver)+100000+$or_id);
                $email['msg'] = "
Order Detail

Order No : #".((10000*$ver)+100000+$or_id)."
Order Status : In Progress Order
Salesman : ".$saleman."
Order Date : ".$arr['orderdate']."
Due Date : ".$arr['dateline']."

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
	}
	        
?>