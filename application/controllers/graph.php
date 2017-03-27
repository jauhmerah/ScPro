<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Graph extends CI_Controller {

	var $parent_page = "graph";
    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    public function getAjaxGraph1()
    {
    	$this->load->database();
    	$this->load->model('m_stock_inventory' , 'msi');
    	$arr['arr'] = $this->msi->get3();
    	return $this->load->view($this->parent_page. "/graph1", $arr, false);
    }
}
        
?>