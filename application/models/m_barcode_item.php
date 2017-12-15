<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barcode_item extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'barcode_item';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'bi_id';

    public function insert(Array $data) {
        if ($this->db->insert(self::TABLE_NAME, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getExist($nico = array() ,$id = array())
    {
	    	$this->db->select('*');
            $this->db->from(self::TABLE_NAME);
            
                
            if ($id !== NULL) 
            {   
                if ($nico !== NULL)
                {
                    $this->db->where('ty2_id',$id);
                    $this->db->where('ni_id',$nico);
                }      
            }
	    	$result = $this->db->get()->result();
            if ($result) 
            {
                return true;
            }
            else {
                return false;
            }
           
	    	
    }

    public function get2($where = null)
	{
	    	$this->db->select('*');
            $this->db->from('barcode_item bi');
            
            $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
            
            $this->db->order_by('bi.ty2_id , bi.ni_id', 'asc');
            
			if ($where != null) {
				$this->db->where($where);
			}			
	        return $this->db->get()->result();	        
    }
        
    public function update(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
        $this->db->update(self::TABLE_NAME, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($where = array()) {
        if (!is_array()) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }
    

}

/* End of file ModelName.php */

?>