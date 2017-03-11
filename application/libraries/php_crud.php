<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author: Vinod Selvin
 * @Desc: Php Crud entire logic to be written here
 */
class Php_crud {

    public $select_column;

    /*
     * @Author: Vinod Selvin
     * @Desc: Returns Selected table. 
     * @Params: $table_name-> Name of the Table.
     */
    public function select_table($table_name) {
        
        $CI = & get_instance();

        $CI->load->model('Php_crud_model');

        $select = '';

        if (is_array($this->select_column)) {

            $select = implode(", ", $this->select_column);
        }
        
        if (empty($this->select_column)) {
            
            $select = '*';
        } 
        else {
            $select = $this->select_column;
        }

        $result = $CI->Php_crud_model->select_table($table_name, $select);

        $final_result['primary_key'] = $CI->Php_crud_model->get_primary_key($table_name);

        if (empty($result)) {

            $final_result['error'] = 'true';

            return $final_result;
        }

        $final_result['table_data'] = $result->result_array();

        $final_result['table_name'] = $table_name;

        return ($final_result);
    }

}
