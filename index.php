<?php 
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<h1>Student Management System</h1>
<div style="width:300px;float:left">
	<form method="post" id="form_add_student">
		Name<br/>
		<input id="student_name" type="text" name="name"><br/>
		Roll<br/>
		<input type="text" name="roll_no"><br/>
		Gender<br/>
		<select name="gender"><br/>
			<option></option>
			<option value="M">Male</option>
			<option value="F">Female</option>
		</select>
		<br/>Class
		<select id="class_id" name="class_id"><br/>
		</select>
		<br/>Interests<br/>
		<div id="interests"></div><br/>
		<br/>Photo<br/>
		<input type="file" name="photo"><br/>
		Address<br/>
		<textarea name="address"></textarea><br/>
		<button id="add_student">Add</button>	
	</form>	
</div>

<div style="float:left;width:300px">
	<table border="1">
		<thead>
			<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Roll No</th>
				<th>Class</th>
				<th>Address</th>
				<th>Options</th>
			</tr>		
		</thead>
		<tbody id="main_table">
		</tbody>
	</table>	
</div>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>