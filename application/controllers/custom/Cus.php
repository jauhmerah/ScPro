<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cus extends CI_Controller{
    function __construct()
    {
        $this->load->database();
    }

    public function stat()
    {
        $this->load->model('model_2.4.2/M_stat' , 'ms');

    }
}
?>
