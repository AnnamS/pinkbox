<?php if(isset($addMessage)){echo $addMessage;} ?>
<?php if(isset($PDmsg)){echo $PDmsg;} ?>

<form action = "<?php echo site_url('find/salaryupdate') ?>" method="post">
	<label for="emp_id">Employee ID</label>
	<input type="text" name="emp_id" id="emp_id" />
	<label for="salary">Salary</label>
	<input type="text" name="salary" id="salary" />
	<input type="hidden" name="salary" value="submitted" />
	<input type="submit" value="submit"/>
</form>
