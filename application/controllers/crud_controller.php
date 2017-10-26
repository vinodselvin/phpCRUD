<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_controller extends CI_Controller {

    public function index() {
        
        $this->php_crud->select_column = array('parent_id','comment_name','comment_body');

        $data['result'] = $this->php_crud->select_table('comment');
        
        $this->load->view('static/header', $data);
        $this->load->view('crud_view', $data);
        $this->load->view('static/footer', $data);
    }

    public function edit_row() {
        $data = $this->input->post();
        print_r($data);
        exit;
        echo json_encode($data);
    }

    public function delete_row() {
        
        $this->load->model('php_crud_model');

        $data = $this->input->post();

        $table_name = $data['table_name'];
        $row = $data['row'];
        $primary_key = $data['primary_key'];
        
        if(empty($primary_key))
        {
            $this->php_crud_model->deleteRowWithData($table_name, $row);
        }
        else 
        {
            $this->php_crud_model->deleteRowWithPK($table_name, $primary_key, $row);
        }
        
    }

}
