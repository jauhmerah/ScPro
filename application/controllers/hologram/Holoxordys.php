<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Holoxordys extends CI_Controller {

	    function __construct() {
	        parent::__construct();
            $this->load->library('encrypt');
            $this->load->database();
	    }

	    function index() {

	    }

        public function getAjaxOr_id()
        {
            $kunci = 'JauhMerahAini';
            if ($this->input->post('key')) {
                $key = $this->input->post('key');
                $key = $this->encrypt->encode($key , $kunci);
                if ($key == 'holoxordys') {
                    $or_id = $this->input->post('or_id');
                    $this->load->model('holo/M_holoxordys', 'mhxo');
                    $result = $this->mhxo->getClientDetail($or_id);
                    if()
                }
            }
        }
	}

?>
