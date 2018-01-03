<?php
    if (! function_exists('recordLog'))
    {
        function recordLog($or_id = NULL , $pr_id = NULL , $us_id = NULL)
        {
            /**
             * array('pr_id' => , 'or_id' => , 'us_id' => )
             */
            if ($or_id != NULL) {
                $ci =& get_instance();
                $ci->load->database();
                $ci->load->model('timeline/M_timeline' , 'tl');
                $ci->load->library('my_func', NULL , 'mf');
                $ci->load->library('session');
                if ($us_id == NULL) {
                    $us_id = $ci->my_func->scpro_decrypt($ci->session->userdata('us_id'));
                }
                $array = array(
                    'or_id' => $or_id,
                    'pr_id' => $pr_id,
                    'us_id' => $us_id
                );
                return $ci->tl->insert($array);
            }else{
                return FALSE;
            }
        }
    }
    if (! function_exists('cancelRequest'))
    {
        function cancelRequest($tl_id = NULL ,$msg = NULL)
        {
            $ci =& get_instance();
            $ci->load->database();
            $ci->load->model('cancelRequest/M_cancelR' , 'cr');
            $array = array(
                'tl_id' => $tl_id,
                'cr_msg' => $msg
            );
            return $ci->cr->insert($array);
        }
    }
?>
