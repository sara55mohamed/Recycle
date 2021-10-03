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
<html>
<head>
 	<title>Products</title>
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
 	<!-- Internal Style -->
 	<style type="text/css">
 		table{
 			font-size: 25px;
 		}
 	</style>
</head>
<body>
 	<!-- nav bar -->
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
                    <!-- <li class="nav-item mx-2">
                    <a class="nav-link" href="admin.php"><i class="fas fa-home"></i> Dashboard </a>
                    </li> -->
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="worker.php"><i class="fas fa-home"></i>Workers</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="customer.php">Customers</a>
                    </li>
                    <li class="nav-item active mx-1">
                        <a class="nav-link active">Products<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="order.php">Orders</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="Report.php">Reports</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="signIn.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- page -->
    <div class="container-fluid">
       <div class="row">
         <div class="col-12 pt-3 px-4">
          <!-- header -->
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2" id="dashboard">Products List</h1>
			 </div>
			  <!-- View All button -->
			  <div class="row justify-content-center align-items-center" >
	        	<div class="col-auto my-2">
					<button class="btn btn-outline-success view shadow"onclick="myFunctionAdd()" style="font-size: 20px;">  Add</button>
				   </div>
				   <div class="col-auto my-2">
					<button class="btn btn-outline-warning update shadow"onclick="myFunctionUpdate()" style="font-size: 20px;">  Update</button>
				   </div>
			   </div>
			    <!-- hidden add product -->
			 <div class="container pt-4" id="myDIV1"  style="display: none;">
             <form method="post" action="SQLproduct/addproduct.php">
			 <div class="form-row pb-2 mb-3 ">
                                    <div class="col"style="font-size: 20px;">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" placeholder="Product name" name="product_name" >
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label >limit </label>
                                        <input type="text" class="form-control" placeholder="limit" name="outline" >
                                    </div>
		 </div> 

			   <div class="row justify-content-center align-items-center">
		        <button  type="submit"   class="btn  btn-success shadow " style="font-size: 25px;"> Add</button>
			     </div> 
		</form>
	</div><br>
			<!-- hidden update product -->
	<div class="container pt-4" id="myDIV2"  style="display: none;">
			 <form method="post"  action="SQLproduct/editproduct.php">
			 <div class="form-row pb-2 mb-3">
                                    <div class="col"style="font-size: 20px;">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" placeholder="Product name" name="product_name" >
                                    </div>
                                    <div class="col"style="font-size: 20px;">
                                        <label >New limit </label>
                                        <input type="text" class="form-control" placeholder="New limit" name="outline" >
                                    </div>
		 </div> 
		 <div class="row justify-content-center align-items-center ">
		        <button  type="submit"   class="btn  btn-success shadow " style="font-size: 25px;"> Update</button>
			     </div>    
		</form>
	</div>
          <!-- table -->
          <div class="table-responsive" id="myTable" style="max-width: 550px; margin: 20px auto;">
                <table class="table table-lg table-hover">
                  	<thead>
                     	<tr>
                    		<th>Name</th>
                    		<th>limit</th>
                  		</tr>
                  	</thead>
                  	<tbody>
                      <?php
                       require("SQLproduct/connect2.php"); 
                    $getProduct = "SELECT * FROM product";
                    $getProductDetails = $connect->prepare($getProduct);
                    $getProductDetails -> execute();
    
                   if ($row = $getProductDetails->fetch(PDO::FETCH_ASSOC)) {
					while ($row= $getProductDetails->fetch(PDO::FETCH_ASSOC)) 
					{
							$productName=$row['product_name'];
							$outLine=$row['outline'];
					   echo '<tr role="row">
						 <td class="limit">'.$productName.'</td>
						  <td class="limit">'.$outLine.'</td>
					   </tr>';
					  }	
				   }
					
				   
				   ?>
                   	</tbody>
                </table>
             </div>
			 
         </div>
        </div>
    </div>
	
    <!-- Internal Script -->
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
/*
	// edit button
  		$("table").on("click", ".fa-edit", function() {
        	var limit = Number(prompt("Enter new limit in KG"));
        	if (limit) {
				if (limit >= 0){
					$(this).parents("tr").find("td.limit").html(limit +" KG");
				} else {
				 	alert("Error Limit is negative");
				}
			}
        });
     */
    </script>

</body>
</html>