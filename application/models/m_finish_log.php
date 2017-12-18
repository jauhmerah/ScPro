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

	    	

}

?>