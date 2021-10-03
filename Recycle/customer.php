<?php 
session_start();
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
 <title>Customers</title>
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
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="worker.php"><i class="fas fa-home"></i>Workers</a>
                    </li>
                    <li class="nav-item mx-1 active">
                        <a class="nav-link active">Customers<span class="sr-only">(current)</span></a>
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
                        <a class="nav-link" href="signIn.php">Logout</a>
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
              <h1 class="h2" id="dashboard">Customers List</h1>
            </div>
            <!-- Search -->
	        <div class="row justify-content-center align-items-center" >
			<input type="text"  name=""  id="myInput"  onkeyup="myFunction()" class="form-control form-control-sm mb-3 py-4 shadow search"  placeholder="search by email" aria-controls="example" 
				 style="box-shadow: 0 0 10px rgba(0,250,0,0.1); width: 250px; font-size: 20px;border-color: #28a745;border-radius:24px;text-align: center;">
			</div>
            <!-- table active -->
            <div class="table-responsive"id="myTable" > <!-- id="myTable" -->
              	<table class="table table-lg table-hover">
	               	<thead>
	                   <tr role="row">
		                 <th>Name</th>
		                 <th>Email</th>
		                 <th>Password</th>
		                 <th>Address</th>
						 <th>City</th>
						 <th>State</th>
                         <!-- <th>Zip</th> -->
						 <th>Phone</th>
						 <th>Image</th>
						 <th>Delete</th>
						 
		               </tr>
	               	</thead>
	                <tbody >
					<?php
                    require("SQLcustomer/connect3.php"); 
                    $getCustomer = "SELECT * FROM customer";
                    $getCustomerDetails = $connect->prepare($getCustomer);
                    $getCustomerDetails -> execute();
    
                //    if ($row = $getStaffDetails->fetch(PDO::FETCH_ASSOC)) {
					while ($row= $getCustomerDetails->fetch(PDO::FETCH_ASSOC)) 
					{
							$Firstname=$row['first_name'];
							$Lastname=$row['last_name'];
							$Email=$row['email'];
							$Password=$row['password'];
							$Address=$row['address'];
							$City=$row['city'];
							$Area=$row['area'];
							// $Zip=$row['zip'];
							$Phonenumber=$row['phone'];
							// $imageName = $_FILES["image"]['name'];
                            // $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
                            // $imageType = $_FILES["image"]["type"];
							$imageName= 'customer_Images/'.$row['image'];
					   echo '<tr role="row">
						 <td style="font-size=30px ;" >'.$Firstname.'           '.$Lastname.'</td>
						  <td>'.$Email.'</td>
						  <td>'.$Password.'</td>
						  <td>'.$Address.'</td>
						  <td>'.$City.'</td>
						  <td>'.$Area.'</td>
						  <td>'.$Phonenumber.'</td>
						  <td><img width="100px" hight="100px" src='.$imageName.'></td>
						  <td ><form  method="post" onclick="" action="SQLcustomer/delete_Customer.php"><input hidden="hidden" value="'.$Email.'" name="email"> <input type="submit" class="btn btn-danger"  value="Delete"/> </form></td>     
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

    </script>

</body>
</html>