<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
 	
 	var $parent_page = "order";
 	var $version = "Nasty Process System v2.2.4 Alpha";
	public function __construct()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		parent::__construct();
		$this->load->library('session');
		$this->load->library('my_func');
	}
	public function index2()
	{
		$this->load->database();
		$this->load->model('m_order');
		//$this->load->library('my_func');
		$arr['arr'] = $this->m_order->getList(2);
		//$this->_show("orderList1", $arr);
		$this->load->view($this->parent_page."/orderList1", $arr);
	}

	public function index()
	{
		$data['display'] = $this->load->view($this->parent_page."/searchOrder", '', TRUE);
		$this->_show($data);
	}

	function _show($data = null)
	{
		$T['T'] = $this->version;
		if (isset($data['T'])) {
			$T['T'] = $data['T'];
			unset($data['T']);
		}
		$this->load->view($this->parent_page."/head1" , $T);
		$this->load->view($this->parent_page."/body", $data);
		$this->load->view($this->parent_page."/footer3");
	}
	function search(){
		if ($this->input->post('search')) {
			$search = $this->input->post('search');
			if (strpos($search, "#") !== false) {
				$search = str_replace("#", "", $search);
			}
			if (!is_numeric($search)) {
				$this->session->set_flashdata('warning', 'Please Enter the Correct Order Code');
				redirect(site_url(),'refresh');
			}
			$str = (string)$search;
			if ($str[1] == '1') {
				$id = $search - 110000;
				$this->printO1($id);
			} else {
				$id = $search - 100000;
				$this->printO($id);
			}			
		} else {
			$this->session->set_flashdata('warning', 'Ops!!! Wrong path pal');
			redirect(site_url(),'refresh');
		}		
	}

	function printO($or_id = null){
		//production print email
		if ($this->input->get('id') || $or_id != null) {
			if ($this->input->get('id')) {
				$or_id = $this->input->get('id');
				$or_id = $this->my_func->scpro_decrypt($or_id);
			}
			$this->load->database();
			$this->load->model('m_order');
			$arr = $this->m_order->getList_ext($or_id , 0);
			if(sizeof($arr) != 0){
				$order['arr'] = array_shift($arr);
				unset($arr);
				if ($order['arr']['order']->pr_id == 1) {
					$this->session->set_flashdata('warning', 'Please click "Move to process" before printing !!!');
					redirect(site_url(),'refresh');	
				}
				$this->load->library('l_label');
				$data["T"] = "#".(100000+$order['arr']['order']->or_id);				
				$data['display'] = $this->load->view($this->parent_page."/printForm" , $order , true);
				$this->_show($data);				
			}else{
				$this->session->set_flashdata('info', 'Sorry Your Order Not Found');
				redirect(site_url(),'refresh');	
			}
		} else {
			$this->session->set_flashdata('warning', 'Ops!!! Wrong path pal');
			redirect(site_url(),'refresh');	
		}
			
	}
	public function getfun()
	{
		echo $this->load->view($this->parent_page."/ajax/getAjaxForm", false);
	}

	function printO1($or_id = null){
		//production print email
		if ($this->input->get('id') || $or_id != null) {
			if ($this->input->get('id')) {
				$or_id = $this->input->get('id');
				$or_id = $this->my_func->scpro_decrypt($or_id);
			}
			$this->load->database();
			$this->load->model('m_order');
			$arr = $this->m_order->getList_ext($or_id , 1);
			if(sizeof($arr) != 0){
				$order['arr'] = array_shift($arr);
				unset($arr);
				if ($order['arr']['order']->pr_id == 1) {
					$this->session->set_flashdata('warning', 'Please click "Move to process" before printing !!!');
					redirect(site_url(),'refresh');	
				}			
				$data["T"] = "#".(110000+$order['arr']['order']->or_id);				
				$data['display'] = $this->load->view($this->parent_page."/printForm1" , $order , true);
				$this->_show($data);				
			}else{
				$this->session->set_flashdata('info', 'Sorry Your Order Not Found');
				redirect(site_url(),'refresh');	
			}
		} else {
			$this->session->set_flashdata('warning', 'Ops!!! Wrong path pal');
			redirect(site_url(),'refresh');	
		}
			
	}

	public function printDO(){
		if ($this->input->get('id')) {
			$or_id = $this->my_func->scpro_decrypt($this->input->get('id'));
			$this->load->database();
			$this->load->model('m_order');
			$this->load->library('l_label');
			$arr = $this->m_order->getList_ext($or_id);
			$arr1['arr'] = array_shift($arr);
			unset($arr);		
			$data['display'] = $this->load->view($this->parent_page."/doForm" , $arr1 , true);
			$this->_show($data);
		}
		
	}
	public function printDO1(){
		if ($this->input->get('id')) {
			$or_id = $this->my_func->scpro_decrypt($this->input->get('id'));
			$this->load->database();
			$this->load->model('m_order');
			$this->load->library('l_label');
			$arr = $this->m_order->getList_ext($or_id , 1);
			$arr1['arr'] = array_shift($arr);
			unset($arr);
			$data['display'] = $this->load->view($this->parent_page."/doForm1" , $arr1 , true);
			$this->_show($data);
		}
		
	}

	public function printOrder()
	{
		// click from email link
		if ($this->input->get('id')) {
			$or_id = $this->my_func->scpro_decrypt($this->input->get('id'));
			$this->load->database();
			$this->load->model('m_order');
			$arr = array(
				"pr_id" => 2
				);
			$this->m_order->update($arr , $or_id);
			$this->printO($or_id);
		} else {
			$this->session->set_flashdata('warning', 'Ops!!! Wrong Path (Ox,\"O)');
			redirect(site_url(),'refresh');	
		}
		
	}
	public function printOrder1()
	{
		// click from email link
		if ($this->input->get('id')) {
			$or_id = $this->my_func->scpro_decrypt($this->input->get('id'));
			$this->load->database();
			$this->load->model('m_order');
			$arr = array(
				"pr_id" => 2
				);
			$this->m_order->update($arr , $or_id);
			$this->printO1($or_id);
		} else {
			$this->session->set_flashdata('warning', 'Ops!!! Wrong Path (Ox,\"O)');
			redirect(site_url(),'refresh');	
		}
		
	}


}

/* End of file order.php */
/* Location: ./application/controllers/order.php */