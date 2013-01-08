
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		//$this->load->model('home_model');
	}
	
	public function index()
	{

		$data['is_logged_in'] = $this->session->userdata('is_logged_in');
		$data['main_content'] = 'home_view';
		$this->load->view('includes/template',$data);
	}

	public function addemp()
	{
		$data['is_logged_in'] = $this->session->userdata('is_logged_in');
		$data['main_content'] = 'add_view';
		$this->load->view('includes/template',$data);

	}
}