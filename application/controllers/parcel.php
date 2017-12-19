<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parcel extends CI_Controller{

    var $parent_page = "parcel/";
    var $version = "OrdYs v2.3.7 Alpha";
    function __construct() {
        parent::__construct();
        $this->load->library('my_func' , 'mf');
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        //$this->load->view($this->parent_page.'page/head');
        $this->load->view($this->parent_page.'search');
        //$this->load->view($this->parent_page.'page/footer');
    }

    public function printParcel()
    {
        /**
         * $arr[2] : 1 - print by parcel id;
         *           2 - Print all by order;
         */
         // TODO: sambung print form
        if ($this->input->get('id')) {
            $arr = $this->input->get('id');
            $arr = $this->mf->scpro_decrypt($arr);
            $arr = explode('|' , $arr);
            if (sizeof($arr) == 3) {
                $mode = $arr[2];
                if ($arr[1] == 'printParcel') {
                    $pa_id = $arr[0];
                }
            }else
                $this->session->set_flashdata('error' , "Ops error Id key");
        }else
            $this->session->set_flashdata('warning' , "Ops wrong path!");
        redirect(site_url('distribution') , 'refresh');
    }
}
?>
