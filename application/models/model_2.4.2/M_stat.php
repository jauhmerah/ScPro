<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class M_stat extends CI_Model {

	    /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'order_item';

	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'oi_id';

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

		public function listStat($ca_id , $fromDate = NULL , $toDate = NULL , $del = 0)
		{
			$this->db->select('ty2.* , cat.ca_desc');
			$this->db->from('type2 ty2');
			$this->db->where('ty2.ca_id', $ca_id);
			$this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
			$item = $this->db->get()->result();
			$list = array();
			if ($item) {
				foreach ($item as $key) {
					$this->db->select('oi.* , ord.or_date');
					$this->db->from('order_item oi');
					$this->db->join('order_ext orex', 'orex.orex_id = oi.orex_id', 'left');
					$this->db->join('order ord', 'ord.or_id = orex.or_id', 'left');
					$where = array(
						'oi.ty2_id' => $key->ty2_id,
						'ord.or_del' => $del
					);
					if ($fromDate == NULL) {
						$where['ord.or_date >='] = $fromDate;
					}
					if ($toDate == NULL) {
						$where['ord.or_date <='] = $toDate;
					}
					$this->db->where($where);
					$item2['data'] = $this->db->get()->result();
					$item2['item'] = $key;
					$list[] = $item2;
					unset($item2);
				}
				return $list;
			}

		}
	}

?>
