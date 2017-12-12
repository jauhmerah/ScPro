<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_parcel extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'parcel';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'pa_id';

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
            return $result;
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

    public function getPa_id($arr = NULL)
    {
        if ($arr == NULL || !is_array($arr)) {
            return FALSE;
        }
        $this->db->select('pi_id');
        return $this->db->get(self::TABLE_NAME)->result();
    }
    public function get_ext($where = NULL) {
        $this->db->select('parcel.* , us.us_username');
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
        $this->db->join('user us', 'us.us_id = parcel.us_id', 'left');
        $data = $this->db->get()->result();
        if ($data) {
            $result = array();
            foreach ($data as $key) {
                $pa_id = $key->pa_id;
                $this->db->select('*');
                $this->db->from('parcel_ext pae');
                $this->db->where('pa_id', $pa_id);
                $this->db->join('type2 ty2', 'ty2.ty2_id = pae.ty2_id', 'left');
                $this->db->join('nicotine ni', 'ni.ni_id = pae.ty2_id', 'left');
                $this->db->join('category cat', 'cat.ca_id = ty2.ca_id', 'left');
                $arr['parcel'] = $key;
                $arr['item'] = $this->db->get()->result();
                $result[] = $arr;
                unset($arr);
            }
            return $result;
        } else {
            return false;
        }
    }
    public function countParcel($or_id = "NULL"){

        $this->db->where('or_id', $or_id);
        $this->db->from('parcel');
        return $this->db->count_all_results();

    }
}

?>
