<?php 
session_start();
//var_dump($_SESSION);
//die;
 require("SQLstaff/connect.php");
 /*if($_SESSION['role'] == 'admin')
	{
		header("Location: order.php");	
	}*/
if($_SESSION['role'] != 'worker'&& $_SESSION['role'] != 'admin')
{  
	header("Location: logout.php");	
  }
 
//var_dump($_SESSION);
//die;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reports List</title>
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
                        <a class="nav-link  " href="worker.php">Workers</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="customer.php">Customers</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link " href="product.php">Products</a>
                    </li>
                    <li class="nav-item  mx-1">
                        <a class="nav-link " href="order.php">Orders</a>
                    </li>
                    <li class="nav-item active mx-1">
                        <a class="nav-link active" href="Report.php">Reports</a>
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
	              	<h1 class="h2" id="dashboard">Reports List</h1>
	            </div>
        		<!-- table -->
        		<div class="table-responsive" id="myTable">
	              	<table class="table table-striped table-sm table-hover">
		               	<thead>
		                   <tr role="row">
						 <th>Number of Problem</th>
		                 <th>Full Name</th>
						 <th>E-mail</th>
						 <th>Company</th>
						 <th>Phone Number</th>
						 <th>Problem</th>
			               </tr>
		               	</thead>
		                <tbody>
			<?php
					//  require_once("SQLcustomer/connect3.php");
					 require("SQLconnect_us/connect6.php");
                    $getReport = "SELECT id,name,email,company,phone,help FROM connectus";
                    $getReportDetails = $connect->prepare($getReport);
                    $getReportDetails -> execute();

					while ($row= $getReportDetails->fetch(PDO::FETCH_ASSOC)){
						echo '<tr role="row">
						<td>'.$row['id'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['company'].'</td>
						<td>'.$row['phone'].'</td>
						<td>'.$row['help'].'</td>
						</tr>';
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
    //finish order	
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

    </script>

</body>
</html>