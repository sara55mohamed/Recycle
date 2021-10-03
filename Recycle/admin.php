<?php 
//Authorization ---> gathering rights to use assets (allow as admin or allow as worker)*/
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
	<title>Recycle</title>
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
                    <li class="nav-item active mx-2">
                    <a class="nav-link active" href="#dashboard"><i class="fas fa-home"></i> Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="worker.php">Workers</a>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<!-- Page -->
    <div class="container-fluid">
		<!-- Dashboard and cards -->
      	<div class="row bg-light">
        	<!-- Dashboard -->
	        <div class="col-12 col-lg-7 col-xl-6 pt-3 px-4">
	          	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	            	<h1 class="h2" id="dashboard">Dashboard</h1>
	            	<!-- <div class="btn-toolbar mb-2 mb-md-0">
	              		<div class="btn-group mr-2">
	                		<button class="btn btn-sm btn-outline-secondary">Share</button>
	                		<button class="btn btn-sm btn-outline-secondary">Export</button>
	              		</div>

	              		<button id="btnGroupDrop1" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              			<i class="far fa-calendar-alt"></i>
	                		This week
	              		</button>
	              		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="#about">Last week</a>
                            <a class="dropdown-item" href="#services">This week</a>
                        </div>
	            	</div> -->
	          	</div>
	          	<canvas class="my-4 chartjs-render-monitor" id="myChart"></canvas>
	        </div>
        	<!-- Cards -->
        	<div class="col-12 col-lg-5 col-xl-6 pt-3 px-4">
        		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            		<h1 class="h2" id="order">Orders</h1>
          		</div>
          		<div class="row">
          			<div class="col-12 col-sm-6 col-lg-6 ">
					    <div class="card mb-5 mb-lg-4">
					      	<div class="card-body">
					        	<h5 class="card-title">Total Income</h5>
					        	<div class="widget-numbers mt-0 fsize-3 text-success">75%</div>
					        	<div class="progress">
								  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
								</div>
					      	</div>
					    </div>
				  	</div>
				  	<div class="col-12 col-sm-6 col-lg-6">
					    <div class="card mb-5 mb-lg-4">
					      	<div class="card-body">
					        	<h5 class="card-title">Total Orders</h5>
					        	<div class="widget-numbers mt-0 fsize-3 text-success">80%</div>
					        	<div class="progress ">
								  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
								</div>
					      	</div>
					    </div>
				  	</div>
				  	<div class="col-12 col-sm-6 col-lg-6">
					    <div class="card mb-5 mb-lg-4">
					      	<div class="card-body">
					        	<h5 class="card-title">Finish Orders</h5>
					        	<div class="widget-numbers mt-0 fsize-3 text-success">56%</div>
					        	<div class="progress">
								  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
								</div>
					      	</div>
					    </div>
				  	</div>
				  	<div class="col-12 col-sm-6 col-lg-6">
					    <div class="card mb-5 mb-lg-4">
					      	<div class="card-body">
					        	<h5 class="card-title">Processes</h5>
					        	<div class="widget-numbers mt-0 fsize-3 text-success">14%</div>
					        	<div class="progress">
								  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width: 14%;"></div>
								</div>
					      	</div>
					    </div>
				  	</div>
          		</div>
			</div>
      	</div>
    	<!-- Table -->
      	<div class="row">
      		<div class="col-12 pt-3 px-4">
          		<h2>Distributors</h2>
          		<div class="table-responsive">
            		<table class="table table-striped table-sm table-hover">
			            <thead>
			                <tr>
			                  	<th style="width: 138px;">Name</th>
			                  	<th>Finished Orders</th>
			                  	<th style="width: 103px;">Total Orders</th>
			                </tr>
		              	</thead>
              			<tbody>
			                <tr>
			                  <td>Lorem Ipsum</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;">56%</div>
			                  </td>
			                  <td>401360</td>
			                </tr>
			                <tr>
			                  <td>Amet Consectetur</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">57%</div>
			                  </td>
			                  <td>411012</td>
			                </tr>
			                <tr>
			                  <td>Integer Nec</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;">54%</div>
			                  </td>
			                  <td>399520</td>
			                </tr>
			                <tr>
			                  <td>Libero Sed</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100" style="width: 58%;">58%</div>
			                  </td>
			                  <td>510210</td>
			                </tr>
			                <tr>
			                  <td>Dapibus Diam</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;">39%</div>
			                  </td>
			                  <td>60052</td>
			                </tr>
			                <tr>
			                  <td>Nulla Quis</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100" style="width: 61%;">61%</div>
			                  </td>
			                  <td>515555</td>
			                </tr>
			                <tr>
			                  <td>Nibh Elementum</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%;">59%</div>
			                  </td>
			                  <td>513061</td>
			                </tr>
			                <tr>
			                  <td>Sagittis Ipsum</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 46%;">46%</div>
			                  </td>
			                  <td>383215</td>
			                </tr>
			                <tr>
			                  <td>Fusce Nec</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%;">63%</div>
			                  </td>
			                  <td>546525</td>
			                </tr>
			                <tr>
			                  <td>Augue Semper</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">70%</div>
			                  </td>
			                  <td>635143</td>
			                </tr>
			                <tr>
			                  <td>Massa Vestibulum</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;">41%</div>
			                  </td>
			                  <td>64850</td>
			                </tr>
			                <tr>
			                  <td>Eget Nulla</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
			                  </td>
			                  <td>661603</td>
			                </tr>
			                <tr>
			                  <td>Taciti Sociosqu</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100" style="width: 81%;">81%</div>
			                  </td>
			                  <td>646160</td>
			                </tr>
			                <tr>
			                  <td>Torquent Per</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">48%</div>
			                  </td>
			                  <td>396520</td>
			                </tr>
			                <tr>
			                  <td>Per Inceptos</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%;">42%</div>
			                  </td>
			                  <td>350980</td>
			                </tr>
			                <tr>
			                  <td>Sodales Ligula</td>
			                  <td>
			                  	<div class="progress-bar bg-success progress-bar-striped progress-bar-animated rounded" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%;">93%</div>
			                  </td>
			                  <td>654651</td>
			                </tr>
              			</tbody>
            		</table>
          		</div>
        	</div>
      	</div>
    </div>
	<!-- Internal JS -->

	<script type="text/javascript">
	// Chart.JS
      	var ctx = document.getElementById("myChart");
      	var myChart = new Chart(ctx, {
        	type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        	data: {
          		labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          		datasets: [{
            		data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            		lineTension: 0,
            		backgroundColor: 'transparent',
            		borderColor: '#007bff',
            		borderWidth: 4,
            		pointBackgroundColor: '#007bff'
          		}]
        	},
        	options: {
          		scales: {
            		yAxes: [{
              		ticks: {
                		beginAtZero: false
              			}
            		}]
          		},
          		legend: {
            		display: false,
          		}
        	}
      	});
    </script>
    
</body>
</html>