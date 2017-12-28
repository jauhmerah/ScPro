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
    public function get($where = NULL) {
	        $this->db->select('*');
	        $this->db->from(self::TABLE_NAME);
	        if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where(self::PRI_INDEX, $where);
	            }
	        }
	        $result = $this->db->get()->result();
	        if ($result) {
	            	return $result;	            
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

    public function get_curr( $limit = 2, $start = 0, $filter = array(), $like = NULL)
    {
        $this->db->select('*');
        $this->db->from('barcode_item bi');

        $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

        $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
        $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
        $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

        
        $this->db->limit($limit, $start);
    	If($filter != NULL){
    		if(is_array($filter)){
             
    			foreach ($filter as $key => $value) {
                     $this->db->or_where('bi.bi_code', $value);
                }
    				
    			
    		}
    	}
    	
    	if($like != null){
    		if(is_array($like)){
    			$this->db->like($like);
    		}
    	}
        $this->db->order_by('bi.ty2_id , bi.ni_id', 'asc');

    	return $this->db->get()->result();

    }

    public function count($filter = NULL, $like = null)
    {
        $this->db->from('barcode_item bi');
        
        if($filter != NULL || $like != NULL)
        {
            $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

     
            if (is_array($filter) && $filter != NULL) 
            {
                foreach ($filter as $key => $value) {
                     $this->db->or_where('bi.bi_code', $value);
                }
            }

            if (is_array($like) && $like != NULL) {
                $this->db->like($like);
            }
            return $this->db->count_all_results();
        }
        else 
        {
            return $this->db->count_all_results();            
        }
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

    public function get3( $where = null){
	   		$this->db->select('ty2.ty2_desc as color , ca.ca_desc as series, ni.ni_mg as mg, fi.fi_qty as total');
            
            $this->db->from('barcode_item bi');
               
	   		$this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

            if (is_array($where) && $where != NULL) 
            {
                foreach ($where as $key => $value) 
                {
                    $this->db->where($key, $value);
                }
            }

	   		// $this->db->order_by('ty2.ty2_id', 'asc');
	   		return $this->db->get()->result();
           }
           
           public function get4($where = null,$year = null,$month = null){

	   		$this->db->select('ty2.ty2_desc as color , ca.ca_desc as series, ni.ni_mg as mg, fi.fi_qty as total');
            
            $this->db->from('barcode_item bi');
               
	   		$this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

            if (is_array($where) && $where != NULL) 
            {
                foreach ($where as $key => $value) 
                {
                    $this->db->where($key, $value);
                }
            }
            if ($year != null) {
                    $this->db->where('YEAR(lg.fi_date)', $year);
                    if ($month != -1) {
                        $this->db->where('MONTH(lg.fi_date)', $month);
                    }
                }

	   		// $this->db->order_by('ty2.ty2_id', 'asc');
	   		return $this->db->get()->result();
        }
        
        public function getQty($where = null)
        {
            $this->db->select('fi.fi_qty');
               
            $this->db->from('barcode_item bi');

            $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');
               

            if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where('bi.bi_id', $where);
	            }
            }
            
	   		return $this->db->get()->result();
            
        }

    

}

/* End of file ModelName.php */

?>