<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv= "Content-Type" content="text/html; charset-utf-8">
	<script type="text/javascript" src="<?php echo base_url('js/jquery-1.8.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/main.js') ?>"></script>
<title></title>

</head>

<body>
LOGGED IN! 
<form method="get" action="<?php echo base_url() . 'index.php/login/logout'; ?>">
<input type="Submit" value="Logout" />
</form>
<?php echo $is_logged_in; ?>
	<table >
		<tr>
			<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/find/'; ?>"><INPUT TYPE="submit" VALUE="Search"></td></FORM></FORM></td> 
			<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/find/add'; ?>"><INPUT TYPE="submit" VALUE="Add"></td></FORM></FORM></td> 
			<td><form method="link" action="<?php echo base_url() . 'index.php/find/update'; ?>"><input type="submit" value="Edit"/></td> </form></form></td>
			<td><form method="link" action="<?php echo base_url() . 'index.php/find/salaryview'; ?>"><input type="submit" value="Salary Update"/></td> </form></form></td>
			

		</tr>


	</table>

	<hr/>
