<html>
    <script src="../assets/javascripts/jquery-2.1.3.js"></script>
    <script>
        
        function sendRequest(u){
            // Send request to server
            //u a url as a string
            //async is type of request
            var obj=$.ajax({url:u,async:false});
            //Convert the JSON string to object
            var result=$.parseJSON(obj.responseText);
            return result;	//return object	
        }
        
        
        function getNurses(){
             var url = "../controllers/implementationOne-ViewNursesController.php?cmd=1";
            var obj = sendRequest(url);   
            if(obj.result == 1){
                
                
                
                var output = "";
                
                output += "<td>Nurse ID</td><td>Firstname</td><td>Surname</td><td>Age</td><td>Sex</td><td>Department</td>";

                 for(var i= 0 ;i < obj.nurses.length; i++){
                     if(i%2 == 0){
                    output += "<tr style ='background-color:lightgreen'".;
                     }
                     else{
                        output += "<tr style ='background-color:floralwhite'".; 
                     }
                    output += "<td>"+obj.nurses[i].user_id+"</td>";
                     
                     output += "<td>"+obj.nurses[i].user_fname+"</td>";
                     output += "<td>"+obj.nurses[i].user_sname+"</td>";
                     output += "<td>"+obj.nurses[i].age+"</td>";
                     output += "<td>"+obj.nurses[i].sex+"</td>";
                     output += "<td>"+obj.nurses[i].department+"</td>";
     
                     
                
                    $("#allnurses").html(output);
                 }
                
            }
            else{
            }
        }
        
        function addnurse(){
            var fn = $("#fname").val();
            var sn = $("#sname").val();
            var age = $("#age").val();
            var sex = $("#sex").val();
            var dp = $("#department").val();
            
            var url = "implementationThree-AddnurseController.php?cmd=1&firstname="+fn+"&surname="+sn+"&age="+age+"&sex="+sex+"&department="+dp+"";
            var obj = sendRequest(url);   
            if(obj.result == 1){
                alert("Added successfully");
            }
            else{
            }
        }
        
        
    </script>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="../assets/stylesheets/style.css">
        <link rel="stylesheet" href="../assets/font-awesome-4.3.0/css/font-awesome.min.css"/>
		<script>
			
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader" >
				</td>
			</tr>
			<tr>
				<td id="mainnav">
<a href= "nursepage.php"><div class="menuitem"><br><i class= "fa fa-user">&nbsp; Nurses</i></div></a>
                    <a href= "assignedtasks.php"><div class="menuitem"><br><i class= "fa fa-tasks">Tasks</i></div></a>
                    <a href= "departmentpage.php"><div class="menuitem"><br><i class= "fa fa-building"> Departments</i></div></a>
				</td>
				<td id="content">
					<div id="divPageMenu">
                        <span class="menuitem" onClick= add()><i class= "fa fa-user-plus"> Add nurse</i></span>
						<span class="menuitem" ></span>
						<input type="text" id="txtSearch" />
                        <span class="menuitem"><i class= "fa fa-search">search</i></span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent" >
						NURSES
						<span class="clickspot">click here </span>
                        			<form class = "contact_form" method="POST" action="add_nurse.php">
				Firstname: <input id="fname" type="text" placeholder="firstname" name="fn" required><br>
                Surname: <input id="sname" type="text" placeholder="surname" name="sn" required><br>
                Age: <input id="age" type="text" placeholder="age" name="na" required><br>
                Sex: <select id="sex" name="ns">
                        <option value="Male">M</option>
                        <option value="Female">F</option>
                    </select><br>
                Department: <input id="department" type="text" placeholder="department" required><br>
                <br>
				<input type="button"  value="Insert" onClick = addnurse()>
			</form>
						<table id="tableExample" class="reportTable" width="100%">
							<tr class="header"> 
							</tr>

							</tr>
					</div>
				</td>
			</tr>
            <div id = "allnurses">
    
                <table class='reportTable' width='100%' border ='1' align ='center' id="allnurses"></table>
            </div>
		</table>
	</body>
</html>	