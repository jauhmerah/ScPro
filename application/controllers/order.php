<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
 	
 	var $parent_page = "order";
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->database();
		$this->load->model('m_order');
		$this->load->library('my_func');
		$arr['arr'] = $this->m_order->getList(2);
		$this->_show("orderList1", $arr);
	}
	function _show($page = "orderList1" , $data = null)
	{
		$this->load->view($this->parent_page."/". $page, $data);
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */