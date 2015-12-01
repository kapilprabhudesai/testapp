$(document).ready(function(){

	//To fetch class combo/dropdown starts
    $.post("ajax/functions.php",
    {
        action: "fetch_classes"
    },
    function(data, status){
        var obj = JSON.parse(data);
        var html_string='<option></option>';
        for(var i=0;i<obj.length;i++){
        	html_string +="<option value='"+obj[i].id+"'>"+obj[i].name+"</option>";
        }
        $("#class_id").html(html_string);
    });
	//To fetch class combo/dropdown ends


	//To fetch interests starts
    $.post("ajax/functions.php",
    {
        action: "fetch_interests"
    },
    function(data, status){
        var obj = JSON.parse(data);
        var html_string='';
        for(var i=0;i<obj.length;i++){
        	html_string +=obj[i].name+"<input type='checkbox' name='interests[]' value='"+obj[i].id+"'/><br/>";
        }
        $("#interests").html(html_string);
    });
	//To fetch interests ends

	load_students();



	//To add student start	
	$("#add_student").click(function(e){
		e.preventDefault();//prevents form submission using page refresh
//		JSON.stringify());
		if($("#student_name").val()==''){
			alert("name mandatory!");
			return false;
		}
		var data = $("#form_add_student").serialize();

	    $.post("ajax/functions.php",
	    {
	        action: "add_student",
	        form  : data
	    },
	    function(data, status){
	    	alert(data);
	    	load_students();

	    });		
	});
	//To add student ends	
});

	function load_students(){
		//To fetch students starts
	    $.post("ajax/functions.php",
	    {
	        action: "load_students"
	    },
	    function(data, status){
	    	console.log(data);
	        var obj = JSON.parse(data);
	        console.log(obj);
	        var html_string='';
	        for(var i=0;i<obj.length;i++){
	        	html_string +="<tr>";
	        	html_string +="<td>"+obj[i].student_name+"</td>";
	        	html_string +="<td>"+obj[i].gender+"</td>";
	        	html_string +="<td>"+obj[i].roll_no+"</td>";
	        	html_string +="<td>"+obj[i].class_name+"</td>";
	        	html_string +="<td>"+obj[i].address+"</td>";
	        	html_string +="<td><button onclick='delete_student("+obj[i].student_id+")'>Delete</button></td>";
	        	html_string +="</tr>";
	        }
	        $("#main_table").html(html_string);        
	    });
		//To fetch students ends		
	}


function delete_student(id){
    $.post("ajax/functions.php",
    {
        action: "delete_student",
        id  : id
    },
    function(data, status){
    	load_students();

    });		
}