<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parcel extends CI_Controller{

    var $parent_page = "parcel/";
    var $version = "OrdYs v2.3.9 Alpha";
    function __construct() {
        parent::__construct();
        $this->load->library('my_func' ,NULL, 'mf');
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        $this->_show();
    }

    public function _show($page = 'search' , $data = NULL , $print = FALSE, $multi = FALSE)
    {
        $this->load->view($this->parent_page.'page/head');
        if ($multi) {
            foreach ($data['multi'] as $key['parcel']) {
                if (isset($key['parcel']['status'])) {
                    $this->load->view($this->parent_page.'notFound' , $key);
                }else{
                    $this->load->view($this->parent_page.$page , $key);
                }
            }
        } else {
            $this->load->view($this->parent_page.$page , $data);
        }
        $this->load->view($this->parent_page.'page/footer' , array( 'print' => $print));
    }

    public function printParcel()
    {
        /**
         * $arr[2] : 1 - print by parcel id;
         *           2 - Print all by order;
         */
        $page = "parcelForm";
        $print = TRUE;
        $multi = FALSE;
        if ($this->input->get('id')) {
            $arr = $this->input->get('id');
            $arr = $this->mf->scpro_decrypt($arr);
            $arr = explode('|' , $arr);
            if (sizeof($arr) == 3) {
                $mode = $arr[2];
                if ($arr[1] == 'printParcel') {
                    $pa_id = $arr[0];
                    $this->load->database();
                    $this->load->model('m_parcel', 'mp');
                    switch ($mode) {
                        case '1':
                            $temp = $this->mp->get_extFull($pa_id);
                            if (!is_array($temp)) {
                                $this->session->set_flashdata('error' , "Error Mode : #pa02");
                                redirect(site_url('distribution') , 'refresh');
                            }
                            $data['parcel'] = array_shift($temp);
                            unset($temp);
                            break;
                        case '2':
                            $multi = TRUE;
                            $print = TRUE;
                            $parcel = array(
                                'or_id' => $arr[0]
                            );
                            $arrPa = $this->mp->get($parcel);
                            if (!is_array($arrPa)) {
                                $this->session->set_flashdata('warning' , "Parcel Not found");
                                redirect(site_url('distribution') , 'refresh');
                            }
                            foreach ($arrPa as $key) {
                                $temp = $this->mp->get_extFull($key->pa_id);
                                if (!is_array($temp)) {
                                    $this->session->set_flashdata('error' , "Error Mode : #pa03");
                                    redirect(site_url('distribution') , 'refresh');
                                }
                                $data['multi'][] = array_shift($temp);
                            }
                            break;
                        default:
                            $this->session->set_flashdata('error' , "Error Mode : #pa01");
                            redirect(site_url('distribution') , 'refresh');
                            break;
                    }
                }
            }else{
                $this->session->set_flashdata('error' , "Ops error Id key");
                redirect(site_url('distribution') , 'refresh');
            }
        }else{
            $this->session->set_flashdata('warning' , "Ops wrong path!");
            redirect(site_url('distribution') , 'refresh');
        }
        $this->_show($page , $data , $print , $multi);
    }

    public function scan($code = NULL)
    {
        if ($code == NULL) {
            if ($this->input->post('code')) {
                $code = $this->input->post('code');
            }else{
                $this->session->set_flashdata('warning' , "No Input");
                redirect(site_url('distribution') , 'refresh');
            }
        }
        $page = 'parcelForm';
        $print = FALSE;
        $multi = FALSE;
        $this->load->database();
        $this->load->model('m_parcel', 'mp');

        $code = preg_replace('/\s+/', '', $code);
        $codeArr = explode(',' , $code);
        if (sizeof($codeArr) > 1) {
            $multi = TRUE;
            foreach ($codeArr as $key) {
                $code = $key;
                $temp = $this->mp->get_extFull(array('pb.pb_code' => $code));
                if ($temp) {
                    $data['multi'][] = array_shift($temp);
                }else{
                    $data['multi'][] = array(
                        'code' => $code,
                        'status' => FALSE
                    );
                }
            }
        }else{
            // for single scan code
            $temp = $this->mp->get_extFull(array('pb.pb_code' => $code));
            if ($temp == FALSE) {
                $this->session->set_flashdata('warning' , "Parcel Detail Not Found");
                redirect(site_url('distribution') , 'refresh');
            }
            $data['parcel'] = array_shift($temp);
            unset($temp);
        }
        $this->_show($page , $data , $print , $multi);
    }
}
?>
