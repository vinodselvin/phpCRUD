<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_controller extends CI_Controller {

    public function index() {
        
        //$this->php_crud->select_column = array('parent_id','comment_name','comment_body');
        $this->load->library("php_crud");
        
        $this->php_crud->select_table('user_data');

        $data['result'] = $this->php_crud->render_output();
        
        echo $data['result'];
        
    }

    public function edit_row() {
        $data = $this->input->post();

        //generate form input elements
        $response_data = $this->_generateEditTemplate($data);

        array_push($response_data, array(
                "tag" => "button",
                "class" => "btn btn-warning",
                "id"  => "form-btn-update",
                "html" => "Update"
            ));


        $result_array = array(
            array(
                "tag" => "form",
                "id"  => "edit-form",
                "_child" => $response_data
            )
        );
        
        echo json_encode($result_array);

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

    public function _generateEditTemplate($data){

        foreach ($data['row'] as $key => $value) {
            $template[] = array(
                "tag" => "div",
                "class" => "form-group",
                "_child" => array(
                                array(
                                    "tag" => "label",
                                    "class" => "form-label",
                                    "html" =>  $key),  

                                        array(
                                            "tag" => "input",
                                            "value" => $value,
                                            "type" => "text",
                                            "id"  => "edit-id-".$key,
                                            "class" => "form-control",
                                        )
                            )
            
            );
        }

        return $template;
    }

}
