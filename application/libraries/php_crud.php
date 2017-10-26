<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author: Vinod Selvin
 * @Desc: Php Crud entire logic to be written here
 */
class Php_crud {

    public function __construct() {

    }
    
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
        
        $exists = $CI->Php_crud_model->tableExists($table_name);
        
        if(!$exists){
            
            $final_result['error'] = 'true';
            
            $final_result['message'] = 'Error: Selected Table Doesn\'t Exists in the Database.';
            
            return $final_result;
        }
        else{
            
            if (empty($this->select_column)) {
            
                $select = '*';
            } 
            else {
                
                $select = $this->select_column;
                
                $exists = $CI->Php_crud_model->columnExists($table_name, $select);
                
                if(!$exists){
            
                    $final_result['error'] = 'true';

                    $final_result['message'] = 'Error: Selected Column Doesn\'t Exists in the Table.';

                    return $final_result;
                }
                
                $final_select = $this->_primaryKeyExistInSelect($table_name, $select, $final_result['primary_key']);

                $select = $final_select['select'];

                $final_result['primary_key_hidden'] = $final_select['hidden'];
                
            }
           
           $final_result['primary_key'] = $this->_getPrimaryKey($table_name);
            
        }

        $result = $CI->Php_crud_model->select_table($table_name, $select, $final_result['primary_key']);

        if (empty($result['data'])) {

            $final_result['error'] = 'true';

            $final_result['message'] = 'No records found (or) Table Name might be missing/ wrong..';
            
            return $final_result;
        }

        $final_result['data_type'] = $result['data_type'];
        
        $final_result['table_data'] = $result['data'];
        
        $final_result['table_name'] = $table_name;

        return ($final_result);
    }
    
    function _getPrimaryKey($table_name){
        
        $CI = & get_instance();

        $CI->load->model('Php_crud_model');
        
        return $CI->Php_crud_model->get_primary_key($table_name);
    }
    
    function _primaryKeyExistInSelect($table_name, $select, $primary_key){
        
        $final_select;
        
        if(in_array($primary_key, $select)){

            $final_select['hidden'] = 'false';
        }
        else{
            
            array_unshift($select, $primary_key);
            
            $final_select['hidden'] = 'true';
        }
        
        $final_select['select'] = $select;
        
        return $final_select;
    }

}
