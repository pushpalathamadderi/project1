<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct() {
        parent::__construct();

        // Load the database library
        $this->load->database();

        $this->userTbl = 'users';
    }

    /*
     * Get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);

        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
            }
        }

        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }

            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->row_array():false;
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():false;
            }
        }
        print_r($result);exit;
        //return fetched data
        return $result;
    }

    /*
     * Insert user data
     */
    public function insert($data){
        //add created and modified date if not exists
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }

        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);

        //return the status
        return $insert?$this->db->insert_id():false;
    }

    /*
     * Update user data
     */
    public function update($data, $id){
        //add modified date if not exists
        if(!array_key_exists('modified', $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }

        //update user data in users table
        $update = $this->db->update($this->userTbl, $data, array('id'=>$id));

        //return the status
        return $update?true:false;
    }

    /*
     * Delete user data
     */
    public function delete($id){
        //update user from users table
        $delete = $this->db->delete('users',array('id'=>$id));
        //return the status
        return $delete?true:false;
    }

    public function getDatatableList($table_name, $select = '', $where = array(), $limit = '', $start = 0, $search = '', $order_by = '', $join_tables= array(), $join_table_condition= array(),$left_join_tables=array(), $left_join_table_condition=array(), $or_where=array(), $group_by='',$having=''){
       if($select == ''){
           $select = '*';
       }
       $this->db->select($select);
       $this->db->from($table_name);

       if(is_array($join_tables)){
         foreach($join_tables as $key => $jt){
           $this->db->join($jt,$join_table_condition[$key]);
         }
       }

       if(is_array($left_join_tables)){
         foreach($left_join_tables as $k => $ljt){
           $this->db->join($ljt,$left_join_table_condition[$k],'left');
         }
       }

       if(!empty($where)){
         $this->db->where($where);
         if(!empty($or_where)){
           $this->db->where($or_where);
         }
       }
       if($search){
         $this->db->group_start();
         $i=0;
         foreach($search as $key => $value) {
           if($i == 0) {
             $this->db->like($key, $value);
           } else {
             $this->db->or_like($key, $value);
           }
           $i++;
         }
         $this->db->group_end();
       }
       if($group_by != ''){
        $this->db->group_by($group_by);
       }
       if($having != ''){
         $this->db->having($having);
       }
       if($order_by != ''){
           $this->db->order_by($order_by);
       }
       if($limit != '' && $start != ''){
           $this->db->limit($limit, $start);
       }
       $query = $this->db->get();
       $result = $query->result_array();
       return empty($result) ? array() : $result;
    }

}
