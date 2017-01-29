	<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Php_crud_model extends CI_Model {

		public function select_table($table_name, $select)
		{
	    $this->db->select($select);
	    $result = $this->db->get($table_name);
	    return $result;
		}

	/*
	 * @Author: Vinod Selvin
	 * @Desc: Get Primary key of a table
	 */
		public function get_primary_key($table_name)
		{
			$query = $this->db->query("SHOW KEYS FROM ".$table_name." WHERE Key_name = 'PRIMARY'");
			return $query->result_array()[0]['Column_name'];
		}

	}
