<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_finish_log extends CI_Model {

	const TABLE_NAME = 'finish_log';

    const PRI_INDEX = 'fl_id';

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
        
        public function insert(Array $data) {
	        if ($this->db->insert(self::TABLE_NAME, $data)) {
	            return $this->db->insert_id();
	        } else {
	            return false;
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
	        if (!is_array($where)) {
	            $where = array(self::PRI_INDEX => $where);
	        }
	        $this->db->delete(self::TABLE_NAME, $where);
	        return $this->db->affected_rows();
        }
        
        public function new_log($qty , $where ,$us_id, $st)
	    {

	    	$date_added = date('Y-m-d H:i:s');

	    	$this->db->select('*');
	    	$this->db->from('finish_inv');

	    	$bi_id = array(
	    			"bi_id" => $where
	    		);


            $this->db->where($bi_id);
            
	    	$arr = array_shift($this->db->get()->result());

	    	if($st==1)
            {
            $total = $arr->fi_qty + $qty;
            }
            else if($st==2)
            {
            $total = $arr->fi_qty-$qty;
            }

            $a = array(
            'fi_qty' => $total
            );

            $diff = $qty - $arr->fi_qty; 
            
            $result = $this->update('finish_inv',$a , $where);


	    	$data = array(
	    		'bi_id' => $arr->bi_id,
	    		'fi_from' => $arr->fi_qty,
	    		'fi_to' => $qty,
	    		'fi_diff' => $diff,
	    		'us_id' => $us_id,
	    		'ls_id' => $st
	    	);


	    	 if ($this->db->insert($data)) {
	            return $this->db->insert_id();
	        } else {
	            return false;
	        }
		}
		
		public function count($filter = null, $like = null)
		{
			$this->db->from('finish_log fl');
			
			if($filter != NULL || $like != NULL)
			{

				$this->db->join('user us','us.us_id = fl.us_id','left');

				$this->db->join('log_status ls','ls.ls_id = fl.ls_id','left');

				$this->db->join('barcode_item bi','bi.bi_id = fl.bi_id','left');

				$this->db->join('type2 ty2','ty2.ty2_id = bi.ty2_id','left');

				$this->db->join('category ca','ca.ca_id = ty2.ca_id','left');

				$this->db->join('nicotine ni','ni.ni_id = bi.ni_id','left');

				if (is_array($filter) && $filter != NULL) 
				{
					foreach ($filter as $key => $value) 
					{
						$this->db->where($key, $value);
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

		public function get_curr( $limit = 2, $start = 0, $filter = NULL, $like = NULL)
		{
			$this->db->select('*');

			$this->db->from('finish_log fl');

			$this->db->join('user us','us.us_id = fl.us_id','left');

			$this->db->join('log_status ls','ls.ls_id = fl.ls_id','left');

			$this->db->join('barcode_item bi','bi.bi_id = fl.bi_id','left');

			$this->db->join('type2 ty2','ty2.ty2_id = bi.ty2_id','left');

			$this->db->join('category ca','ca.ca_id = ty2.ca_id','left');

			$this->db->join('nicotine ni','ni.ni_id = bi.ni_id','left');
			
			$this->db->limit($limit, $start);
			If($filter != null){
				if(is_array($filter)){
					foreach ($filter as $key => $value){
						$this->db->where($key , $value);
					}
				}
			}

			if($like != null){
				if(is_array($like)){
					$this->db->like($like);
				}
			}
		$this->db->order_by('fl.fl_id', 'desc');
    	return $this->db->get()->result();


		}

		public function get4($where = null,$year = null,$month = null){

	   		$this->db->select('ty2.ty2_desc as color , ca.ca_desc as series, ni.ni_mg as mg, fl.fi_to as total');
            
            $this->db->from('finish_log fl');
               
			$this->db->join('barcode_item bi', 'bi.bi_id = fl.bi_id', 'left');
			   
	   		$this->db->join('finish_inv fi', 'fi.bi_id = bi.bi_id', 'left');

            $this->db->join('type2 ty2', 'ty2.ty2_id = bi.ty2_id', 'left');
            
            $this->db->join('nicotine ni', 'ni.ni_id = bi.ni_id', 'left');
                 
            $this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
			 if ($year != null) {
            $this->db->where('YEAR(fl.fi_date)', $year);
            if ($month != -1) {
                $this->db->where('MONTH(fl.fi_date)', $month);
            }
		}
            if (is_array($where) && $where != NULL) 
            {
                foreach ($where as $key => $value) 
                {
                    $this->db->where($key, $value);
                }
            }
           
			$this->db->order_by('fl.fi_date', 'desc');
			$this->db->limit(1);	
	   		
	   		return $this->db->get()->result();
	   	}

	    	

}

?>