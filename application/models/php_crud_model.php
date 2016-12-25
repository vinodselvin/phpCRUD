<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Php_crud_model extends CI_Model {

	public function select_table($table_name, $select)
	{       
               $this->db->select($select);
               $result = $this->db->get($table_name);
               return $result;
               
	}
}
