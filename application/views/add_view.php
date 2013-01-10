<?php if(isset($addMessage)){echo $addMessage;} ?>

<form action = "<?php echo site_url('find/addemp') ?>" method = "get">


Birth Date: 	<input type = "text" id ="birth_date" name="birth_date"><br/>

First Name:		<input type = "text" id ="first_name" name="first_name"><br/>

Last Name: 		<input type = "text" id ="last_name" name="last_name"><br/>

Gender: 		<input type = "text" id ="gender" name="gender"><br/>

Hire Date: 		<input type = "text" id ="hire_date" name="hire_date"><br/>

Salary:			<input type = "text" id ="salary" name="hire_date"><br/>

Manager: 		<select name="manager" id="manager">
				<option value="No" >No</option>
				<option value="Yes" >Yes</option>
				</select><br/>
				
Department: 	<select name="dept" id="dept">
				<option value="d002" >Finance</option>
				<option value="d003" >Human Resources</option>
				<option value="d001" >Marketing</option>
				<option value="d004" >Production</option>
				<option value="d006" >Quality Management</option>
				<option value="d008" >Research</option>
				<option value="d007" >Sales</option>  
				</select><br/>
				
Title:			<select name="jobtitle" id="jobtitle">
				<option value="Assistant Engineer" >Assistant Engineer</option>
				<option value="Engineer" >Engineer</option>
				<option value="Senior Engineer" >Senior Engineer</option>
				<option value="Staff" >Staff</option>
				<option value="Technique Leader" >Technique Leader</option>
				</select><br/>
<br/>
<input type ="submit" value="Add Employee">
</form>

