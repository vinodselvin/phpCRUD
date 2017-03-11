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
        
        $result = $this->db->get($table_name);
        
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

}
