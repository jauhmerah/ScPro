<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();
	    }
	
	    function index() {
	        $this->load->view("main/login");
	    }

	    //sql injection alert ***
	    function signin(){
	    	//$this->load->library("encrypt");
	    	$email = $this->input->post('email');
	    	$pass = $this->input->post('pass');

	    	$this->load->model('m_login');
	    	$data = $this->m_login->login($email,$pass);
	    	if ($data) {
	    		echo "login Success";
	    	}else{
	    		echo "Login Not Success";
	    	}
	    	$temp = $this->m_login->get();
	    	echo "<pre>";
	    	print_r($temp);
	    	echo "</pre>";
	    }

	    function signup(){
	    	$email = $this->input->post("email");
	        $pass = $this->input->post("pass");

	        $this->load->library("my_func");
	        $pass = $this->my_func->scpro_encrypt($pass);

	        echo $email;
	        echo $pass;

	        $this->load->model("m_login");

	        $data = array(
	        	"us_email" => $email , 
	        	"us_pass" => $pass
	        );
	        if (!$this->m_login->insert($data)) {
	        	echo "Not success";
	        }else{
	        	echo "success";
	        }
	    }
	}
	        
?>