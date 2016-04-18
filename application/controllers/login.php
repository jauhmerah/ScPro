<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();
	    }
	
	    function index() {
	        $this->load->view("main/login");
	    }

	    function signin(){
	    	$this->load->library("encrypt");
	    	$arr = $this->input->post();
	    	echo "<pre>";
	    	print_r($this->input->post());
	    	echo "</pre>";

	    	$this->load->library("my_func");	    	
	    	foreach ($arr as $key => $value) {
	    		$arr2[$key] = $this->my_func->scpro_encrypt($value);
	    	}
	    	echo "<pre>";
	    	print_r($arr2);
	    	echo "</pre>";

	    	foreach ($arr2 as $key => $value) {
	    		$arr3[$key] = $this->my_func->scpro_decrypt($value);
	    	}
	    	echo "<pre>";
	    	print_r($arr3);
	    	echo "</pre>";
	    }

	    function signup(){
	    	$arr = $this->input->post();
	    	echo "<pre>";
	    	print_r($arr);
	    	echo "</pre>";
	    }
	}
	        
?>