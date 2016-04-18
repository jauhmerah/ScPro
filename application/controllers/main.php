<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	var $parent_page = "main";

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->_show();
    }

    function _show($page = 'index' , $data = null){
    	$this->load->view($this->parent_page.'/'.$page , $data);
    }

    function home(){
        
    }

    function login(){
        $this->_show('login');
    }

    function signUp($value='')
    {
        $email = $this->input->post("email");
        $pass = $this->input->post("pass");
    }

    function test_email(){
        $to       = 'jauhmerah@gmail.com';
        $subject  = 'Testing sendmail.exe';
        $message  = 'Hi, you just received an email using sendmail!';
        $headers  = 'From: jauhmerah' . "\r\n" .
                    'Reply-To: jauhmerah@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        if(mail($to, $subject, $message, $headers))
            echo "Email sent";
        else
            echo "Email sending failed";
    }

    function test_email2(){

        $config = array();
        $config['useragent']           = "CodeIgniter";
        $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']            = "mail";
        $config['smtp_host']           = "localhost";
        $config['smtp_port']           = "25";
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');   
        $this->email->initialize($config);     
        $this->email->from('zakfarred@yahoo.com', 'zakfarred');
        $this->email->to('jauhmerah@gmail.com');
        //$this->email->cc('another@example.com');
        //$this->email->bcc('and@another.com');
        
        $this->email->subject('test sendemail.exe');
        $this->email->message('learning purpose');
        
        $this->email->send();
        
        echo $this->email->print_debugger();
    }
}
        

?>