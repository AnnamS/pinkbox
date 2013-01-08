<?php if(isset($deleteMessage)){echo $deleteMessage;} ?>


<form action="<?php echo site_url('find/findemp') ?>" method='get' class="findemp_search">
                    First name:         <input type=text name='firstname' id="firstname"> <br/>
                    Last name:          <input type=text name='lastname' id="lastname"><br/>
                    Department Name:    <select name="dept" id="dept">
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
                    Current job Title:  <select name="jobtitle" id="title">
<option value=""></option>
<option value="Staff">Staff</option>
<option value="Engineer">Engineer</option>
<option value="Assistant Engineer">Assistant Engineer</option>
<option value="Senior Engineer">Senior Engineer</option>
<option value="Technique Leader">Technique Leader</option>



</select><br/>
					<input type="submit" value="Search" class="submit">
           </form>

<div class="search_results">

</div>