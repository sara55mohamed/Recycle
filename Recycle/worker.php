<?php 
session_start();
//var_dump($_SESSION);
//die;
 require("SQLstaff/connect.php");
if($_SESSION['role'] != 'admin')
{  
	//echo"<script>alert('NOT Allow should be authorizedUsers')</script>";
	header("Location: logout.php");	
}
//var_dump($_SESSION);
//die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Workers</title>
 <!-- meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 <!-- ICON -->
    <link rel="icon" href="Images/logoIcon.png">
 <!-- Bootstrap Style -->
 <link rel="stylesheet" href="CSS/all.min.css"> <!-- ICONS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- FONT FAMILY -->
 <!-- External Style -->
 <link rel="stylesheet" type="text/css" href="CSS/admin.css">
    <!-- <link rel="stylesheet" href="css/style.css"> --> <!-- External Userpage Style -->
 <!-- Bootstrap JS -->
    <script src="JS/jquery-3.5.1.min2.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
 <script src="JS/Chart.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
 <!-- navbar -->
 <nav class="navbar navbar-expand-xl navbar-dark bg-dark" id="home">
        <div class="container py-3">
            <a class="navbar-brand" href="#">
                <img src="Images/logo.png" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-uppercase">
                    <!-- <li class="nav-item  mx-2">
                    <a class="nav-link " href="admin.php"><i class="fas fa-home"></i> Dashboard </a>
                    </li> -->
                    <li class="nav-item mx-1 active">
                        <a class="nav-link active"><i class="fas fa-home"></i>   Workers<span class="sr-only">(current)</span></a>
                    </li>
					<li class="nav-item mx-1">
                        <a class="nav-link" href="customer.php">Customers</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="product.php">Products</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="order.php">Orders</a>
                    </li>
                     <li class="nav-item mx-1">
                        <a class="nav-link" href="Report.php">Reports</a>
                    </li> 
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
 </nav>
 <!-- Page -->
    <div class="container-fluid">
  <!-- Worker lists -->
       <div class="row">
         <div class="col-12 pt-3 px-4">
          <!-- header -->
		  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2" id="dashboard">Workers List</h1>
			  <div class="btn-toolbar mb-2 mb-md-0">
			  <!-- //<form action="SQLstaff/search.php" method="post"> -->
			  <!-- id='search_text' onkeyup='searchSname()'-->
                 <input type="text"  name=""  id="myInput"  onkeyup="myFunction()" class="form-control form-control-sm shadow search"  placeholder="search by email" aria-controls="example" 
				 style="box-shadow: 0 0 10px rgba(0,250,0,0.1); width: 200px; font-size: 20px;border-color: #28a745;border-radius:24px;text-align: center;">
            <!-- </form> -->
				</div>
            </div>
            <!-- View All button -->
	        <div class="row justify-content-center align-items-center" >
	        	<div class="col-auto my-2">
					<button class="btn btn-outline-success view shadow "onclick="myFunctionAdd()" style="font-size: 20px;">  Add</button>
				   </div>
				   <div class="col-auto my-2">
					<button class="btn btn-outline-warning update shadow "onclick="myFunctionUpdate()" style="font-size: 20px;">  Update</button>
				   </div>
			   </div>
			   <!-- hidden add staff -->
			   <div class="container pt-4" id="myDIV1"  style="display: none;">
		<form method="post" action="SQLstaff/process.php"> 
         <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="First name" name="first_name" require  pattern="^[a-z]+$">
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label >Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name" name="last_name" require pattern="^[a-z]+$">
                                    </div>
		 </div> 
		 <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label>Email</label>
										<input type="email" class="form-control" placeholder=" Email" name="email" require pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$" title="Enter an Email from 6 to 25 characters">                                    </div>
								    <div class="col"style="font-size: 20px;">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password"  title="Enter a Password from 6 to 25 characters">
                                    </div>
         </div> 
         <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label >Position </label>
                                        <input type="text" class="form-control" placeholder="Position" name="position" require pattern="^(?=\D*([a-z]|[A-Z]))\D{2,30}$">
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label>Role</label>
                                        <input type="text" class="form-control" placeholder="Role" name="role" require pattern="^(?=\D*([a-z]|[A-Z]))\D{2,30}$">
                                    </div>
         </div>  
         <div class="form-row pb-2 mb-3">
                                    
             <div class="col"style="font-size: 20px;">
                  <label >Salary</label>
                 <input type="number" class="form-control" placeholder="Salary" name="salary"  title="Enter Posstive numbers">
				</div>
				<div class="col" style="font-size: 20px;">
                <span>Gender</span><br>
			    <div class="form-check form-check-inline my-3">
			       <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked>
			       <label class="form-check-label" for="inlineRadio1">Male</label>
			    </div>
			    <div class="form-check form-check-inline my-3">
			       <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
			       <label class="form-check-label" for="inlineRadio2">Female</label>
			    </div>
        </div>
         </div>      
         <div class="row justify-content-center align-items-center">
		        <button  type="submit"   class="btn  btn-success shadow " style="font-size: 25px;"> Add</button>
			                  
         </div> 
		 </form>
	</div><br>
		<!-- hidden update staff -->
	 <div class="container pt-4" id="myDIV2"  style="display: none;">
        <form method="post" action="SQLstaff/edit.php">
        <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label > Current Email</label>
                                        <input type="email" class="form-control" placeholder="current Email" name="email" require pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$" title="Enter an Email from 6 to 25 characters">
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label >New Email</label>
                                        <input type="email" class="form-control" placeholder="New Email" name="new_email" require  pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$" title="Enter an Email from 6 to 25 characters">
                                    </div>
         </div>  
         <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="First name" name="first_name" require  pattern="^[a-z]+$">
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label >Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name" name="last_name" require pattern="^[a-z]+$">
                                    </div>
         </div> 
         <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label >Position </label>
                                        <input type="text" class="form-control" placeholder="Position" name="position" require pattern="^(?=\D*([a-z]|[A-Z]))\D{2,30}$">
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label>Role</label>
                                        <input type="text" class="form-control" placeholder="Role" name="role" require pattern="^(?=\D*([a-z]|[A-Z]))\D{2,30}$">
                                    </div>
         </div>  
         <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password"  title="Enter a Password from 6 to 25 characters">
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label >Salary</label>
                                        <input type="number" class="form-control" placeholder="Salary" name="salary"  title="Enter Posstive numbers">
                                    </div>
         </div>      
         
         <div class="form-row pb-2 mb-3">
                                    
		 <div class="col" style="font-size: 20px;">
                <span>Gender</span><br>
			    <div class="form-check form-check-inline">
			       <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked>
			       <label class="form-check-label" for="inlineRadio1">Male</label>
			    </div>
			    <div class="form-check form-check-inline">
			       <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
			       <label class="form-check-label" for="inlineRadio2">Female</label>
			    </div>
                 </div>
                 <div class="col ">
                     <button  type="submit" class="btn btn-success my-3 shadow" style="width:400px;font-size: 20px;"> Update</button>
                  </div>
         </div>      
		       
		</form>
        
	</div>
            <!-- table active -->
            <div class="table-responsive"id="myTable" > <!-- id="myTable" -->
              	<table class="table table-lg table-hover">
	               	<thead>
	                   <tr role="row">
		                 <th>Name</th>
		                 <th>Email</th>
		                 <th>Password</th>
		                 <th>Gender</th>
		                 <th>Position</th>
						 <th >Role</th>
						 <th >Salary</th>
                         <th >Delete</th>
						 
		               </tr>
	               	</thead>
	                <tbody >
					<?php
                       require_once("SQLstaff/connect.php"); 
                    $getStaff = "SELECT * FROM staff";
                    $getStaffDetails = $connect->prepare($getStaff);
                    $getStaffDetails -> execute();
    
                //    if ($row = $getStaffDetails->fetch(PDO::FETCH_ASSOC)) {
					while ($row= $getStaffDetails->fetch(PDO::FETCH_ASSOC)) 
					{
							$Firstname=$row['first_name'];
							$Lastname=$row['last_name'];
							$Email=$row['email'];
							$Role=$row['role'];
							$Password=$row['password'];
							$Gender=$row['gender'];
							$Position=$row['position'];
							$Salary=$row['salary'];
					   echo '<tr role="row">
						 <td style="font-size=30px ;" >'.$Firstname.'       '.$Lastname.'</td>
						  <td>'.$Email.'</td>
						  <td>'.$Password.'</td>
						  <td>'.$Gender.'</td>
						  <td>'.$Position.'</td>
						  <td>'.$Role.'</td>
						  <td>'.$Salary.'</td>
						  <td><form method="post" onclick="" action="SQLstaff/delete.php"><input hidden="hidden" value="'.$Email.'" name="email"> <input type="submit" class="btn btn-danger"  value="Delete"/> </form></td>     
						  </tr>';
					  }	
				//    }
				//		<td> <button type="button"onclick="functionConfirm()"  class="btn btn-danger"> Delete </button></td>     
				   ?>
	                 </tbody>
              </table>
            </div>
         </div>
		</div>
		</div>

    
 <!-- Internal JS -->

	 <script type="text/javascript">
	//hidden function to add staff 
	 function myFunctionAdd() {
  var x = document.getElementById("myDIV1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
	//hidden function to update staff 
function myFunctionUpdate() {
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

//search input
function myFunction() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      txtValue = td.textContent || td.innerText;
		      if (txtValue.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }
		  }
		}
// confirm delete message function
//<td><form method="post" onclick="" action="SQLstaff/delete.php"><input hidden="hidden" value="'.$Email.'" name="email"> <input type="submit" class="btn btn-danger"  value="Delete"/> </form></td>     	
function functionConfirm() {
  if (confirm("Press a button!")) {
	action="SQLstaff/delete.php"
  } else {
    header(worker.php)
  }
}
		/*
		// delete function
		$(document).on('click', '.btn_delete', function(){  
           var email=$(this).data("email");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"SQLstaff/delete.php",  
                     method:"POST",  
                     data:{email:email},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      }); 
*/

		/*
// search function

$(document).ready(function(){

load_data();

function load_data(email)
{
 $.ajax({
  url:"SQLstaff/search.php",
  method:"POST",
  data:{email:email},
  success:function(data)
  {
   $('#result').html(data);
  }
 });
}
$('#search_text').keyup(function(){
 var getStaff = $(this).val();
 if(getStaff != '')
 {
  load_data(getStaff);
 }
 else
 {
  load_data();
 }
});
});

*/
/*
// search function
var cells = document.querySelectorAll("#myTable td");
var search = document.getElementById("myInput");

search.addEventListener("keyup", function(){

  for(var i = 0; i < cells.length; ++i){
    if(cells[i].textContent.toLowerCase().indexOf(search.value.toLowerCase()) === 0){      
        cells.forEach(function(element){
            element.style.display = "none";
        });
        cells[i].style.background = "yellow";
        cells[i].style.display = "table-row";
        break;
    } else {
        cells[i].style.background = "white";
        cells.forEach(function(element){
          if(cells[i] !== element){
            element.style.display = "table-row";
          }
        }); 
    }    
  }

});*/
// This line checks for an exact match in a cell against what the
    // user entered in the search box
    //if(cells[i].textContent.toLowerCase() === search.value.toLowerCase()){
    
	// This checks for cells that start with what the user has entered
	//////////////////////////////////////////////////////////
	// API Application Programmin Interface
 		// var x = document.getElementById("demo");
		// function getLocation() {
		//   if (navigator.geolocation) {
		//     navigator.geolocation.getCurrentPosition(showPosition);
		//   } else {
		//     x.innerHTML = "Geolocation is not supported by this browser.";
		//   }
		// }
		// function showPosition(position) {
		//   x.innerHTML = "Latitude: " + position.coords.latitude +
		//   "<br>Longitude: " + position.coords.longitude;
		// }


/*
        $("document").ready(function() {
		// delete worker
			
	 		$("table").on("click", ".fa-times", function() {

		  		var rowsNumber = $("tr").length - $("tr.more").length ;
		      	$(this).parents("tr").remove();

		      	if (rowsNumber !== $("tr").length - $("tr.more").length) {
		      		$(".more").first().show().removeClass("more");
		      	}

		      	if ($(".more").length === 0) {
		       		$(".view").addClass("disabled").text("View All");
		      	}
		      	
	 		});
	    // View All & View Less
		 	$(".more").hide();

		 	$(".view").on("click", function() {

		      	$(".more").slideToggle();

		      	if ($(this).text() === "View All") {
		         	$(this).text("View Less");
		      	} else if ($(this).text() === "View Less") {
		         	$(this).text("View All");
		      	}
		      	return false;

			});
	 	// gender
	 		$("input[name='gender']").click(function() {
	 			$("input[name='gender']").attr("checked", false);
	 			$(this).attr("checked", true);
	 		});
 		// Add button
			$("button[type='submit']").on("click", function() {
				for (var i = 0; i < $("form input.form-control").length; i++) {
					var input =$("form input.form-control")[i]; 
					if (input.value == false) {
						console.log("Error empty");
						return true;
					} else  {
						if (RegExp($("input[name='first_name']").attr("pattern")).test($("input[name='first_name']").val()) == false){
							console.log("Error first_name");
							return true;
						}
						if (RegExp($("input[name='last_name']").attr("pattern")).test($("input[name='last_name']").val()) == false){
							console.log("Error last_name");
							return true;
						}
						if (RegExp($("input[type='email']").attr("pattern")).test($("input[type='email']").val()) == false){
							console.log("Error email");
							return true;
						}
						if (RegExp($("input[type='password']").attr("pattern")).test($("input[type='password']").val()) == false){
							console.log("Error password");
							return true;
						}
						if (RegExp($("input[name='position']").attr("pattern")).test($("input[name='position']").val()) == false){
							console.log("Error work");
							return true;
						}
						if ($("form input.form-control")[5].value == false){
							console.log("Error salary");
							return true;
						} else if (Number($("form input.form-control")[5].value) < 0){
							console.log("salary is negative");
							
						} else {
							var name = $("input[name='first_name']").val()+" "+$("input[name='last_name']").val();
							var email = $("input[name='email']").val();
							var password = $("input[name='password']").val();
							var gender = $("input[checked]").val();
							var work = $("input[name='position']").val();
							var salary = Number($("input[name='salary']").val());
							var record = "<tr class='more' style='display: none;'><td class='name'>"+ name +"</td><td>"+ email +"</td><td class='password'>"+ password +"</td><td class='gender'>"+ gender +"</td><td class='position'>"+ work +"</td><td class='salary'>$"+ salary +"</td><td><i class='far fa-edit text-success'></i></td><td><i class='fas fa-times text-danger'></i></td></tr>";
							$("tbody").append(record);
							$(".more").length++;
							$(".view").removeClass("disabled");
						}
						return false;
					} 
				}
		  	});


	  	// // edit button
	  	// 	$(document).on("click", '.fa-edit', function () {
	  	// 		// var change = prompt("What you want to change?");

	  	// 		$(this).closest("tr").find("td.name").prop("contenteditable", true).addClass("edit").keypress(function(event) {
	  	// 			if (event.keyCode === 13) {
	  	// 				console.log($(this).text());
	  	// 				$(this).closest("tr").find("td.name").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.password").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.gender").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.position").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.salary").prop("contenteditable", false).removeClass("edit");

	  	// 			}
	  	// 		});
	  	// 		$(this).closest("tr").find("td.password").prop("contenteditable", true).addClass("edit").keypress(function(event) {
	  	// 			if (event.keyCode === 13) {
	  	// 				$(this).closest("tr").find("td.name").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.password").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.gender").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.position").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.salary").prop("contenteditable", false).removeClass("edit");

	  	// 			}
	  	// 		});
	  	// 		$(this).closest("tr").find("td.gender").prop("contenteditable", true).addClass("edit").keypress(function(event) {
	  	// 			if (event.keyCode === 13) {
	  	// 				$(this).closest("tr").find("td.name").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.password").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.gender").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.position").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.salary").prop("contenteditable", false).removeClass("edit");

	  	// 			}
	  	// 		});
	  	// 		$(this).closest("tr").find("td.position").prop("contenteditable", true).addClass("edit").keypress(function(event) {
	  	// 			if (event.keyCode === 13) {
	  	// 				$(this).closest("tr").find("td.name").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.password").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.gender").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.position").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.salary").prop("contenteditable", false).removeClass("edit");

	  	// 			}
	  	// 		});
	  	// 		$(this).closest("tr").find("td.salary").prop("contenteditable", true).addClass("edit").keypress(function(event) {
	  	// 			if (event.keyCode === 13) {
	  	// 				$(this).closest("tr").find("td.name").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.password").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.gender").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.position").prop("contenteditable", false).removeClass("edit");
	  	// 				$(this).closest("tr").find("td.salary").prop("contenteditable", false).removeClass("edit");

	  	// 			}
	  	// 		});
	   //   		console.log("item");//delete it

			    
			 //    return false;
			 //  });



        });


    // edit icon
        $("table").on("click", ".fa-edit", function() {
        	var change = prompt("What you want to change?");
        	if (change) {
        		change = change.toUpperCase();
        		if (change == "NAME") {
        			var name = prompt("Enter new first name and last name");
        			var pattName = /^[a-z]+(\s[a-z]+){1}$/;
        			if (name) {
						if (pattName.test(name)) {
	        				$(this).parents("tr").find("td.name").html(name);
	        			} else {
	        				alert("Error name");
	        			}
        			}
        			
        		} else if (change == "PASSWORD") {
        			var password = prompt("Enter new password from 6 to 25 characters by using capital letters and small letters and numbers");
        			var pattPassword = /^(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S{6,25}$/;
        			if (password) {
        				if (pattPassword.test(password)){
							$(this).parents("tr").find("td.password").html(password);
						} else {
        					alert("Error password");
						}
        			} 

        		} else if (change == "GENDER") {
        			var gender = prompt("Enter new gender");
        			if (gender) {
        				if (gender === "male" || gender === "female"){
        					$(this).parents("tr").find("td.gender").html(gender);
						} else {
        					alert("Error gender");
						}
        			} 

        		} else if (change == "POSITION") {
        			var position = prompt("Enter new position");
        			var pattWork= /^(?=\D*([a-z]|[A-Z]))\D{2,30}$/;
        			if (position) {
        				if (pattWork.test(position)) {
							$(this).parents("tr").find("td.position").html(position);
        				} else {
        					alert("Error position");
        				}
        			}

        		} else if (change == "SALARY") {
        			var salary = Number(prompt("Enter new salary"));
        			if (salary) {
        				if (salary > 0){
        					$(this).parents("tr").find("td.salary").html("$"+salary);
						} else {
        				 	alert("Error Salary is negative");
						}
        			} 

        		} else {
        			alert("Error");
        		}
        	}
        });


  	//search input
      	function myFunction() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      txtValue = td.textContent || td.innerText;
		      if (txtValue.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }
		  }
		}


   //  $("input[type='search']").keypress(function(event) {
	  //  if (event.keyCode === 13) {
	  //   alert("hi");
	  //  }
	  // });
	  */
    </script>

</body>
</html>