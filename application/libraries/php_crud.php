<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Php_crud {

	public $select_column;
        
	public function select_table($table_name)
	{     
                $CI =& get_instance();

                $CI->load->model('Php_crud_model'); 
    
                $select = '';
                if(is_array($this->select_column)){

                    $select = implode(", ", $this->select_column);
                }
                if (empty($this->select_column)){
                    $select = '*';
                }
                else {
                    $select = $this->select_column;
                }
            
//               $this->load->model('php_crud_model');
               
               $result = $CI->Php_crud_model->select_table($table_name, $select);
               
               return ($result->result_array());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */