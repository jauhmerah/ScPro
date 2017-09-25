<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_item2 extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'invento_items';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'it_id';

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL) {
        $CI = &get_instance();

        $this->db = $CI->load->database('anotherdb',TRUE);
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
         $this->db->where(self::PRI_INDEX, $where);
        // if ($where !== NULL) {
        //     if (is_array($where)) {
        //         foreach ($where as $field=>$value) {
        //             $this->db->where($field, $value);
        //         }
        //     } else {
        //         $this->db->where(self::PRI_INDEX, $where);
        //     }
        // }
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
     public function getList($where = NULL) {
        $CI = &get_instance();

        $this->db = $CI->load->database('anotherdb',TRUE);

        $this->db->select("*");
        $this->db->from(self::TABLE_NAME);
        $this->db->where('cat_id', $where);
        $result = $this->db->get()->result();

        return $result;

    }

    public function countItem(){
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
     
            $this->db->from(self::TABLE_NAME);
            $this->db->where('del_id', 0);
      
            $result = $this->db->count_all_results();
            
            return $result;
        }

         public function countDgr(){
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
     
            $this->db->from(self::TABLE_NAME);
            $this->db->where('it_qty <= it_danger');
            $this->db->where('del_id', 0);
            $result = $this->db->count_all_results();
            
            return $result;
        }

    public function totalVal()
               {
                $CI = &get_instance();

                $this->db = $CI->load->database('anotherdb',TRUE);

                $this->db->select('sum(it_price *it_qty) as price');
                $this->db->from('invento_items');
                $this->db->where('del_id', 0);
                $result=$this->db->get()->result();

                  return $result;
                    
              }

    public function totalQty()
          {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
            $this->db->select_sum('it_qty');
            $this->db->from('invento_items');
            $this->db->where('del_id', 0);
            $result=$this->db->get()->result();

            return $result;
                    
          }
      
    /**
     * Inserts new data into database
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insert(Array $data) {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
        if ($this->db->insert(self::TABLE_NAME, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

      public function updateQty1($qty , $wh , $id , $st=null)
      {
        $CI = &get_instance();

        $this->db = $CI->load->database('anotherdb',TRUE);
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        $this->db->where(self::PRI_INDEX, $wh);
        $result=$this->db->get()->result();
        $arr=array_shift($result);


        // $arr = array_shift($this->db->get()->result());
        if($st==1)
        {
          $total = $arr->it_qty + $qty;
        }
        else if($st==2)
        {
          $total = $arr->it_qty-$qty;
        }
        
        $a = array(
          'it_qty' => $total
        );
        $this->update($a , $arr->it_id);

         $diff=$total - $arr->it_qty; 

         $arr1 = array(
          'cat_id' => $arr->ct_category,
          'lg_type' => $st,
          'lg_item' => $arr->it_id,
          'lg_fromqty' =>$arr->it_qty,
          'lg_toqty' => $total,
          'lg_qtyDiff' => $diff,
          'us_user' => $id

        );

     

        $this->db->insert('invento_logs', $arr1);

        return true;
      }

    /**
     * Updates selected record in the database
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function update(Array $data, $where = array()) {
        $CI = &get_instance();

        $this->db = $CI->load->database('anotherdb',TRUE);
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
        $this->db->update(self::TABLE_NAME, $data, $where);
        return $this->db->affected_rows();
    }

     public function totalByOrder()
    {
        $CI = &get_instance();

        $this->db = $CI->load->database('anotherdb',TRUE);
        $this->db->select('ord.pur_date as date,MONTH(ord.pur_date) AS bulan , YEAR(ord.pur_date) as tahun, sum(ori.pi_qty) as total');
        $this->db->from('purchase_item ori');
        //$this->db->join('order_ext ox', 'ox.orex_id = ori.orex_id', 'left');
        $this->db->join('purchase ord', 'ori.purc_id = ord.pur_id', 'left');
        //$this->db->group_by('ori.orex_id');
        //$this->db->where('ord.or_del', 0);
        $this->db->group_by('date(ord.pur_date)');
        $this->db->order_by('ord.pur_date', 'asc');
       
        $result = $this->db->get()->result();
        return $result;
    }
        public function orderCount()
        {

            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
            $this->db->like('del_id', 0);
            // if ($ver != -1) {
            //     $this->db->like('ord.or_ver', $ver);
            // }           

            $this->db->from('invento_items');
            return $this->db->count_all_results();
        }

         public function orderCount2($st=0,$cat_id=null,$ni_id=null)
        {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
            $this->db->like('del_id', 0);
        

            $this->db->from('invento_items');

              if($st != 0){              
               $this->db->where('it_qty <= it_danger');
            }  

             if($cat_id != null && $ni_id != null){              
                $this->db->where('ct_category', $cat_id);
                $this->db->where('ni_id', $ni_id);
            }    
            return $this->db->count_all_results();
        }



      // public function getList()
      //   {


      //       $arr = $this->db->select('*')->from(self::TABLE_NAME)->get();
            
            /*$this->db->select('*');
            $this->db->from(self::TABLE_NAME);*/
            /*  if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }*/

           /* $arr = $this->db->get();*/

           /* for ($i=0; $i < sizeof($result); $i++) { 
                $result[$i]->supplier = $this->db->get()->result();
            }*/
        //     return $arr->result();
        // }

         public function getLvl(){
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);

            $this->db->select("*");
            $this->db->from('invento_categories');
            $result = $this->db->get()->result();
            return $result;
        }

        public function getAll($where = null , $all = false)
        {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);

            $this->db->select('*');
            $this->db->from('invento_items it');
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
                $this->db->where('it.it_id >', 0);
            }           
            $this->db->join('invento_categories cat', 'it.ct_category = cat.ct_id', 'left');

            $this->db->join('nicotine sub', 'it.ni_id = sub.ni_id', 'left');

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
        public function getAll2($limit = null , $start = null,  $all = false, $del = 0 )
        {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);

            $this->db->select('*');
            
            $this->db->from('invento_items it');
            
            if($del != 3){              
                $this->db->where('it.del_id', $del);
            }   
            if (!$all) {
                $this->db->where('it.it_id >', 0);
            }           
            $this->db->join('invento_categories cat', 'it.ct_category = cat.ct_id', 'left');

            $this->db->join('nicotine sub', 'it.ni_id = sub.ni_id', 'left');

            if ($limit !== null && $start !== null) {
                $this->db->limit($limit, $start);
            }   
            $this->db->order_by('it.it_name', 'asc');
            $this->db->order_by('it.ct_category', 'asc');
            $result = $this->db->get()->result();
            
            if ($result) {
                // if ($where !== NULL) {
                //     return array_shift($result);
                // } else {
                    return $result;
                // }
            } else {
                return false;
            }
        }

        public function getAll3($limit = null , $start = null, $st = 0, $all = false, $del = 0 )
        {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);

            $this->db->select('*');
            $this->db->from('invento_items it');
            // if ($where !== NULL) {
            //     if (is_array($where)) {
            //         foreach ($where as $field=>$value) {
            //             $this->db->where($field, $value);
            //         }
            //     } else {
            //         $this->db->where(self::PRI_INDEX, $where);
            //     }
            // }


            if($del != 3){              
                $this->db->where('it.del_id', $del);
            }   
            if($st != 0){              
               $this->db->where('it_qty <= it_danger');
            }   
            if (!$all) {
                $this->db->where('it.it_id >', 0);
            }           
            $this->db->join('invento_categories cat', 'it.ct_category = cat.ct_id', 'left');

            $this->db->join('nicotine sub', 'it.ni_id = sub.ni_id', 'left');

            if ($limit !== null && $start !== null) {
                $this->db->limit($limit, $start);
            }   

            $result = $this->db->get()->result();
            
            if ($result) {
                // if ($where !== NULL) {
                //     return array_shift($result);
                // } else {
                    return $result;
                // }
            } else {
                return false;
            }
        }
        public function getAll4($limit = null , $start = null, $st = 0,$cat_id =null , $ni_id=null , $all = false, $del = 0 )
        {
            $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);

            $this->db->select('*');
            $this->db->from('invento_items it');
            // if ($where !== NULL) {
            //     if (is_array($where)) {
            //         foreach ($where as $field=>$value) {
            //             $this->db->where($field, $value);
            //         }
            //     } else {
            //         $this->db->where(self::PRI_INDEX, $where);
            //     }
            // }

            if($cat_id != null && $ni_id != null){              
                $this->db->where('it.ct_category', $cat_id);
                $this->db->where('it.ni_id', $ni_id);
            }    
            if($del != 3){              
                $this->db->where('it.del_id', $del);
            }   
            if($st != 0){              
               $this->db->where('it_qty <= it_danger');
            }   
            if (!$all) {
                $this->db->where('it.it_id >', 0);
            }   

            $this->db->join('invento_categories cat', 'it.ct_category = cat.ct_id', 'left');

            $this->db->join('nicotine sub', 'it.ni_id = sub.ni_id', 'left');

            if ($limit !== null && $start !== null) {
                $this->db->limit($limit, $start);
            }   

            $result = $this->db->get()->result();
            
            if ($result) {
                // if ($where !== NULL) {
                //     return array_shift($result);
                // } else {
                    return $result;
                // }
            } else {
                return false;
            }
        }

        

    /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {
        $CI = &get_instance();

        $this->db = $CI->load->database('anotherdb',TRUE);
            $where = array(self::PRI_INDEX => $where);
    
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }


      public function del($data = array(), $where = array()) {
        $CI = &get_instance();

            $this->db = $CI->load->database('anotherdb',TRUE);
            if (!is_array($where)) {
                $where =array(self::PRI_INDEX => $where);
                $del_id =array('del_id' => $data);
            }
          $this->db->update(self::TABLE_NAME, $del_id, $where);
          return $this->db->affected_rows();
      }
}
        
?>

