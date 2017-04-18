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
	    	}
	    	else{

	    		// $this->load->view(site_url('login'), $arr);
	    	// if($data->us_email!=$email){
	    	// 		$this->session->set_flashdata('warning', 'Your Email Is Incorrect');
                   
	    	// }
	    	// if($this->my_func->scpro_encrypt($data->us_pass)!=$pass){
	    	// 		$this->session->set_flashdata('warning', 'Your Password Is Incorrect');
                    
	    	// }
	    		$this->session->set_flashdata('warning', 'Your Email or Password is Incorrect');
	    		redirect(site_url('login'));
	    	}
	    	//$temp = $this->m_login->get();
	    	/*echo "<pre>";
	    	print_r($data);
	    	echo "</pre>";*/
	    }
	    function forgot(){
	    	$email = $this->input->post("email");
	        $phone = $this->input->post("phone");

	        $this->load->database();
	    	$this->load->model('m_login');
	    	$data = $this->m_login->forgot($email,$phone);
	    		
	 if ($data) {
	 			//mail("saiful_amirul93@yahoo.com","Success","Thanks, that works");

	 			$this->load->library('email');

		        $this->email->set_newline("\r\n");

		        $config['protocol'] = 'smtp';
		        $config['smtp_host'] = 'ssl://moon.sfdns.net';
		        $config['smtp_port'] = '465';
		        $config['smtp_user'] = 'epul@nastyjuice.com';
		        $config['smtp_from_name'] = 'Nasty Reseller';
		        $config['smtp_pass'] = 'selasih2014';
		        $config['charset'] = 'utf-8';
		        $config['wordwrap'] = TRUE;
		        $config['newline'] = "\r\n";
		        $config['mailtype'] = 'html'; 



	 			// $config = array(
	 			// 	'protocol' => 'smtp',
	 			// 	'smtp_host' => 'moon.sfdns.net',
	 			// 	'smtp_port' => 465,
	 			// 	'smtp_timeout' => '10', 
	 			// 	'smtp_user' => 'epul@nastyjuice.com',
	 			// 	'smtp_pass' => 'selasih2014',
	 			// 	'mailtype' => 'html',
	 			// 	'newline' => '\r\n',
	 			// 	'charset' => 'utf-8',
	 			// 	'wordwrap' => TRUE


	 			// 	);
	 			$this->email->initialize($config);

	    		$this->email->from($config['smtp_user'],$config['smtp_from_name']);
				$this->email->to('saiful_amirul93@yahoo.com');
 
				$this->email->subject('New Password');


				 $msg = "<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>New Password</title>

<style>
/* CSS used here will be applied after bootstrap.css */
.qlt-confirmation {
    width: 30%;
    margin: 10px auto;
 }
  
.qlt-confirmation .panel-body {
    width: 99%;
  margin: 0 auto;      
        padding: 40px 10px;
 }
      .qlt-confirmation .panel-body .desc{
              margin: 10px auto; 
            }

.qlt-confirmation .panel-body .notice {
       padding: 0px 20px; 
        margin-top: 50px;
        text-align: left;
        font-style:italic;
        color: gray;
      }

</style>

 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

</head>
<body>
<div class='qlt-confirmation'>
    <div class='panel panel-default'>
      <div class='panel-body'>
        <center>
        <img src='https://cdn4.iconfinder.com/data/icons/social-communication/142/open_mail_letter-512.png' style='width:30px; height: 30px;''>
          <p class='desc'>We already reset your password!<br>Click link below to enter your new password.<br><br>
          <a>New Password</a></p>
        </center>
        
        <!-- <p class='notice'>Note:<br>Using our <b>social login</b>, you will be ask to add your email address during authentication. This is part of our security policy.</p> -->
      </div>
  </div>
</div>
</body>
</html>";


				$this->email->message($msg);

            	//$this->email->send();

            	if ($this->email->send()) 
				{
				$this->session->set_flashdata('success', 'Your Confirmation is already sent to your email, please check to reset your password.');
	    		redirect(site_url('login'),'refresh');
				}
				else 
				{
				//echo "sending failed";
				show_error($this->email->print_debugger());   	
				// exit;
				}

	    			
	    		//$this->session->set_userdata( $array );

	 			
	    	}
	    	else{

	    		$this->session->set_flashdata('warning', 'Your Email or Phone Number is Not Available');
	    		redirect(site_url('login'));
	    	}
	     
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


	     public function sendEmail($email = null){            
            if ($email != null && is_array($email)) {
                $this->load->library('email');

                $this->email->from($email['fromEmail'], $email['fromName']);
                if(isset($email['toEmail'])){
                    if (is_array($email['toEmail'])) {
                        foreach ($email['toEmail'] as $key => $toEmail) {
                            $this->email->to($toEmail);
                        }
                    }else{
                        $this->email->to($email['toEmail']);
                    }
                }else{
                    $this->session->set_flashdata('error', 'Please set to->email');
                    return false;
                }
                if (isset($email['toCc'])) {
                    if (is_array($email['toCc'])) {
                        foreach ($email['toCc'] as $key) {
                            $this->email->cc($key);
                        }
                    }else{
                        $this->email->cc($email['toCc']); 
                    }
                }                  
                if (isset($email['toBcc'])) {
                    if (is_array($email['toBcc'])) {
                        foreach ($email['toBcc'] as $key) {
                            $this->email->bcc($key);
                        }
                    }else{
                        $this->email->bcc($email['toBcc']); 
                    }
                }
                $this->email->subject($email['subject']);
                $this->email->message($email['msg']);  

                if($this->email->send()){
                    $this->session->set_flashdata('info', "Successfully Send the Notification");
                }else{
                    $this->session->set_flashdata('Warning', "Unable To send The email");
                }
                //$msg = $this->email->print_debugger();
                
                return true;
            }
            return false;         
        }
	}
	        
?>