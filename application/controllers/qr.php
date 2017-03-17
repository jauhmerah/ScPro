<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qr extends CI_Controller {

	var $parent_page = "qr/";
    var $version = "OrdYs v2.3.8 Alpha";
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('my_func');
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    private function _show($page = "page/body" , $data = null)
    {
        $this->load->view($this->parent_page."page/header");
        $this->load->view($this->parent_page.$page , $data);
        $this->load->view($this->parent_page."page/footer");
    }

    function index() {
        $this->load->view($this->parent_page."main");
    }

    public function co()
    {   // base_url().qr/co?de=xxxxxxxxx;
        // localhost/scpro/qr/co?de=32393134
    	if($this->input->get("de")){
    		$code = $this->input->get("de");
            $this->session->set_flashdata('id', $code);
            redirect(site_url('qr/login'),'refresh');
    	}
    }

    public function login()
    {
        $this->_show("login");
    }

    public function signin()
    {
        if ($this->session->flashdata('access')) {
            $this->session->flashdata('access');
            $this->load->database();
            $this->load->model('m_login');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $data = $this->m_login->login($email,$pass);
            if ($data) {
                $array = array(
                    'qr_id' => $this->my_func->en($data->us_id , 1),
                    'qr_lvl' => $this->my_func->en($data->us_lvl , 1),
                    'qr_username' => $this->my_func->en($data->us_username , 1)
                );              
                $this->session->set_userdata( $array );
                $si_id = $this->my_func->de($this->input->post('code'));
                $this->load->model('m_ship_item' , "m_si");
                $arr = $this->m_si->get($si_id);                
                if(sizeof($arr) !== 0){
                    $this->m_si->update(array("si_trans" => 1) , $si_id);
                    $this->load->model('m_qrs');
                    $qr = $this->m_qrs->get(array("si_id" => $si_id));
                    if (sizeof($qr) !== 0) {
                        
                    }

                }else{
                    $this->session->set_flashdata('msg', 'Item Not Found , code : '.$this->input->post('code').". Send item code to it@nastyjuice.com , to solve the problem.");
                    redirect(site_url('qr/login'),'refresh');
                }
            }else{
                $this->session->set_flashdata('msg', 'Wrong email or Password');
                $this->session->set_flashdata('code', $this->input->post('code'));
                redirect(site_url('qr/login'),'refresh');
            }         

        }else{
            redirect(site_url('qr/login'),'refresh');
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

    public function test()
    {
        $this->load->view($this->parent_page."login");
    }
}
	        
?>