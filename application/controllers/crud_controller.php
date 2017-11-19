<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_controller extends CI_Controller {

    public function index() {
        
        //$this->php_crud->select_column = array('parent_id','comment_name','comment_body');
        $this->load->library("php_crud");
        
        // $this->php_crud->add_graph = array('type'=>'multiline', 'cols' => array('date', 'query', 'preference'));

        $this->php_crud->select_table('user_data');

        $data['result'] = $this->php_crud->render_output();
        
        echo $data['result'];
        
    }
    
    public function testGraph(){
        
        $this->load->library("php_crud");
        
        $this->php_crud->select_table('mytable');
        
        $this->php_crud->add_graph = array('type'=> 'multiline', 'cols' => array('year','programming','biology','maths','physics'));

        $data['result'] = $this->php_crud->render_output();
        
        echo $data['result'];
    }

    public function edit_row() {
        $data = $this->input->post();

        $this->load->library("php_crud");

        //generate form input elements
        $response_data = $this->php_crud->getEditTemplate($data);

        echo json_encode($response_data);

    }

    public function delete_row() {
        
        $this->load->model('php_crud_model');

        $data = $this->input->post();

        $table_name = $data['table_name'];
        $row = $data['row'];
        $primary_key = $data['primary_key'];
        
        if(empty($primary_key))
        {
            $is_deleted = $this->php_crud_model->deleteRowWithData($table_name, $row);
        }
        else 
        {
            $is_deleted = $this->php_crud_model->deleteRowWithPK($table_name, $primary_key, $row);
        }

        if($is_deleted){
            $response['error'] = false;
            $response['message'] = "Successfully! deleted selected row";
        }
        else{
            $response['error'] = true;
            $response['message'] = "Error Occured! Configuration Issue, with table";
        }
            
        echo json_encode($response);
        
    }
	
	public function update() {
        
        $this->load->model('php_crud_model');

        $data = $this->input->post();

        $table_name = $data['table_name'];
        $row = $data['row'];
        $primary_key = $data['primary_key'];
        $actual_row = $data['actual_row'];
        
        $response = array();

        if(empty($primary_key))
        {
            $is_updated = $this->php_crud_model->updateRowWithData($table_name, $row, $actual_row);
        }
        else 
        {
            $is_updated = $this->php_crud_model->updateRowWithPK($table_name, $primary_key, $row, $actual_row);
        }
        
        if($is_updated == true){
            $response['error'] = false;
            $response['message'] = "Successfully! updated";
        }
        else{
            $response['error'] = true;
            $response['message'] = "Error Occured! Configuration Issue";
        }
            
        echo json_encode($response);
    }

    public function insert() {
        
        $this->load->model('php_crud_model');

        $data = $this->input->post();
        
        $table_name = $data['table_name'];
        $row = $data['row'];
        $primary_key = $data['primary_key'];
        
        $response = array();

        if(!empty($primary_key))
        {
            unset($row[$primary_key]);
        }
        
        $is_inserted = $this->php_crud_model->insertNewRecord($table_name, $row);
        
        if($is_inserted == true){
            $response['error'] = false;
            $response['message'] = "Successfully! Added New Row";
        }
        else{
            $response['error'] = true;
            $response['message'] = "Error Occured! Configuration Issue";
        }
            
        echo json_encode($response);
    }

}
