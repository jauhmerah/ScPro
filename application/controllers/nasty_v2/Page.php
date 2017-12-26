<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	var $parent_page = "nasty_v2/dashboard/timeline/";
	var $version = "OrdYs v2.3.9 Alpha";

	public function index($page = 'tl')
	{
		$this->load->view($this->parent_page.'page/head');
		$this->load->view($this->parent_page.$page);
		$this->load->view($this->parent_page.'page/foot');

	}

}
