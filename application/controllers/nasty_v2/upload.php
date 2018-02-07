<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller{

    var $parent_page = 'nasty_v2/upload';

    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $this->load->library('session');
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->load->helper('timeline');
        $this->load->library('my_func', NULL , 'mf');
        $this->load->database();
        $this->load->model('M_attachment', 'ma');
    }

    public function getAjaxUploadFile()
    {
        $data['id'] = $this->input->post('id');
        $or_id = $this->mf->scpro_decrypt($data['id']);
        $data['file'] = $this->ma->get(array('or_id' => $or_id));
        echo $this->load->view($this->parent_page.'/ajax/getAjaxUploadFile', $data , TRUE);
    }
    // public function getAjaxViewFile()
    // {
    //     $data['id'] = $this->input->post('id');
    //     $or_id = $this->mf->scpro_decrypt($data['id']);
    //     $data['file'] = $this->ma->get(array('or_id' => $or_id));
    //     echo $this->load->view($this->parent_page.'/ajax/getAjaxViewFile', $data , TRUE);
    // }

    public function fileProcess()
    {
        if ($this->input->post('key')) {
            $key = $this->input->post('key');
            $key = $this->mf->scpro_decrypt($key);
            if ($key === "uploadfile") {
                $fileType = "jpg|png|jpeg|doc|pdf|docx";
                $result = $this->mf->do_upload('./assets/uploads/attachment/' , NULL , $fileType);
                $or_id = $this->mf->scpro_decrypt($this->input->post('id'));
                foreach ($result['success'] as $filename => $detail) {
                    $file = array(
                        'at_title' => $filename,
                        'at_url' => $detail['file_name'],
                        'or_id' => $or_id
                    );
                    if ($this->ma->insert($file)) {
                        $this->session->set_flashdata('success' , 'File Upload Success');
                    }
                }
                if (sizeof($result['error']) != 0) {
                    $code = "<ul>";
                    foreach ($result['error'] as $filename => $errormsg) {
                        $code .= "<li> ".$filename." : ".$errormsg."
                        </li>";
                    }
                    $code = "<b>Oh snap!</b> Change a few things up and try submitting again.</br>" . $code;
                    $this->session->set_flashdata('error' , $code);
                }
                redirect($_SERVER['HTTP_REFERER'] , 'refresh');
            }
        }
    }

    public function delFile()
    {
        if ($this->input->get('del')) {
            $at_id = $this->mf->scpro_decrypt($this->input->get('del'));
            $data = $this->ma->get($at_id);
            if ($data) {
                $at = array_shift($data);
                unset($data);
                if (unlink('./assets/uploads/attachment/'.$at->at_url)) {
                    $this->ma->delete($at->at_id);
                    $this->session->set_flashdata('success' , 'File Deleted');
                }else{
                    $msg = "<b>Warning!</b> System unable to detect the file location<br>
                    <ul>
                        <li>".$at->at_title."</li></ul>";
                    $this->session->set_flashdata('warning', $msg);
                }
            }
            redirect($_SERVER['HTTP_REFERER'] , 'refresh');
        }
    }
}
?>
