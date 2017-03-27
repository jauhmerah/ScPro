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
            if ($this->session->userdata('qr_id')) {
                $id = $this->session->userdata('qr_id');
                $id = $this->my_func->de($id , 1);
                $this->load->database();
                $this->load->model('m_login');
                if ($this->m_login->get($id)) {
                    $this->session->set_flashdata('access', "true");
                    redirect(site_url('qr/signin'),'refresh');
                }else{
                    redirect(site_url('qr/login'),'refresh');
                }            
            }
            redirect(site_url('qr/login'),'refresh');
    	}
    }

    public function login()
    {
        $this->load->view($this->parent_page."login");
    }

    public function signin()
    {
        if ($this->session->flashdata('access')) {
            $this->load->database();
            $this->session->flashdata('access');
            if ($this->session->userdata('qr_id')) {
                $data = "betul";
            }else{                
                $this->load->model('m_login');
                $email = $this->input->post('email');
                $pass = $this->input->post('pass');
                $data = $this->m_login->login($email,$pass);
            }            
            if ($data) {
                if ($data !== "betul") {
                    $array = array(
                        'qr_id' => $this->my_func->en($data->us_id , 1),
                        'qr_lvl' => $this->my_func->en($data->us_lvl , 1),
                        'qr_username' => $this->my_func->en($data->us_username , 1)
                    );              
                    $this->session->set_userdata( $array );
                }
                if ($this->input->post('code')) {
                    $m = $this->input->post('code');
                    $si_id = $this->my_func->de($m);
                }else{
                    $m = $this->session->flashdata('id');
                    $si_id = $this->my_func->de($m);
                }
                $this->load->model('m_ship_item' , "m_si");
                $arr = $this->m_si->get($si_id);

                if($arr){
                    if($this->m_si->update(array("si_trans" => 1) , $si_id) ){
                        $this->load->model('m_qrs');
                        $qr = $this->m_qrs->get(array("si_id" => $si_id));
                        if (sizeof($qr) != 0) {
                            $this->m_qrs->delete($qr->qrs_id);
                            unlink(".".$qr->qrs_url); 
                            if(!$this->_updateStock($arr)){
                                //error : #00a1
                                $this->session->set_flashdata('error', 'Error Code : #00a1. </br>Product Code : '.$this->input->post('code')."</br>Please report to admin, jauhmerah@nastyjuice.com");
                            }else{
                                $this->session->set_flashdata('success', 'Your item was register');
                            }
                        }else{
                            //error : #00b2
                            $this->session->set_flashdata('warning', 'Code Error : #Q-00b2');
                        }                                                
                    }else{
                        $this->session->set_flashdata('warning', 'This Item was updated before');
                    }
                    $this->session->set_flashdata('found' , 'true');
                }else{
                    $this->session->set_flashdata('msg', 'Item Not Found , code : '.$m.". Send item code to it@nastyjuice.com , to solve the problem.");
                    redirect(site_url('qr/login'),'refresh');
                }
            }else{
                $this->session->set_flashdata('msg', 'Wrong email or Password');
                $this->session->set_flashdata('code', $m);
                redirect(site_url('qr/login'),'refresh');
            }
        }
        redirect(site_url('qr/login'),'refresh');
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

    private function _updateStock($data = null)
    {
        /* 
        ty2_id,ni_id,si_qty 
        */
        if ($data != null) {
            $this->load->database();        
            $this->load->model('m_stock_inventory' , "msi");
            if($this->msi->add($data)){
                return "true";
            }else{
                return 'false';
            }
        }
        return 'false';
    }

    public function logout()
    {
        $this->session->unset_userdata('qr_id');
        $this->session->unset_userdata('qr_lvl');
        $this->session->unset_userdata('qr_username');
        $this->session->set_flashdata('success', 'Logout Success');
        redirect(site_url(),'refresh');
    }
}
	        
?>