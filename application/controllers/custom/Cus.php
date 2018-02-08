<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cus extends CI_Controller{

    var $parrent_page = 'cus/';
    var $version = "OrdYs v2.4.1 Alpha";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        $this->stat();
    }

    private function _show($page = 'display' , $data = null , $key = 'a1'){
        $this->load->library('my_func');
        $link['link'] = $key;
        // if (!$link['admin']) {
        // 	$link['link'] = 'a2';
        // }
        if (isset($data['title'])) {
            $T['title'] = $data['title'];
        }else{
            $T = null;
        }
        $this->load->view("nasty_v2/dashboard".'/page/head', array('ver' => $this->version) , FALSE);
        $this->load->view("nasty_v2/dashboard".'/page/head2', $link, FALSE);
        $this->load->view("nasty_v2/dashboard".'/page/navmenu3', $link, FALSE);
        $this->load->view("nasty_v2/dashboard".'/page/theme4', '', FALSE);
        $this->load->view("nasty_v2/dashboard".'/page/title5', $T, FALSE);
        $this->load->view($this->parrent_page.'/'.$page, $data, FALSE);
        $this->load->view("nasty_v2/dashboard".'/page/sidebar7', '', FALSE);
        $this->load->view("nasty_v2/dashboard".'/page/footer', '', FALSE);
    }

    public function stat()
    {
        $this->load->model('model_2.4.2/M_stat' , 'ms');
        $this->_show('display');
    }
}
?>
