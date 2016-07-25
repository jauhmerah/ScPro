<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
 	
 	var $parent_page = "order";
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$this->_show();
	}

	function _show($page = "orderList1" , $data = null)
	{
		$this->load->view($this->parent_page."/". $page, $data);
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */