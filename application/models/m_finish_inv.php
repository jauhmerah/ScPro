<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_finish_inv extends CI_Model {


    const TABLE_NAME = 'finish_inv';

    const PRI_INDEX = 'fi_id';

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
                $where = array('bi_id' => $where);
            }
        $this->db->update(self::TABLE_NAME, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($where = array()) {
        if (!is_array()) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }

    public function stockIn($qty , $wh)
	{
	    	
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where('bi_id',$wh);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $arr->fi_qty + $qty;
	    	$a = array(
	    		'fi_qty' => $qty
            );
         
	    	$this->update($a , $wh);
            
            return $this->db->affected_rows();
            
	    	// $diff=$qty-$arr->sti_total;	



	    	// $arr1 = array(
	    	// 	'ty2_id' => $arr->ty2_id,
	    	// 	'ni_id' => $arr->ni_id,
	    	// 	'fromqty' => $arr->sti_total,
	    	// 	'toqty' => $qty,
	    	// 	'diff' => $diff,
	    	// 	'date_added' => $date_added,
	    	// 	'log_status' => 0,
	    	// 	'us_id' => $us_id
	    		

	    	// );

	    	// $this->db->insert('ship_log', $arr1);


    }
    
    public function stockOut($qty , $wh)
	{
	    	
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where('bi_id',$wh);
	    	$arr = array_shift($this->db->get()->result());
	    	$qty = $arr->fi_qty - $qty;
	    	$a = array(
	    		'fi_qty' => $qty
            );
         
	    	$this->update($a , $wh);
            
            return $this->db->affected_rows();
            
	    	// $diff=$qty-$arr->sti_total;	



	    	// $arr1 = array(
	    	// 	'ty2_id' => $arr->ty2_id,
	    	// 	'ni_id' => $arr->ni_id,
	    	// 	'fromqty' => $arr->sti_total,
	    	// 	'toqty' => $qty,
	    	// 	'diff' => $diff,
	    	// 	'date_added' => $date_added,
	    	// 	'log_status' => 0,
	    	// 	'us_id' => $us_id
	    		

	    	// );

	    	// $this->db->insert('ship_log', $arr1);


	}

}

/* End of file ModelName.php */


?>