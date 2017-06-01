<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class M_log extends CI_Model {
	
	    /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'ship_log';
	
	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'log_id';
	
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
	   


	    public function get2($where = null, $limit = null , $start = null)
	    {
	    	$this->db->select('*');
	        $this->db->from('ship_log sti');
			$this->db->join('type2 ty2', 'ty2.ty2_id = sti.ty2_id', 'left');
			$this->db->join('nicotine ni', 'ni.ni_id = sti.ni_id', 'left'); 
			$this->db->join('user us', 'us.us_id = sti.us_id', 'left');     
			$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
			$this->db->order_by('sti.date_added', 'desc');
			if ($limit !== null && $start !== null) {
	    		$this->db->limit($limit, $start);
	    	}	
			if ($where != null) {
				$this->db->where($where);
			}			
	        return $this->db->get()->result();	        
	    }

	    public function listSearch( $limit = null , $start = null , $where = null)
	    {
	    	$this->db->select('sti.log_id, sti.us_id , us.us_username ,ty2.ty2_desc, sti.date_added, ni.ni_mg, sti.fromqty, sti.toqty, sti.diff, sti.log_status');
	    	$this->db->from('ship_log sti');
	    
	    	
	    	$this->db->order_by('sti.date_added', 'desc');
	    	if ($limit !== null && $start !== null) {
	    		$this->db->limit($limit, $start);
	    	}	
	    	
	    	$this->db->join('type2 ty2', 'ty2.ty2_id = sti.ty2_id', 'left');
			$this->db->join('nicotine ni', 'ni.ni_id = sti.ni_id', 'left'); 
			$this->db->join('user us', 'us.us_id = sti.us_id', 'left');     
			$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
	    	if ($where != null) {
	    		$this->db->like($where);
	    	}
	    	$result = $this->db->get()->result();
	    	return $result;
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


	   	public function get6($where = null)
	    {
	    	
	    	$this->db->select('fromqty, date_added');
			//$this->db->select_max('date_added');
	        $this->db->from('ship_log sti');
			$this->db->join('type2 ty2', 'ty2.ty2_id = sti.ty2_id', 'left');
			$this->db->join('nicotine ni', 'ni.ni_id = sti.ni_id', 'left'); 
			$this->db->join('user us', 'us.us_id = sti.us_id', 'left');     
			$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
			$this->db->order_by('sti.date_added', 'desc');
			
			if ($where != null) {
				$this->db->where($where);
			}			
	        return $this->db->get()->first_row();	        
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

	    public function updateQty($qty , $w)
	    {
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where($w);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $arr->sti_total - $qty;
	    	$a = array(
	    		'sti_total' => $qty
	    	);
	    	$this->update($a , $arr->sti_id);
	    }

	    public function updateQty2($qty , $w)
	    {
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);

	    	$sti_id = array(
	    			"sti_id" => $w
	    		);


	    	$this->db->where($sti_id);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $arr->sti_total + $qty;
	    	$a = array(
	    		'sti_total' => $qty
	    	);
	    	$this->update($a , $arr->sti_id);
	    }

	     public function new_log($qty , $w ,$us_id, $stat)
	    {

	    	$date_added = date('Y-m-d H:i:s');

	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);

	    	$sti_id = array(
	    			"sti_id" => $w
	    		);


	    	$this->db->where($sti_id);
	    	$arr = array_shift($this->db->get()->result());

	    	$diff= $arr->sti_total - $qty;


	    	$qty = $arr->sti_total + $qty;

	    	$data = array(
	    		'ty2_id' => $arr->ty2_id,
	    		'ni_id' => $arr->ni_id,
	    		'fromqty' => $arr->sti_total,
	    		'toqty' => $qty,
	    		'diff' => $diff,
	    		'date_added' => $date_added,
	    		'log_status' => $stat,
	    		'us_id' => $us_id,
	    	);


	    	 if ($this->db->insert('ship_log', $data)) {
	            return $this->db->insert_id();
	        } else {
	            return false;
	        }


	    	
	    	// $a = array(
	    	// 	'sti_total' => $qty
	    	// );
	    	// $this->update($a , $arr->sti_id);
	    }
	      public function logCount()
	    {
	    	// $this->db->like('shp.sh_del', 0);
	    	// if ($ver != -1) {
	    	// 	$this->db->like('shp.sh_ver', $ver);
	    	// }	    	
			$this->db->from('ship_log');
			return $this->db->count_all_results();
	    }
	}
	        
?>