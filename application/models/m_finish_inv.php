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
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
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
 
    }

    public function countDgr()
    {
      
     
            $this->db->from(self::TABLE_NAME);
            $this->db->where('fi_qty < fi_danger');
        
            $result = $this->db->count_all_results();
            
            return $result;
    }
    public function countWrn()
    {
      
     
            $this->db->from(self::TABLE_NAME);
            $this->db->where('fi_qty = fi_danger');
        
            $result = $this->db->count_all_results();
            
            return $result;
    }

    public function countDanger(Type $var = null)
    {
	    $this->db->from(self::TABLE_NAME);
        $this->db->where('fi_qty < fi_danger');

        return $this->db->count_all_results();

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

    }
    
     public function new_log($qty , $where ,$us_id, $st)
	    {

	    	$date_added = date('Y-m-d H:i:s');

	    	$this->db->select('*');
	    	$this->db->from('finish_inv');
            $this->db->where('bi_id',$where);
            
	    	$arr = array_shift($this->db->get()->result());

	    	if($st==1)
            {
            $total = $arr->fi_qty + $qty;
            }
            else if($st==2)
            {
            $total = $arr->fi_qty-$qty;
            }

            $diff = $total - $arr->fi_qty; 
            
            


	    	$data = array(
	    		'bi_id' => $arr->bi_id,
	    		'fi_from' => $arr->fi_qty,
	    		'fi_to' => $total,
	    		'fi_diff' => $diff,
	    		'us_id' => $us_id,
	    		'ls_id' => $st
	    	);

            
	    	 if ($this->db->insert('finish_log',$data)) {
	            return $this->db->insert_id();
	        } else {
	            return false;
	        }
        }

}


?>