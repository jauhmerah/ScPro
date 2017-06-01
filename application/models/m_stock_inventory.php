<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class M_stock_inventory extends CI_Model {
	
	    /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'stock_inventory';
	
	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'sti_id';
	
	    /**
	     * Retrieves record(s) from the database
	     *
	     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
	     *                      If associative array is given, it should fit field_name=>value pattern.
	     *                      If string, value will be used to match against PRI_INDEX
	     * @return mixed Single record if ID is given, or array of results
	     */
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

	    public function get2($where = null)
	    {
	    	$this->db->select('*');
	        $this->db->from('stock_inventory sti');
			$this->db->join('type2 ty2', 'ty2.ty2_id = sti.ty2_id', 'left');
			$this->db->join('nicotine ni', 'ni.ni_id = sti.ni_id', 'left');     
			$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
			$this->db->order_by('sti.ty2_id , sti.ni_id', 'asc');
			if ($where != null) {
				$this->db->where($where);
			}			
	        return $this->db->get()->result();	        
	    }

	   	public function get3(){
	   		$this->db->select('ty2.ty2_desc as color , cat.ca_desc as series, sum(sti.sti_total) as total');
	   		$this->db->from('stock_inventory sti');
	   		$this->db->join('type2 ty2', 'ty2.ty2_id = sti.ty2_id', 'left');
	   		$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
	   		$this->db->group_by('ty2.ty2_id');
	   		$this->db->order_by('ty2.ty2_id', 'asc');
	   		return $this->db->get()->result();
	   	}

	   	public function get4($where = null){
	   		$this->db->select("ni.ni_mg as nico , sum(sti.sti_total) as total");
	   		$this->db->from('stock_inventory sti');
	   		$this->db->join('type2 ty2', 'ty2.ty2_id = sti.ty2_id', 'left');
	   		$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
	   		$this->db->join('nicotine ni', 'ni.ni_id = sti.ni_id', 'left');
	   		$this->db->group_by('sti.ni_id');
	   		if($where != null){
	   			$this->db->where($where);
	   		}
	   		return $this->db->get()->result();
	   	}

	
	    /**
	     * Inserts new data into database
	     *
	     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
	     * @return mixed Inserted row ID, or false if error occured
	     */
	    public function insert(Array $data) {
	        if ($this->db->insert(self::TABLE_NAME, $data)) {
	            return $this->db->insert_id();
	        } else {
	            return false;
	        }
	    }
	
	    /**
	     * Updates selected record in the database
	     *
	     * @param Array $data Associative array field_name=>value to be updated
	     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	     * @return int Number of affected rows by the update query
	     */
	    public function update(Array $data, $where = array()) {
	            if (!is_array($where)) {
	                $where = array(self::PRI_INDEX => $where);
	            }
	        $this->db->update(self::TABLE_NAME, $data, $where);
	        return $this->db->affected_rows();
	    }
	
	    /**
	     * Deletes specified record from the database
	     *
	     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	     * @return int Number of rows affected by the delete query
	     */
	    public function delete($where = array()) {
	        if (!is_array($where)) {
	            $where = array(self::PRI_INDEX => $where);
	        }
	        $this->db->delete(self::TABLE_NAME, $where);
	        return $this->db->affected_rows();
	    }

	    public function add($arr)
	    {
	    	$a = $this->get(array("ty2_id" => $arr->ty2_id , "ni_id" => $arr->ni_id));
	    	if ($a) {
	    		$a->sti_total = $arr->si_qty + $a->sti_total;
	    		return $this->update(array("sti_total" => $a->sti_total), $a->sti_id);
	    	}else{
	    		$b = array(
	    			"ty2_id" => $arr->ty2_id,
	    			"ni_id" => $arr->ni_id,
	    			"sti_total" => $arr->si_qty
	    		);
	    		return $this->insert($b);
	    	}
	    }

	    public function updateQty($qty , $w, $orex_id=null , $us_id)
	    {
	    	$date_added=date("Y-m-d H:i:s");
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where($w);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $arr->sti_total - $qty;
	    	$a = array(
	    		'sti_total' => $qty
	    	);
	    	$this->update($a , $arr->sti_id);

	    	$diff=$qty-$arr->sti_total;	



	    	$arr1 = array(
	    		'ty2_id' => $arr->ty2_id,
	    		'ni_id' => $arr->ni_id,
	    		'fromqty' => $arr->sti_total,
	    		'toqty' => $qty,
	    		'diff' => $diff,
	    		'date_added' => $date_added,
	    		'log_status' => 1,
	    		'us_id' => $us_id,
	    		'orex_id' => $orex_id,

	    	);

	    	$this->db->insert('ship_log', $arr1);


	    }

	     public function updateQty1($qty , $w , $us_id)
	    {
	    	$date_added=date("Y-m-d H:i:s");
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where($w);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $arr->sti_total + $qty;
	    	$a = array(
	    		'sti_total' => $qty
	    	);
	    	$this->update($a , $arr->sti_id);

	    	$diff=$qty-$arr->sti_total;	



	    	$arr1 = array(
	    		'ty2_id' => $arr->ty2_id,
	    		'ni_id' => $arr->ni_id,
	    		'fromqty' => $arr->sti_total,
	    		'toqty' => $qty,
	    		'diff' => $diff,
	    		'date_added' => $date_added,
	    		'log_status' => 0,
	    		'us_id' => $us_id
	    		

	    	);

	    	$this->db->insert('ship_log', $arr1);


	    }

	        public function updateQty2($qty , $w , $orex_id=null, $us_id, $fromqty)
	    {
	    	$date_added=date("Y-m-d H:i:s");
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where($w);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $fromqty - $qty;
	    	$a = array(
	    		'sti_total' => $qty
	    	);
	    	// $this->update($a , $arr->sti_id);

	    	$diff=$qty-$fromqty;	



	    	$arr1 = array(
	    		'ty2_id' => $arr->ty2_id,
	    		'ni_id' => $arr->ni_id,
	    		'fromqty' => $fromqty,
	    		'toqty' => $qty,
	    		'diff' => $diff,
	    		'date_added' => $date_added,
	    		'log_status' => 1,
	    		'us_id' => $us_id,
	    		'orex_id' => $orex_id,
	    		

	    	);
	    	return $arr1;
	    	// $this->db->insert('ship_log', $arr1);


	    }
	}
	        
?>