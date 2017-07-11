<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class M_address extends CI_Model {
	
	    /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'address';
	
	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'add_id';
	
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
	        $this->db->join('state st', 'st.state_id = address.state', 'left');
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
	    public function getBy($where = NULL) {
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
	        $this->db->join('state st', 'st.state_id = address.state', 'left');
	        $result = $this->db->get()->result();
	        if ($result) {
	            return $result;
	        } else {
	            return false;
	        }
	    }
	    public function getName($id = null)
	    {
	    	$this->db->select('us_username');
	    	$this->db->from('user');
	    	$this->db->where('us_id', $id);
	    	$result = $this->db->get()->result();
	    	$result = array_shift($result);
	    	return $result->us_username;
	    }

	    public function getLvl(){
	    	$this->db->select("*");
	    	$this->db->from('user_level ul');
	    	$result = $this->db->get()->result();
	    	return $result;
	    }
	     public function checkEmail($email)
	    {	    	
	    	$this->load->library("my_func");
	    	$us_email = array(
	    		'us_email' => $email 
	    	);
	    	// $us_pass = array(
	    	// 	'us_pass' => $pass 
	    	// );

	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where($us_email);
	    	// $this->db->where($us_pass);
	    	$result = $this->db->get()->result();
	    	if ($result) {	
	    		//if ($this->my_func->scpro_decrypt($result[0]->us_pass) === $pass) {
	    			return array_shift($result);
	    		//}

	    	}
	    	return false;
	    }
	    public function getAll($where = null , $all = false)
	    {
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
	        if (!$all) {
	        	$this->db->where('state >', 0);
	        }	        
	        $this->db->join('state', 'state = state_id', 'left');
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
	     public function getAll2($where = null )
	    {
	    	$userId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
	    	$this->db->select('*');
	        $this->db->from(self::TABLE_NAME);
	        $this->db->where('us_id',$userId);
	        $this->db->where('state >', 0);	        
	        $this->db->join('state', 'state = state_id', 'left');
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
	     public function getAdd($where = null , $status = null)
	    {
	    	$this->db->select('*');
	        $this->db->from(self::TABLE_NAME);
	        if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where('us_id', $where);
	                if($status !== NULL){
	                $this->db->where('status', $status);
	            	}
	            }
	        }
	        
	        	$this->db->where('state >', 0);
	               
	        $this->db->join('state', 'state = state_id', 'left');
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

	       public function resetStat($where = array()) {
            if (!is_array($where)) {
                $where =array('us_id' => $where);
                $status =array('status' => 0);
            }
	        $this->db->update(self::TABLE_NAME, $status, $where);
	        return $this->db->affected_rows();
	    }
	

	       public function updateStat($data = array(), $where = array()) {
            if (!is_array($where)) {
                $where =array(self::PRI_INDEX => $where);
                $pr_id =array('status' => $data);
            }
	        $this->db->update(self::TABLE_NAME, $pr_id, $where);
	        return $this->db->affected_rows();
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
	}
	        
?>