<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class M_order extends CI_Model {
	
	    /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'order';
	
	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'or_id';
	
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
	    public function get2($where = NULL , $select = null) {
	        $select = ($select == null) ? '*' : $select ;
	        $this->db->select($select);
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
	    /* 
			$process
			view all = 0
			view new order = 1
			view progress order = 2
			view complete order = 3
	    */
	    public function getList($process = 0 , $del = 0 , $down = 0)
	    {
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->join('client', self::TABLE_NAME.'.cl_id = client.cl_id', 'left');
	    	switch ($process) {
	    		case 1:
	    			$this->db->where('pr_id', 1);
	    			break;
	    		case 2:
	    			$this->db->where('pr_id', 2);
	    			break;
	    		case 3:
	    			$this->db->where('pr_id', 3);
	    			break;
	    	}   	
	    	switch ($del) {
	    		case '1':
	    			$this->db->where('or_del', 1);
	    			break;
	    		default : $this->db->where('or_del', 0);
	    			break;
	    	}
	    	if ($down == 1) {
	    		$this->db->order_by('or_id', 'desc');
	    	}
	    	
	    	$result = $this->db->get()->result();
	    	for ($i=0; $i < sizeof($result); $i++) { 
	    		$this->db->select("*");
	    		$this->db->from('item');
	    		$this->db->where('or_id', $result[$i]->or_id);
	    		$this->db->join('type' , 'item.ty_id = type.ty_id' , 'left');
	    		$this->db->join('nicotine ni' , 'item.it_mg = ni.ni_mg' , 'left');
	    		$result[$i]->item = $this->db->get()->result();
	    	}
	    	return $result;
	    }

	    public function getList_ext($where = null ,$ver = 0, $up = 0 , $process = 0 , $del = -1)
	    {
	    	$this->db->select('*');
	        $this->db->from(self::TABLE_NAME);
	        if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where(self::TABLE_NAME.".".self::PRI_INDEX, $where);
	            }
	        }
	        if ($up != 1) {
	    		$this->db->order_by(self::TABLE_NAME.'.or_id', 'desc');
	    	}
	    	$this->db->join('process pr', self::TABLE_NAME.'.pr_id = pr.pr_id', 'left');	    	
	       	$this->db->join('client', self::TABLE_NAME.'.cl_id = client.cl_id', 'left');
	       	$this->db->join('order_ext' , self::TABLE_NAME.'.or_id = order_ext.or_id' , 'left');
	       	switch ($process) {
	    		case 1:
	    			$this->db->where(self::TABLE_NAME.'.pr_id', 1);
	    			break;
	    		case 2:
	    			$this->db->where(self::TABLE_NAME.'.pr_id', 2);
	    			break;
	    		case 3:
	    			$this->db->where(self::TABLE_NAME.'.pr_id', 3);
	    			break;
	    	}
	    	switch ($del) {
	    	 	case 0:
	    	 		$this->db->where(self::TABLE_NAME.'.or_del', 0);
	    	 		break;
	    	 	case 1:
	    	 		$this->db->where(self::TABLE_NAME.'.or_del', 1);
	    	 		break;
	    	 } 
	        $result = $this->db->get()->result();
	        //return $result;
	        $data = array();
	        foreach ($result as $key) {
				$this->db->select('*');
				if ($ver == 0) {
				 	$this->db->from('order_note');
				} else {
				 	$this->db->from('order_item oi');
				 	$this->db->join('type2 ty2', 'ty2.ty2_id = oi.ty2_id', 'left');
				 	$this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
				 	$this->db->join('nicotine nic', 'nic.ni_id = oi.ni_id', 'left');
				}
				$this->db->where('orex_id', $key->orex_id); 
				$res2 = $this->db->get()->result();
				$this->db->select("us_username");
				$this->db->from('user');
				$this->db->where('us_id', $key->us_id);
				$res3 = $this->db->get()->result();
				$res3 = array_shift($res3);
				$data[] = array(
					'staff' => $res3,
					'order' => $key,
					'item' => $res2
				);
	        }
	        return $data;
	    }

	    public function listOr($ver = 0 , $limit = null , $start = null , $del = 0)
	    {
	    	$this->db->select('ord.or_id , us1.us_username , cl.cl_name , ord.or_date ,ord.pr_id, pr.pr_desc');
	    	$this->db->from('order ord');
	    	if($del != 3){	    		
	    		$this->db->where('ord.or_del', $del);
	    	}
	    	$this->db->where('ord.or_ver', $ver);
	    	$this->db->join('client cl', 'ord.cl_id = cl.cl_id', 'left');
	    	$this->db->join('user us1' , 'ord.us_id = us1.us_id' , 'left');
	    	$this->db->join('process pr' , 'ord.pr_id = pr.pr_id' , 'left');
	    	$this->db->order_by('ord.or_id', 'desc');
	    	$result = $this->db->get()->result();
	    	return $result;
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
	        if (!is_array()) {
	            $where = array(self::PRI_INDEX => $where);
	        }
	        $this->db->delete(self::TABLE_NAME, $where);
	        return $this->db->affected_rows();
	    }

	    public function deleteList1($or_id = null)
	    {
	    	if ($or_id == null) {
	    		return false;
	    	}
	    	$arr = $this->get($or_id);
	    	$this->db->delete('item' , array('or_id' => $or_id));
	    	$this->db->delete('client' , array('cl_id' => $arr->cl_id));
	    	$where = array(self::PRI_INDEX => $or_id);	    	
	    	$this->db->delete(self::TABLE_NAME, $where);
	    	return true;
	    }

	    public function deleteList($or_id = null)
	    {
	    	if ($or_id == null) {
	    		return false;
	    	}
	    	$data = array(
	    		'or_del' => true
	    	);
	    	$where = array(self::PRI_INDEX => $or_id);
	        $this->db->update(self::TABLE_NAME, $data, $where);
	        //return $this->db->affected_rows();
	    	return true;
	    }

	    public function checkDone($or_id=null)
	    {
	    	if ($or_id != null) {
	    		$this->db->select('*');
	    		$this->db->from('item');
	    		$this->db->where('or_id', $or_id);
	    		$this->db->where('pr_id', 2);
	    		
	    		$result = $this->db->get()->result();
	    		if(sizeof($result) == 0){
	    			$this->update(array('pr_id'=>3) , $or_id);
	    		}
	    	}else{
	    		return false;
	    	}
	    }
	}
	        
?>