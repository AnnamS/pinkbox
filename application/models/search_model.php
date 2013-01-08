<?php

class Search_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function search($first_name) {

		// results query
		$this->db->select('emp_no, first_name as firstname, last_name as lastname')
			->from('employees')
			->where('first_name', $first_name)
			->limit(30);

		$ret = $this->db->get();
		return $ret->result();
	}

        }
}