<?php

class Find extends CI_Controller{

function index()
{
	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'search_form';
	$this->load->view('includes/template', $data);

}

function findemp()
{
	$firstname = $this->input->get('firstname');
	$lastname = $this->input->get('lastname');
	$dept = $this->input->get('dept');
	$jobtitle = $this->input->get('jobtitle');

	$this->load->model('site_model');
	$res = $this->site_model->get_records_two($firstname, $lastname, $dept, $jobtitle);

	$data['count'] = $res['num_rows'];
	$data['results'] = $res['rows'];
	
	$is_logged_in = $this->session->userdata('is_logged_in');
	echo json_encode($data);
	//$this->load->view('includes/template', $data);
}


function add(){

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'add_view';
	$this->load->view('includes/template', $data);
}

public function addemp () 
{
		$birth_date = $this->input->get('birth_date');
		$first_name = $this->input->get('first_name');
		$last_name = $this->input->get('last_name');
		$gender = $this->input->get('gender');
		$hire_date = $this->input->get('hire_date');
		$salary = $this->input->get('salary');
		$manager = $this->input->get('manager');
		$dept = $this->input->get('dept');
		$jobtitle = $this->input->get('jobtitle');
		
		$this->load->model('site_model');
		$this->site_model->add_record($birth_date,$first_name,$last_name,$gender,$hire_date,$salary,$manager,$dept,$jobtitle);
		$data['addMessage'] = 'Employee Added.';
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'add_view';
		$this->load->view('includes/template', $data);
		
	}

function update()
{

	$emp_no = $this->input->get('emp_no');
	
	if ($emp_no == null)
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view_noemp';
		$this->load->view('includes/template', $data);


	}
	else
	{
		$this->load->model('site_model');
		$res = $this->site_model->getEmployeeData($emp_no);
		$status = $this->site_model->checkDeptManager($emp_no);
		$data['rows'] = $res['rows'];
		$data['emp_no'] = $emp_no;
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		$data['status'] = $status;
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view';
		$this->load->view('includes/template', $data);

	}
	

}
function updateemp()
{

	$emp_no = $this->input->get('emp_no');
	$first_name = $this->input->get('first_name');
	$last_name = $this->input->get('last_name');
	$birth_date = $this->input->get('birth_date');
	$gender = $this->input->get('gender');
	$hire_date = $this->input->get('hire_date');
	

	$data = array(
	'first_name'=>$first_name,
	'last_name'=>$last_name,
	'birth_date'=>$birth_date,
	'emp_no'=>$emp_no,
	'gender'=>$gender
	);
	
	$this->load->model('site_model');
	$res = $this->site_model->update_record($data, $emp_no);

	$this->load->model('site_model');
	$res = $this->site_model->getEmployeeData($emp_no);

	$data['rows'] = $res['rows'];
	$data['emp_no'] = $emp_no;
	$data['updateMessage'] = 'Employee Details Updated.';

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'update_view';
	$this->load->view('includes/template', $data);

}

function delete()
{

	$emp_no = $this->input->get('emp_no');

	$data['emp_no'] = $emp_no;

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'delete_view';
	$this->load->view('includes/template', $data);
}

function deleteemp()
{
	$emp_no = $this->input->get('emp_no');
	
	$this->load->model('site_model');
	$res = $this->site_model->delete_record($emp_no);
	
	$data['deleteMessage'] = 'Employee Deleted.';

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'search_form';
	$this->load->view('includes/template', $data);
}

function promotedemote()
{
	$emp_no = $this->input->get('emp_no');
	
		$getDept = $this->site_model->get_department($emp_no);
		$deptField = $getDept['deptField'];
		$department = $getDept['dept'];
		
	foreach($department as $depts)
	{	
		foreach($deptField as $field_name => $field_display) 
		{ 
		if($field_name == "dept_no"){ $dept = $depts->$field_name;}
		}	
	}
	
	$promORdem = $this->input->get('promORdem');
	
	if($promORdem == "true")
	{
		$this->load->model('site_model');
		$this->site_model->demote_employee($emp_no, $dept);
		$data['PDmsg'] = "Employee Demoted";
	}
	else
	{
		$this->load->model('site_model');
		$this->site_model->promote_employee($emp_no, $dept);
		$data['PDmsg'] = "Employee Demoted";
	}
	
		$this->load->model('site_model');
		
		$res = $this->site_model->getEmployeeData($emp_no);
		$status = $this->site_model->checkDeptManager($emp_no);
		$data['rows'] = $res['rows'];
		$data['emp_no'] = $emp_no;
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		
		
		$data['status'] = $status;
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view';
		$this->load->view('includes/template', $data);
	}
	function salaryview() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'salary_view';
		$this->load->view('includes/template', $data);
	}

	function salaryupdate() {
		$this->load->model('site_model');

		$emp_id = $this->input->post('emp_id');
		$new_salary = $this->input->post('salary');
		$old_salary = $this->site_model->get_old_salary($emp_id);
		$this->site_model->update_salary($emp_id, $old_salary[0]->salary, $new_salary);

		$data['PDmsg'] = "Salary Updated";
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'salary_view';
		$this->load->view('includes/template', $data);
	}
}