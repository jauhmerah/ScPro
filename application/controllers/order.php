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
		$this->load->view($this->parent_page."/head1");
		$this->load->view($this->parent_page."/body", $data);
		$this->load->view($this->parent_page."/footer3");
	}
	function search(){

	}

	function printO(){
		//production print email
		if ($this->input->get('id')) {
			$or_id = $this->input->get('id');
			$or_id = $this->my_func->scpro_decrypt($or_id);
			$this->load->database();
			$this->load->model('m_order');
			$arr = $this->m_order->getList_ext($or_id);
			if(sizeof($arr) != 0){
				$order['arr'] = array_shift($arr);
				unset($arr);				
				$data['display'] = $this->load->view($this->parent_page."/printForm" , $order , true);
				$this->_show($data);
			}else{
				echo "not found";
			}
		} else {
			echo "Wrong Turn!!!";
		}		
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */