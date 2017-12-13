<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('paginationLink'))
{
    /*
    need to edit more
    */
    function paginationLink($arr = NULL)
    {
        if($arr == NULL) return FALSE;

        $data['total'] = 10; //$this->m_batch->count();
        $numPage = $this->uri->segment(5 , 1);
        $numPage--;
        $data['numPage'] = $numPage * 10;

        // pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('nasty_v2/dashboard/page/e1');
        $config['total_rows'] = 200;
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<li><a class="current"><strong>';
        $config['cur_tag_close'] = '</strong></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
        $link = '<ul class="pagination">'.$this->pagination->create_links().'</ul>';
        return $link;

    }
}

?>
