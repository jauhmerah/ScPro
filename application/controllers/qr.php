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
        $this->load->view($this->parent_page."login");
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
                    $this->session->set_flashdata('msg', 'Item Not Found , code : '.$this->input->post('code').". Send item code to it@nastyjuice.com , to solve the problem.");
                    redirect(site_url('qr/login'),'refresh');
                }
            }else{
                $this->session->set_flashdata('msg', 'Wrong email or Password');
                $this->session->set_flashdata('code', $this->input->post('code'));
                redirect(site_url('qr/login'),'refresh');
            }
        }
        redirect(site_url('qr/login'),'refresh');
    }
         public function qrcode()
        {
         if ($this->input->get('id')) {
                    $sh_id = $this->input->get('id');
                    //$this->load->library('my_func');
                    $sh_id = $this->my_func->scpro_decrypt($sh_id);
                    $this->load->database();
                    $this->load->model('m_ship');
                    $this->load->model('m_qrs');
                    $arr['arr'] = array_shift($this->m_ship->getList_ext($sh_id , 1));
                        if (sizeof($arr['arr']) == 0) {
                            $arr['arr'] = array_shift($this->m_ship->getList_ext($sh_id , 2));
                        }
                    
                    $arr['qr'] = $this->m_qrs->get();
                    $this->load->view($this->parent_page.'printQrcode' ,$arr);                        
                        //$this->_show('display' , $data , 'i1');
         //            if ($this->input->get('ver')) {
         //                $ver = $this->input->get('ver');
         //            }
         //            $arr = $this->m_order->getList_ext($or_id , $ver);
         //            $arr1['arr'] = array_shift($arr);
         //            $arr1['or_code'] = ((10000*$ver)+100000+$or_id);
         //            unset($arr);
                 
                
                    //$this->_show($data);
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

    private function _updateStock($data = null)
    {
        /* 
        ty2_id,ni_id,si_qty 
        */
        if (is_array($data)) {
            $this->load->database();        
            $this->load->model('m_stock_inventory' , "msi");
            if($this->msi->add($data)){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function test()
    {
        // [si_id] => 4 [shex_id] => 4 [ty2_id] => 2 [ni_id] => 1 [si_price] => 1 [si_qty] => 1 [si_trans] => 0 )
        //redirect(site_url('qr/co?de=34'),'refresh');
        $this->load->database();       
        $this->load->model('m_stock_inventory' , "msi");
        $this->load->model('m_ship_item' , 'm_si');
        $arr = $this->m_si->get(3);
        print_r($arr);
        echo $this->msi->add($arr);
    }
}
	        
?>