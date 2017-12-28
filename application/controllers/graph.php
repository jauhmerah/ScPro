<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Graph extends CI_Controller {

	var $parent_page = "graph";
    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }


    public function getAjaxGraph3()
    {
        $where = null;

        if ($this->input->post("series") || $this->input->get("series")) 
        {
            if ($this->input->get("series")) {
                $search = $this->input->get("series");
            }
            else {
                $search = $this->input->post("series");
            }

            $where = array('ca.ca_id' => $search );
        }

    	$this->load->database();
    	$this->load->model('m_barcode_item' , 'mbi');
    	$arr['arr'] = $this->mbi->get3($where);
    	echo $this->load->view($this->parent_page. "/graph1", $arr, false);
    }

    public function getAjaxGraph4()
    {
        $where = null;
        $year = null;
        $month = null;
        $status = null;
        $nico = null;

        if ($this->input->post("color") || $this->input->get("color")) 
        {
            if ($this->input->get("color")) {
                $search = $this->input->get("color");
            }
            else {
                $search = $this->input->post("color");
            }

            $where = array('ty2.ty2_id' => $search );
        }
       
        if ($this->input->post("year") && $this->input->post("month")) {
                
            $year = $this->input->post("year");
            $month = $this->input->post("month");
        }
         $nico = $this->input->post("nico");
        // if ($this->input->post("status")) {
                
        //     $status = $this->input->post("status");
            
        // } 

        
        
        
    	$this->load->database();
    	$this->load->model('m_finish_log' , 'mfl');
        $arr['arr'] = $this->mfl->get4($where,$year,$month,$status,$nico);
    	// $arr['nico'] =$nico;
        
    	echo $this->load->view($this->parent_page. "/graph2", $arr, false);
    }

    
}
        
?>