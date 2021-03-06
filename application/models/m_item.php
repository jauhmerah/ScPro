<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_item extends CI_Model {

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
        if (!is_array()) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }
    public function totalByOrder()
    {
        $this->db->select('ord.or_date as date,MONTH(ord.or_date) AS bulan , YEAR(ord.or_date) as tahun, sum(ori.oi_qty) as total');
        $this->db->from('order_item ori');
        $this->db->join('order_ext ox', 'ox.orex_id = ori.orex_id', 'left');
        $this->db->join('order ord', 'ox.or_id = ord.or_id', 'left');
        //$this->db->group_by('ori.orex_id');
        $this->db->where('ord.or_del', 0);
        $this->db->group_by('date(ord.or_date)');
        $this->db->order_by('ord.or_date', 'asc');
       
        $result = $this->db->get()->result();
        return $result;
    }

    public function totalByFlavor($year = null , $month = -1 , $client = -1 , $mg = -1, $country = -1)
    {
        $this->db->select('ori.oi_id ,ty2.ty2_id as item_id , MONTH(ord.or_date) as month , YEAR(ord.or_date) as year , ni.ni_mg , ty2.ty2_desc as detail ,ca.* , sum(ori.oi_qty) as total');
        $this->db->from('order_item ori');
        $this->db->join('order_ext ox', 'ox.orex_id = ori.orex_id', 'left');
        $this->db->join('order ord', 'ox.or_id = ord.or_id', 'left');
        $this->db->join('type2 ty2' , 'ty2.ty2_id = ori.ty2_id' , 'left');
        $this->db->join('category ca' , 'ty2.ca_id = ca.ca_id' , 'left');
        $this->db->join('nicotine ni', 'ori.ni_id = ni.ni_id' , 'left');
        $this->db->join('client cl', 'ord.cl_id = cl.cl_id' , 'left');

        //$this->db->group_by('ori.orex_id');
        if ($year != null) {
            $this->db->where('YEAR(ord.or_date)', $year);
            if ($month != -1) {
                $this->db->where('MONTH(ord.or_date)', $month);
            }
        }
        if ($client != -1) {
            $this->db->where('ord.cl_id', $client);
        }
        if ($mg != -1) {
            $this->db->where('ni.ni_mg', $mg);
        }
        if ($country != -1) {
            $this->db->where('cl.cl_country', $country);
        }
        $this->db->group_by('ori.ty2_id');  
        $this->db->where('ord.or_del', 0);
        $this->db->order_by('ord.or_date', 'asc'); 
        $result = $this->db->get()->result();
        return $result;
    }
}
        
?>