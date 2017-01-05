<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

		var $parent_page = "invoice";

		 	var $version = "Nasty Process System v2.2.4 Alpha";
			public function __construct()
			{
				  parent::__construct();
	        $this->load->library('session');
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


	    public function dummyInvoice()
        {
        	        
             if ($this->input->get('id')) {
					$or_id = $this->input->get('id');
					$this->load->library('my_func');
                   $or_id = $this->my_func->scpro_decrypt($or_id);
        			//$or_id = 100;
					$this->load->database();
					$this->load->model('m_order');
					//$this->load->library('l_label');
					$arr = $this->m_order->getList_ext($or_id , 1);
					$arr1['arr'] = array_shift($arr);
					unset($arr);
					$data['display'] = $this->load->view($this->parent_page."/orderDummy" , $arr1 , true);
					$this->_show($data);
			}
                  
                   
                   /* $html =$this->load->view($this->parent_page.'/orderDummy' , '' , true); 
            			echo $html;*/
                  /* }*/

           
        }
          public function Invoice()
        {
        	 if ($this->input->get('id')) {
					$or_id = $this->input->get('id');
					$this->load->library('my_func');
                   $or_id = $this->my_func->scpro_decrypt($or_id);
        			//$or_id = 100;
					$this->load->database();
					$this->load->model('m_order');
					//$this->load->library('l_label');
					$arr = $this->m_order->getList_ext($or_id , 1);
					$arr1['arr'] = array_shift($arr);
					unset($arr);
					$data['display'] = $this->load->view($this->parent_page."/orderInvoice" , $arr1 , true);
					$this->_show($data);
			}
          
        }

}