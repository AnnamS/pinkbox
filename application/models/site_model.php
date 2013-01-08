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

	function add_record($birth_date,$first_name,$last_name,$gender,$hire_date)
{
				$this->db->set('birth_date',$birth_date);
				$this->db->set('first_name',$first_name);
				$this->db->set('last_name',$last_name);
				$this->db->set('gender',$gender);
				$this->db->set('hire_date',$hire_date);
				$query = $this ->db ->insert('employees');
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

}