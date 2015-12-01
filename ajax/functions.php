<?php
include("../config.php");

function fetch_classes(){
$sql = "SELECT * FROM classes";
$res = mysql_query($sql);

$data = array();
	while($row = mysql_fetch_object($res)){
		$data[] = array('id'=>$row->id, 'name'=>$row->name);		
	}
	echo json_encode($data);
	exit;
}

function fetch_interests(){
$sql = "SELECT * FROM interests";
$res = mysql_query($sql);

$data = array();
	while($row = mysql_fetch_object($res)){
		$data[] = array('id'=>$row->id, 'name'=>$row->name);		
	}
	echo json_encode($data);
	exit;
}



function add_student(){

parse_str($_POST[form], $formdata);
$sql = "INSERT INTO students (roll_no, name, class_id, pic, address, gender)
		VALUES('".$formdata['roll_no']."', '".$formdata['name']."', '".$formdata['class_id']."', '', '".$formdata['address']."', '".$formdata['gender']."')";
mysql_query($sql);
echo "OK";
exit;
}


function load_students(){
	$sql = "SELECT students.id AS student_id, roll_no, students.name as student_name, gender, address, class_id, classes.name as class_name
			FROM  students INNER JOIN classes on students.class_id = classes.id";
	$res = mysql_query($sql);
	
	$data = array();
		while($row = mysql_fetch_assoc($res)){
			$data[] = $row;		
		}
		echo json_encode($data);			
}

function delete_student(){
	mysql_query("DELETE FROM students where id='".$_POST['id']."'");
	echo "OK";
}

if($_POST['action']=='fetch_classes'){
	fetch_classes();
}
else if($_POST['action']=='add_student'){
	add_student();
}
else if($_POST['action']=='load_students'){
	load_students();
}
else if($_POST['action']=='delete_student'){
	delete_student();
}
else if($_POST['action']=='fetch_interests'){
	fetch_interests();
}
?>