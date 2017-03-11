<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_controller extends CI_Controller {

    public function index() {
//            $this->php_crud->select_column = array('id','unique_id','content');

        $data['result'] = $this->php_crud->select_table('user_data');

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

    public function delete_row($table_name, $row_id) {
        echo "U cannot delete me" . $table_name . " " . $row_id;
    }

}
