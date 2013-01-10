<?php

	class Site_model extends CI_Model{

	function get_records ($firstname, $lastname, $dept, $jobtitle)

{

	$query = $this->db->like('first_name', $firstname)
			->from('employees');

	$res['rows'] = $query->get()->result();
	$res['num_rows'] = count($res['rows']);

	return $res;

}

function getEmployeeData($emp_no)
{

	$query = $this->db->where('emp_no', $emp_no)
			->from('employees');

	$res['rows'] = $query->get()->result();
 
	return $res;


}

function checkDeptManager($emp_no)
{
	$db = $this->db->where('e.emp_no', $emp_no)
			->where('m.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_manager AS m', 'm.emp_no = e.emp_no');
		
		$query['rows'] = $db->get()->result();
		$rows = count($query['rows']);
		
		if($rows > 0)
		{	
			$status = "true";
		}
		else 
		{
			$status = "false";
		}
		
	
		
		return $status;

}

 function get_records_two($firstname,$lastname,$department,$jobtitle)
 {
        $q = $this->db->select('employees.emp_no AS emp_no, 
        						employees.first_name AS firstname, 
        						employees.last_name AS lastname, 
        						titles.title AS jobtitle,
								departments.dept_name AS dept,
								departments.dept_no AS deptid')
                        ->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0)
								AS ismanager', false)
                        
                        ->from('employees')
                        ->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
                        ->join('departments', 'departments.dept_no = dept_emp.dept_no')
                        ->join('titles', 'titles.emp_no = employees.emp_no')
                        ->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
                        ->where('titles.to_date', '9999-01-01')
                        ->where('dept_emp.to_date', '9999-01-01');
                        if (!empty($firstname)) {
                        $this->db->like('employees.first_name', $firstname, 'both');
                        }
                        if (!empty($lastname)) {
                        $this->db->like('employees.last_name', $lastname, 'both');
                        }
                        if (!empty($department)) {
                        $this->db->where('departments.dept_name', $department);
                        }
                        if (!empty($title)) {
                        $this->db->where('titles.title', $title);
                        }

                $res['rows'] = $q->get()->result();
	$res['num_rows'] = count($res['rows']);

	return $res;

        }

	function add_record($birth_date,$first_name,$last_name,$gender,$hire_date,$salary,$manager,$dept,$jobtitle)
{
				$this->db->set('birth_date',$birth_date);
				$this->db->set('first_name',$first_name);
				$this->db->set('last_name',$last_name);
				$this->db->set('gender',$gender);
				$this->db->set('hire_date',$hire_date);
				$query = $this ->db ->insert('employees');
				
		$inserted = $this->db->insert_id();
		
		
		$this->db->set('emp_no',$inserted);
		$this->db->set('dept_no',$dept);
		$this->db->set('from_date',$hire_date);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_emp');
		
		
		if($manager == "Yes")
		{
		
		
		$this->db->set('dept_no', $dept);
		$this->db->set('emp_no',$inserted);
		$this->db->set('from_date',$hire_date);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_manager');
		
		
		}
		
		$this->db->set('emp_no',$inserted);
		$this->db->set('title',$jobtitle);
		$this->db->set('from_date',$hire_date);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('titles');
		
		$this->db->set('emp_no',$inserted);
		$this->db->set('salary',$salary);
		$this->db->set('from_date',$hire_date);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('salaries');
					
				return true;
}
	

	function update_record($data, $emp_no)
{

	$this->db->where('emp_no', $emp_no);
	$this->db->update('employees', $data);
}

	function delete_record($emp_no)
{

	$this->db->where('emp_no', $emp_no);
	$this->db->delete('employees');

}


public function get_department($emp_no)
	{
		$db = $this->db->select('d.dept_no')
			->where('e.emp_no', $emp_no)
			->where('d.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_emp d', 'd.emp_no = e.emp_no');
	
		$retr['dept'] = $db->get()->result();
	
		$retr['deptField'] = array
		(
		'dept_no' => 'Dept No'	
		);
	
		return $retr;
	}

public function promote_employee($emp_no, $dept)
	{
		$today = date("Y-m-d");
		
		$this->db->set('dept_no',$dept);
		$this->db->set('emp_no',$emp_no);
		$this->db->set('from_date',$today);
		$this->db->set('to_date','9999-01-01');
		
		$this->db->insert('dept_manager');
		
		return true;
	}

	public function demote_employee($emp_no, $dept)
	{
		$today = date("Y-m-d");
		
		$db = $this->db->where('e.emp_no', $emp_no)
			->where('m.to_date', '9999-01-01')
			->from('employees AS e')
			->join('dept_manager m', 'm.emp_no = e.emp_no');
		
		$currDeptmgr = $db->get()->result();
		$deptmgrFields = array(
		'dept_no' => 'Dept No',
		'emp_no' => 'Emp No',
		'from_date' => 'from_date',
		'to_date' => 'to_date'
		);
		
		foreach($currDeptmgr as $deptmgrs)
		{	
			foreach($deptmgrFields as $field_name => $field_display)
			{ 
				if($field_name == "dept_no"){ $oldDeptmgr = $deptmgrs->$field_name;}
				elseif($field_name == "from_date"){ $from_date = $deptmgrs->$field_name;}
			}	
		}
		
		$data = array
		(
			'emp_no' => $emp_no,
			'dept_no' => $oldDeptmgr,
			'from_date' => $from_date,
			'to_date' => $today
		);

			$this->db->where('emp_no', $emp_no)
			->where('to_date', '9999-01-01')
			->from('dept_manager');
			$this->db->update('dept_manager', $data);
			
		return true;
	}

	function get_old_salary($id) {
		$this->db->select('salary')
			->from('salaries')
			->where('emp_no', $id)
			->where('to_date', '9999-01-01');
		$result = $this->db->get();
		return $result->result();
	}

	public function change_last_salary($id, $last_salary) {
		//update the last salary in the database
		$date_change = array('to_date' => date("Y-m-d"));
		$this->db->where('emp_no', $id)
			->where('salary', $last_salary)
			->where('from_date !=', date("Y-m-d"))
			->update('salaries', $date_change);
	}

	public function update_salary($id, $last_salary, $new_salary) {
		$this->change_last_salary($id, $last_salary);
		//set the new salary
		$salary_vars = array(
			'emp_no' => $id,
			'salary' => $new_salary,
			'from_date' => date("Y-m-d"),
			'to_date' => '9999-01-01'
		);
		$this->db->set($salary_vars)
			->insert('salaries');

		
	}
}