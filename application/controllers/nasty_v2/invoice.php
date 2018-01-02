<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

		var $parent_page = "invoice";

		 	var $version = "OrdYs v2.4.0 Alpha";
			public function __construct()
			{
				  parent::__construct();
	        $this->load->library('session');
	        date_default_timezone_set('Asia/Kuala_Lumpur');
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

	    public function dummyInvoice($ver = 1)
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
					$arr = $this->m_order->getList_ext($or_id , $ver);
					$arr1['arr'] = array_shift($arr);
					$arr1['or_code'] = ((10000*$ver)+100000+$or_id);
					unset($arr);
					$data['display'] = $this->load->view($this->parent_page."/orderDummy" , $arr1 , true);
					$this->_show($data);
			}
        }
          public function Invoice($ver = 1)
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
					$arr = $this->m_order->getList_ext($or_id , $ver);
					$arr1['arr'] = array_shift($arr);
					$arr1['or_code'] = ((10000*$ver)+100000+$or_id);
					unset($arr);
					$data['display'] = $this->load->view($this->parent_page."/orderInvoice" , $arr1 , true);
					$this->_show($data);
			}

        }
        public function getAjaxRowDummy()
        {
        	echo $this->load->view($this->parent_page."/ajax/getAjaxRowDummy",array("n" => $this->input->post('n')) , true);
        }
}
