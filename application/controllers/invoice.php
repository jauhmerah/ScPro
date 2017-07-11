<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

		var $parent_page = "invoice";
		public function __construct()
		{
			parent::__construct();
        	$this->load->library('session');
        	date_default_timezone_set('Asia/Kuala_Lumpur');
		}
		function _show($page = 'error', $data = null)
		{
			$T['T'] = $data['or_code'];
			if (isset($data['T'])) {
				$T['T'] = $data['T'];
				unset($data['T']);
			}
			$this->load->view($this->parent_page."/head1" , $T);
			$this->load->view($this->parent_page."/".$page, $data);
			$this->load->view($this->parent_page."/footer3");
		}
	    
        public function Invoice($ver = 0)
        {
        	 if ($this->input->get('id')) {
				$or_id = $this->input->get('id');
				$this->load->library('my_func');
               	$or_id = $this->my_func->scpro_decrypt($or_id);
				$this->load->database();
				$this->load->model('m_order');
				if ($this->input->get('ver')) {
					$ver = $this->input->get('ver');
				}
				$arr = $this->m_order->getDetail($or_id , $ver);
				if ($arr === false) {
					show_404();
				}else{
					$arr1['arr'] = array_shift($arr);
					$arr1['or_code'] = ((10000*$ver)+100000+$or_id);
					unset($arr);
					$this->_show('orderInvoice' , $arr1);
				}					
			}else{
				show_404();
			}
          
        }
        public function getAjaxRowDummy()
        {
        	echo $this->load->view($this->parent_page."/ajax/getAjaxRowDummy",array("n" => $this->input->post('n')) , true);
        }
}