<?php if(isset($updateMessage)){echo $updateMessage;} ?>
<?php if(isset($PDmsg)){echo $PDmsg;} ?>

<form action = "<?php echo site_url('find/updateemp') ?>" method = "get">

		<table>
			<thead>
				<th>Employee No</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th>Hire Date</th>
					

			</thead>

			<tbody>
				<?php foreach($rows as $row => $value) : ?>


				<tr>
					<td><?php echo $value->emp_no; $emp_no =  $value->emp_no; ?></td>
					<td> <input type="text" name="first_name" value="<?php echo $value->first_name; ?>" /></td>
					<td> <input type="text" name="last_name" value="<?php echo $value->last_name; ?>" /></td>
					<td> <input type="text" name="birth_date" value="<?php echo $value->birth_date; ?>" /></td>
					<td> <input type="text" name="gender" value="<?php echo $value->gender; ?>" /></td>
					<td> <input type="text" name="hire_date" value="<?php echo $value->hire_date; ?>" /></td>
				


					
				
				</tr>
					<?php endforeach; ?>
</tbody>
</table>
<br/>
<table>
<tr>
<input type="hidden" name="emp_no" value="<?php echo $emp_no; ?>" />
<td><input type="submit" value="Update" /> </td></form>
<td width="500"></td>
<td><form method="get" action="<?php echo base_url(). "index.php/find/promotedemote";?>" ><input type="hidden" name="emp_no" value="<?php echo $emp_no;?>"/><input type="hidden" name="promORdem" value="<?php echo $status?>"/><input type="submit" value="<? if($status == "true"){echo "Demote";}else{echo "Promote";}?>" /></form> </td>
</tr>
</table>



