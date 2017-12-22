
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barcode_item_crud extends grocery_CRUD_Model {

    const TABLE_NAME = 'barcode_item';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'bi_id';

    function get()
	{
	    	$this->db->select('*');
            $this->db->from('barcode_item bi');
            
            // $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            // $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            // $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            // $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
            
            // $this->db->order_by('bi.ty2_id , bi.ni_id', 'asc');
         
	        return $this->db->get()->result();	        
    }

}

/* End of file ModelName.php */
?>