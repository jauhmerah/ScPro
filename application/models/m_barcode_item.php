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
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return false;
        }
    }
    public function getAll($where = NULL) {
	        $this->db->select('*');
            $this->db->from('barcode_item bi');
            
            $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
            

	        if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where('bi.bi_id', $where);
	            }
	        }
	         $result = $this->db->get()->result();
        if ($result) {
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
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
    public function get1($where = null)
	{
	    	$this->db->select('*');
            $this->db->from('barcode_item bi');
            
            $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
            
            $this->db->order_by('bi.ty2_id , bi.ni_id', 'asc');
            if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where($where);
	            }
            }
            return $this->db->get()->result();	 
			 
	               
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
            if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where($where);
	            }
            }
            $result = $this->db->get()->result();	 
			 if ($result) {
                    if ($where !== NULL) {
                        return array_shift($result);
                    } else {
                        return $result;
                    }
                } else {
                    return false;
                }
	               
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
        $this->db->where('bi.del_id', 0);
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

            $this->db->where('bi.del_id', 0);

     
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
            $del =array('del_id' => 1);

        }
        $this->db->update(self::TABLE_NAME, $del , $where);
        return $this->db->affected_rows();
    }

    public function get3( $where = null){
	   		$this->db->select('ty2.ty2_desc as color , ca.ca_desc as series, ni.ni_mg as mg, fi.fi_qty as total');
            
            $this->db->from('barcode_item bi');
               
	   		$this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

            if ($where != NULL) 
            {
                if (is_array($where)) {
                   foreach ($where as $key => $value) 
                    {
                        $this->db->where($key, $value);
                    }
                }
                else {
                        $this->db->where($where);
                }
                
            }

	   		// $this->db->order_by('ty2.ty2_id', 'asc');
	   		return $this->db->get()->result();
    }

        public function getSeries( $series = null , $flavor = null){
	   		$this->db->select('ty2.ty2_desc as color , ca.ca_desc as series, ni.ni_mg as mg, fi.fi_qty as total');
            
            $this->db->from('barcode_item bi');
               
	   		$this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

            if ($series != NULL) 
            {
                $this->db->where('ca.ca_id',$series);    
            }
            if ($flavor != NULL) 
            {
                $this->db->where('ty2.ty2_id',$flavor);    
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
        
        public function get5($where = null)
        {
            $this->db->select('fi.fi_qty');
               
            $this->db->from('barcode_item bi');

            $this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');
               
            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');

            if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where('bi.bi_id', $where);
	            }
            }
            
               $result = $this->db->get()->result();
               
                if ($result) {
                if ($where !== NULL) {
                    return array_shift($result);
                } else {
                    return $result;
                }
            } else {
                return false;
            }
            
        }

    

}

/* End of file ModelName.php */

?>