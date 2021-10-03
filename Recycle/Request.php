<?php
session_start();
require("SQLrequest/connect4.php");
require("SQLcustomer/connect3.php");
if (!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
// if($_SESSION['role'] != 'admin')
// {  
// 	//echo"<script>alert('NOT Allow should be authorizedUsers')</script>";
// 	header("Location: logout.php");	
// }
//var_dump($_SESSION);
//die;

?>
<html>

<head>
    <title>Add Request</title>
    <meta charset="utf-8" />
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/myReguest.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <script src="JS/jquery-3.5.1.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
</head>

<body>
    <!-- loading screen -->
    <!-- <div id="loading" class="d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div> -->

    <!-- angle-up -->
    <a href="#" class="angle" id="angle">
        <i class="fas fa-angle-double-up text-white position-fixed rounded-circle d-flex align-items-center justify-content-center angle-up"></i>
    </a>

    <!-- side bar -->
    <!-- <div id="sideBar" class="d-flex align-items-center">
        <div id="colorsBox" class="text-light bg-dark">
            <h3>choose your color</h3>
            <div class="color-item one"></div>
            <div class="color-item two"></div>
            <div class="color-item three"></div>
            <div class="color-item four"></div>
        </div>
        <i id="sideBarToggle" class="fa fa-cog bg-dark text-light"></i>
    </div> -->
    
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="home">
    <div class="container py-3">
      <a class="navbar-brand" href="index.php">
        <img src="Images/logo.png" alt="" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-uppercase">
          <li class="nav-item active mx-1">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              About
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php #about">Who We Are</a>
              <a class="dropdown-item" href="index.php #services">Services</a>
              <a class="dropdown-item" href="index.php #why">Why Us</a>
            </div>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="ideas.php">Ideas</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="index.php #contact">Contact</a>
          </li>
          <?php
        //   if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        //   }
          // var_dump($_SESSION);
          // die;
          // $imageName= 'customer_Images/'.$row['image'];
          //    $_SESSION['email'] = $Email;
          //   $_SESSION['password'] = $Password;
          require("SQLcustomer/connect3.php");
          if (!empty($_SESSION['email'])) {
            $email = $_SESSION['email'];
            // die('s');
            $getCustomer = "SELECT image FROM customer WHERE email LIKE '%$email%'";

            $getCustomerDetails = $connect->prepare($getCustomer);
            $getCustomerDetails->execute();
            if ($row = $getCustomerDetails->fetch(PDO::FETCH_ASSOC)) {
              echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
                            <img class ='image'src='customer_Images/$row[image]' style='width: 30px;height: 30px; border-radius: 50%;'>
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='profile.php'>Profile</a>
                            <a class='dropdown-item' href='settings.php'>Settings</a>
                            <a class='dropdown-item' href='Request.php'>Requests</a>
                            <a class='dropdown-item' href='gift.php'>Gift</a><hr>
                            <a class='dropdown-item' href='logout-customer.php' style='text-align: center;'>Log out</a>
                        </div>
                    </li>";
            }
          } else {
            echo "<li class='nav-item mx-1'>
                    <a class='nav-link' href='log-in.php' >Sign in</a>
                </li>";
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>

    <!-- add request -->
    <div class="container2 py-5">
        <div class="row align-items-center">
            <!-- left column -->
            <div class="col-md-6 pr-md-5">
                <img src="Images/12.jpg" alt="" class="w-100">
            </div>
            <!-- right column -->
            <div class="col-md-6 pl-md-3">
                <h3>New Request</h3>
                <form class="pt-3" method="post" action="SQLrequest/process_Request.php" id="regForm" enctype="multipart/form-data">
                    <!-- type -->
                    <div class="form-group">
                        <input required type="text" name="matrial_type" class="form-control" placeholder="Enter Matrial Type" id="typeInput">
                        <p class="text-danger pt-2" id="typeAlert">Please enter correct type</p>
                    </div>
                    <!-- amount -->
                    <div class="form-group">
                        <input type="number" class="form-control" name="amount" placeholder="Enter amount between 20 and 100" required id="amountInput">
                        <p class="text-danger pt-2" id="amountAlert">Please enter correcrt amount</p>
                    </div>
                    <!-- date -->
                    <div class="form-group">
                        <input required type="Date" class="form-control" name="date" id="dateInput">
                    </div>
                    <!-- exchange -->
                    <div class="form-group">
                        <select required class="form-control" type="text" name="exchange_matrial" id="selectInput">
                            <option selected disabled>Choose Exchange matrial </option>
                            <option value="Plastic">Plactic</option>
                            <option value="Metal">Metal</option>
                            <option value="Glass">Glass</option>
                            <option value="Paper">Peper</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <button type="submit"  id="submitBtn" class="btn rounded-pill addBtn btn-block">Add</button>
                </form>
                <p class="see-all mt-3">See all requests</p>
            </div>
        </div>
    </div>

    <!-- all requests -->
    <div class="container requests-section">
        <!-- search input -->
        <div class="search-input py-3 w-75 mx-auto">
            <form class="form-group" style="padding: 10px;">
                <input class="form-control mr-sm-2" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by material type">
            </form>
        </div>
        <!-- requests table -->
        <table class="table" id="myTable">
            <thead>
                <tr role="row">
                    <th>Request number</th>
                    <th>Type of matrial</th>
                    <th>Amount of matrial</th>
                    <th>Date</th>
                    <th>Exchange matrial</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("SQLrequest/connect4.php");
                $getrequest = "SELECT * FROM request where customer_id = " . $_SESSION['customer_id'] . "";
                $getrequestDetails = $connect->prepare($getrequest);
                $getrequestDetails->execute();

                //    if ($row = $getStaffDetails->fetch(PDO::FETCH_ASSOC)) {
                while ($row = $getrequestDetails->fetch(PDO::FETCH_ASSOC)) {
                    $ID = $row['id'];
                    $matrial_type = $row['matrial_type'];
                    $Amount = $row['amount'];
                    $Date = $row['date'];
                    $exchangeMatrial = $row['exchange_matrial'];
                    echo '<tr role="row">
                          <td>' . $ID . '</td>
						  <td>' . $matrial_type . '</td>
						  <td>' . $Amount . '</td>
						  <td>' . $Date . '</td>
						  <td>' . $exchangeMatrial . '</td>
						  <td><form method="post" onclick="" action="SQLrequest/delete_Request.php"><input hidden="hidden" value="' . $ID . '" name="id"> <input type="submit" class="btn btn-outline-danger deleteBtn"  value="Delete"/> </form></td>     
						  </tr>';
                }
                ?>
            </tbody>
        </table>
        <p class="hide-all mt-3">Hide all requests</p>
    </div>

    <!-- footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="copy d-flex justify-content-between align-items-center">
                <div class="text">
                    <p class="my-auto">2021 © Copyright, Recycle Waste Management. All Rights Reserved.</p>
                </div>
                <div class="icons d-flex align-items-center">
                    <span class="mr-3">Stay connected:</span>
                    <a href="#" class="text-light"><i class="fab fa-linkedin-in rounded-circle d-flex align-items-center justify-content-center"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter rounded-circle d-flex align-items-center justify-content-center"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-facebook-f rounded-circle d-flex align-items-center justify-content-center"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-vimeo-v rounded-circle d-flex align-items-center justify-content-center"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-yelp rounded-circle d-flex align-items-center justify-content-center"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="JS/My Request.js"></script>
    <!-- <script src="JS/apiTest.js"></script> -->
</body>

</html>