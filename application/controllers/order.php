<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
 	
 	var $parent_page = "order";
	public function __construct()
	{
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
		$T = array();
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
			$id = $search - 100000;
			$this->printO($id);
			
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
			$arr = $this->m_order->getList_ext($or_id);
			if(sizeof($arr) != 0){
				$order['arr'] = array_shift($arr);
				unset($arr);
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


}

/* End of file order.php */
/* Location: ./application/controllers/order.php */