<?php

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
	}

	public function findemp() {
		$first_name = $this->input->get('firstname');
		$this->load->model('search_model');

		$results = $this->search_model->search($first_name);

		$data['search'] = $results;

		$this->load->view('search_view', $data);
	}

}
