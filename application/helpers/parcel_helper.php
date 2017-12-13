<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('parcelCount'))
{
    function parcelCount($or_id = NULL){
        $ci =& get_instance();
        if ($or_id == NULL) {
            return FALSE;
        }
        $ci->load->database();
        $ci->load->model('m_parcel', 'pa');
        return $ci->pa->countParcel($or_id);
    }
}
?>
