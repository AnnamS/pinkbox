<?php if(isset($deleteMessage)){echo $deleteMessage;} ?>


<form ACTION="<?php echo base_url() . 'index.php/site/search'; ?>" method='GET'>
                    First name:         <input type=text name='firstname'> <br/>
                    Last name:          <input type=text name='lastname'><br/>
                    Department Name:    <select name="dept">
<option value=""></option>
<option value="Marketing">Marketing</option>
<option value="Finance">Finance</option>
<option value="Human Resources">Human Resources</option>
<option value="Development">Development</option>
<option value="Quality Management">Quality Management</option>
<option value="Sales">Sales</option>
<option value="Research">Research</option>
<option value="Customer Service">Customer Service</option>


</select><br/>
                    Current job Title:  <select name="jobtitle">
<option value=""></option>
<option value="Staff">Staff</option>
<option value="Engineer">Engineer</option>
<option value="Assistant Engineer">Assistant Engineer</option>
<option value="Senior Engineer">Senior Engineer</option>
<option value="Technique Leader">Technique Leader</option>



</select><br/>
					<INPUT TYPE="submit" VALUE="Search">
           </form>