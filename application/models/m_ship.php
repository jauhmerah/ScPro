<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class M_ship extends CI_Model {
	
	    /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'ship';
	
	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'sh_id';
	
	    /**
	     * Retrieves recshp(s) from the database
	     *
	     * @param mixed $where Optional. Retrieves only the recshps matching given criteria, or all recshps if not given.
	     *                      If associative array is given, it should fit field_name=>value pattern.
	     *                      If string, value will be used to match against PRI_INDEX
	     * @return mixed Single recshp if ID is given, or array of results
	     */
	    public function get($where = NULL , $select = null) {
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
			view new ship = 1
			view progress ship = 2
			view complete ship = 3
	    */

		//start added
		 public function countshipType($num = 0 , $ver = -1){
      
      		if($num != 0){
            $this->db->where('pr_id', $num);
        	$this->db->from('ship');
        	if ($ver != -1) {
        		$this->db->where('sh_ver', $ver);
        	}
            $result = $this->db->count_all_results();
            }
            else{
            $this->db->from('ship');
            if ($ver != -1) {
        		$this->db->where('sh_ver', $ver);
        	}
            $result = $this->db->count_all_results();
            }
            return $result;
        }
        //end added
        //start added
        public function totalProfit(){
      
      		$this->db->select_sum('orn_price');
      		$this->db->from('ship_note');
            $result = $this->db->get()->result();
            return $result;
        }
        //end added        


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
       /*     if (!$all) {
                $this->db->where('us_lvl >', 0);
            }           
            $this->db->join('user_level ul', 'user.us_lvl = ul.ul_id', 'left');*/
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
	    			$this->db->where('sh_del', 1);
	    			break;
	    		default : $this->db->where('sh_del', 0);
	    			break;
	    	}
	    	if ($down == 1) {
	    		$this->db->ship_by('sh_id', 'desc');
	    	}
	    	
	    	$result = $this->db->get()->result();
	    	for ($i=0; $i < sizeof($result); $i++) { 
	    		$this->db->select("*");
	    		$this->db->from('item');
	    		$this->db->where('sh_id', $result[$i]->sh_id);
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
	    		$this->db->order_by(self::TABLE_NAME.'.sh_id', 'desc');
	    	}
	    	$this->db->where(self::TABLE_NAME.'.sh_ver', $ver);
	    	$this->db->join('process pr', self::TABLE_NAME.'.pr_id = pr.pr_id', 'left');	    	
	       	$this->db->join('client', self::TABLE_NAME.'.cl_id = client.cl_id', 'left');
	       	$this->db->join('ship_ext' , self::TABLE_NAME.'.sh_id = ship_ext.sh_id' , 'left');
	       	if ($process !== 0) {
	       		$this->db->where(self::TABLE_NAME.'.pr_id', $process);
	       	}	       	
	    	switch ($del) {
	    	 	case 0:
	    	 		$this->db->where(self::TABLE_NAME.'.sh_del', 0);
	    	 		break;
	    	 	case 1:
	    	 		$this->db->where(self::TABLE_NAME.'.sh_del', 1);
	    	 		break;
	    	 } 
	        $result = $this->db->get()->result();
	        //return $result;
	        $data = array();
	        foreach ($result as $key) {
				$this->db->select('*');
				if ($ver == 0) {
				 	$this->db->from('ship_note');
				} else {
				 	$this->db->from('ship_item si');
				 	$this->db->join('type2 ty2', 'ty2.ty2_id = si.ty2_id', 'left');
				 	$this->db->join('category ca', 'ca.ca_id = ty2.ca_id', 'left');
				 	$this->db->join('nicotine nic', 'nic.ni_id = si.ni_id', 'left');
				 	$this->db->order_by('ty2.ca_id', 'asc');
				}
				$this->db->where('shex_id', $key->shex_id); 
				$res2 = $this->db->get()->result();
				$this->db->select("us_username");
				$this->db->from('user');
				$this->db->where('us_id', $key->us_id);
				$res3 = $this->db->get()->result();
				$res3 = array_shift($res3);
				$data[] = array(
					'staff' => $res3,
					'ship' => $key,
					'item' => $res2
				);
	        }
	        return $data;
	    }
	    public function listOr($ver = 0 , $limit = null , $start = null , $del = 0 , $where = null)
	    {
	    	$this->db->select('shp.sh_id , shp.us_id , us1.us_username , cl.cl_name, shp.sh_acc , cl.cl_country , shp.sh_date , shp.sh_arrivedate ,shp.pr_id, pr.pr_desc , pr.pr_color, shp.sh_paid ');
	    	//, pic.img_url , pic.pi_title
	    	$this->db->from('ship shp');
	    	if($del != 3){	    		
	    		$this->db->where('shp.sh_del', $del);
	    	}	    	
	    	$this->db->order_by('shp.sh_id', 'desc');
	    	if ($limit !== null && $start !== null) {
	    		$this->db->limit($limit, $start);
	    	}	
	    	$this->db->where('shp.sh_ver', $ver);
	    	$this->db->join('client cl', 'shp.cl_id = cl.cl_id', 'left');
	    	$this->db->join('user us1' , 'shp.us_id = us1.us_id' , 'left');
	    	$this->db->join('process pr' , 'shp.pr_id = pr.pr_id' , 'left');
	    	//$this->db->join('picture pic' , 'shp.sh_id = pic.ne_id' , 'left');

	    	if ($where != null) {
	    		$this->db->where($where);
	    	}
	    	$result = $this->db->get()->result();
	    	return $result;
	    }

	    public function listsh_ext($ver = 0 , $limit = null , $start = null , $del = 0 , $where = null)
	    {
	    	$this->db->select('shp.sh_id , shp.us_id , us1.us_username , cl.cl_name, cl.cl_country , shp.sh_date ,shp.pr_id, pr.pr_desc , pr.pr_color, shp.sh_paid , pic.img_url , pic.pi_title');
	    	$this->db->from('ship shp');
	    	if($del != 3){	    		
	    		$this->db->where('shp.sh_del', $del);
	    	}	    	
	    	$this->db->ship_by('shp.sh_id', 'desc');
	    	if ($limit !== null && $start !== null) {
	    		$this->db->limit($limit, $start);
	    	}	
	    	$this->db->where('shp.sh_ver', $ver);
	    	$this->db->join('client cl', 'shp.cl_id = cl.cl_id', 'left');
	    	$this->db->join('user us1' , 'shp.us_id = us1.us_id' , 'left');
	    	$this->db->join('process pr' , 'shp.pr_id = pr.pr_id' , 'left');
	    	$this->db->join('picture pic' , 'shp.sh_id = pic.ne_id' , 'left');

	    	if ($where != null) {
	    		$this->db->where('shp.pr_id',$where);
	    	}
	    	$result = $this->db->get()->result();
	    	return $result;
	    }





	    public function listSearch($ver = 0 , $limit = null , $start = null , $del = 0 , $where = null)
	    {
	    	$this->db->select('shp.sh_id , shp.us_id , us1.us_username , cl.cl_name ,cl.cl_country, shp.sh_acc ,shp.sh_date ,shp.pr_id, pr.pr_desc , pr.pr_color, shp.sh_paid');
	    	$this->db->from('ship shp');
	    	if($del != 3){	    		
	    		$this->db->where('shp.sh_del', $del);
	    	}
	    	
	    	$this->db->ship_by('shp.sh_id', 'desc');
	    	if ($limit !== null && $start !== null) {
	    		$this->db->limit($limit, $start);
	    	}	
	    	$this->db->where('shp.sh_ver', $ver);
	    	$this->db->join('client cl', 'shp.cl_id = cl.cl_id', 'left');
	    	$this->db->join('user us1' , 'shp.us_id = us1.us_id' , 'left');
	    	$this->db->join('process pr' , 'shp.pr_id = pr.pr_id' , 'left');
	    	//$this->db->join('picture pic' , 'shp.sh_id = pic.ne_id' , 'left');
	    	if ($where != null) {
	    		$this->db->like($where);
	    	}
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
	     * Updates selected recshp in the database
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
	     * Updates selected recshp in the database
	     *
	     * @param Array $data Associative array field_name=>value to be updated
	     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	     * @return int Number of affected rows by the update query
	     */

	    /*pr_id,sh_id*/
	    public function updateShipment($data = array(), $where = array(), $date=null) {




	    	if($date!=null){

	    			 if (!is_array($where)) {
                $where =array(self::PRI_INDEX => $where);
               
                $info =array(
                	'pr_id' => $data,
                	'sh_arrivedate' => $date

                	);
                

            }
	        $this->db->update(self::TABLE_NAME, $info, $where);
	        return $this->db->affected_rows();
	    	}
           
	    }
	
	    /**
	     * Deletes specified recshp from the database
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

	    public function deleteList1($sh_id = null)
	    {
	    	if ($sh_id == null) {
	    		return false;
	    	}
	    	$arr = $this->get($sh_id);
	    	$this->db->delete('item' , array('sh_id' => $sh_id));
	    	$this->db->delete('client' , array('cl_id' => $arr->cl_id));
	    	$where = array(self::PRI_INDEX => $sh_id);	    	
	    	$this->db->delete(self::TABLE_NAME, $where);
	    	return true;
	    }

	    public function deleteList($sh_id = null)
	    {
	    	if ($sh_id == null) {
	    		return false;
	    	}
	    	$data = array(
	    		'sh_del' => true
	    	);
	    	$where = array(self::PRI_INDEX => $sh_id);
	        $this->db->update(self::TABLE_NAME, $data, $where);
	        //return $this->db->affected_rows();
	    	return true;
	    }

	    public function checkDone($sh_id=null)
	    {
	    	if ($sh_id != null) {
	    		$this->db->select('*');
	    		$this->db->from('item');
	    		$this->db->where('sh_id', $sh_id);
	    		$this->db->where('pr_id', 2);
	    		
	    		$result = $this->db->get()->result();
	    		if(sizeof($result) == 0){
	    			$this->update(array('pr_id'=>3) , $sh_id);
	    		}
	    	}else{
	    		return false;
	    	}
	    }

	    public function shipCount($ver = -1)
	    {
	    	$this->db->like('shp.sh_del', 0);
	    	if ($ver != -1) {
	    		$this->db->like('shp.sh_ver', $ver);
	    	}	    	
			$this->db->from('ship shp');
			return $this->db->count_all_results();
	    }

	    public function getIncome($currency = 1, $check = -1 ,$ver = 2 )
	    {
	    	/* 
				currency -> 1 myr , 2 usd , 3 GBP
				check -> 0 net income, 1 confirm income
	    	*/
			$this->db->select('MONTH(shp.sh_date) as month , YEAR(shp.sh_date) as year ,  orex.cu_id , cu.cu_desc , SUM(oi.oi_qty*oi.oi_price) AS sales');
			$this->db->from('ship shp');
			$filter = array(
				"orex.cu_id" => $currency,
				"shp.sh_ver" => $ver,
				"shp.sh_del" => 0,
				"shp.pr_id !=" => 4,
				"shp.pr_id !=" => 7
				);
			if ($check != -1) {
				$filter["shp.sh_acc"] = $check;
			}
			$this->db->where($filter);
			$this->db->join('ship_ext orex', 'orex.sh_id = shp.sh_id', 'left');
			$this->db->join('ship_item oi' , 'oi.orex_id = orex.orex_id' , 'left');
			$this->db->join('currency cu', 'cu.cu_id = orex.cu_id', 'left');			
			$this->db->group_by('MONTH(shp.sh_date) , YEAR(shp.sh_date)');
			$this->db->ship_by('shp.sh_date', 'asc');
			$result = $this->db->get()->result();
	    	return $result;
	    }
	}
	        
?>