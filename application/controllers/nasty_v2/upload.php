<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->load->helper('timeline');
        $this->load->library('', $config, 'object_name');
    }

    public function uploadFile()
    {

    }
}
?>
