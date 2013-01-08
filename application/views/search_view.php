<!DOCTYPE HTML>

<html lang="en-US">
<head>
	<title>Search</title>
		<meta charset="UTF-A") />

	</head>
	<body>
		<h3> Found <?php echo $num_rows;?> Records.</h3>
		<table>
			<thead>
				<th>Employee No</th> 
				<th>Firstname</th>
				<th>Lastname</th>

			</thead>

			<tbody>
				<?php foreach($rows as $row => $value) : ?>


				<tr>
					<td><?php echo $value->emp_no; ?></td>
					<td><?php echo $value->firstname; ?></td>
					<td><?php echo $value->lastname; ?></td>
					<?php if($is_logged_in == "is_logged_in"):?>
					<td><form method="get" action="<?php echo base_url() . 'index.php/find/update'; ?>"><input type="submit" value="edit" /> <input type="hidden" name="emp_no" value="<?php echo $value->emp_no; ?>" /></form></td>
					<td><form method="get" action="<?php echo base_url() . 'index.php/find/delete'; ?>"><input type="submit" value="delete" /> <input type="hidden" name="emp_no" value="<?php echo $value->emp_no; ?>" /></form></td>
					<?php endif; ?>
				</tr>
				<?php endforeach; ?>
</tbody>
</table>
</body>
</html>
