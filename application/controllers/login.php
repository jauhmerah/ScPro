<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		var $version = "Nasty Process System v2.3.7 Alpha";
	    function __construct() {
	        parent::__construct();
	        $this->load->library('session' , 'my_func');
	    }
	
	    function index() {
	        $this->load->view("main/login");
	    }

	    //sql injection alert ***
	    function signin(){
	    	//$this->load->library("encrypt");
	    	$email = $this->input->post('email');
	    	$pass = $this->input->post('pass');
			$this->load->database();
	    	$this->load->model('m_login');
	    	$data = $this->m_login->login($email,$pass);
	    	if ($data) {
	    		//echo "login Success";
	    		$array = array(
	    			'us_id' => $this->my_func->scpro_encrypt($data->us_id),
	    			'us_lvl' => $this->my_func->scpro_encrypt($data->us_lvl),
	    			'us_username' => $this->my_func->scpro_encrypt($data->us_username)
	    		);	    		
	    		$this->session->set_userdata( $array );
	    		redirect(site_url('nasty_v2/dashboard'),'refresh');
	    	}else{
	    		//echo "Login Not Success";
	    		redirect(site_url('login'),'refresh');
	    	}
	    	//$temp = $this->m_login->get();
	    	/*echo "<pre>";
	    	print_r($data);
	    	echo "</pre>";*/
	    }

	    function signup(){
	    	$email = $this->input->post("email");
	        $pass = $this->input->post("pass");

	        $this->load->library("my_func");
	        $pass = $this->my_func->scpro_encrypt($pass);

	        //echo $email;
	        //echo $pass;

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