<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Php_crud_model extends CI_Model {

    /*
     * @Author: Vinod Selvin
     * @Desc: Get All Data from table
     * @Params: $table_name-> Name of the table
     *          $select-> Column to be selected.
     */
    
    public function select_table($table_name, $select) {
        
        $this->db->select($select);
        
        $result['data'] = $this->db->get($table_name)->result_array();
        
        $this->db->select($select);
        
        $data_types = (array) $this->db->field_data($table_name);
        
        foreach ($data_types as $key => $value){
            
            $result['data_type'][$value->name] = $value;
        }

        return $result;
    }
    
    /*
     * @Author: Vinod Selvin
     * @Desc: Get Primary key of a table
     * @Params: $table_name-> Name of the table
     */

    public function get_primary_key($table_name) {
        
        $query = $this->db->query("SHOW KEYS FROM " . $table_name . " WHERE Key_name = 'PRIMARY'");

        if(!empty($query)){
            
            return $query->result_array()[0]['Column_name'];
        }
        
        return false;
    }
    
    /*
     * @Author: Vinod Selvin
     * @Desc: Check whether table exists, if exists return true else false
     * @Params: $table_name-> Name of the table
     */
    
    public function tableExists($table_name){
        
        $query = $this->db->query("SHOW TABLES LIKE '". $table_name ."'");
        
        if($query->num_rows == 1){
            
            return true;
        }
        else{
            
            return false;
        }
    }
    
    /*
     * @Author: Vinod Selvin
     * @Desc: Check if column exists in that table, if exists return true else false
     * @Params: $table_name-> Name of the table
     *          $column_name-> Name of the columns.
     */
    
    public function columnExists($table_name, $column_names){
        
        $flag = false;
        
        foreach ($column_names as $column_name){
            
            if ($this->db->field_exists($column_name, $table_name)){
                
               $flag = true;
            }
            else{
                
                return false;
            }
        }
        
        return $flag;
    }
}
