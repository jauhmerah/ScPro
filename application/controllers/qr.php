<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qr extends CI_Controller {

	var $parent_page = "qr/";
    var $version = "OrdYs v2.3.8 Alpha";
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view($this->parent_page."main");
    }

    public function co()
    {   // base_url().qr/co?de=xxxxxxxxx; 	
    	if($this->input->get("de")){
    		$this->load->library('my_func');
    		$code = $this->my_func->de($this->input->get("de"));
    		$echo $code;
    	}
    }

    public function qr_en()
    {
    	if($this->input->get("code")){
    		$this->load->library('my_func');
    		echo $this->my_func->en($this->input->get("code"));
    	}
    }

    public function qr_de()
    {
    	if($this->input->get("code")){
    		$this->load->library('my_func');
    		echo $this->my_func->de($this->input->get("code"));
    	}
    }
}
	        
?>