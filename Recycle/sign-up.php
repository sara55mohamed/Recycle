<?php
session_start();
//var_dump($_SESSION);
//die;
require("SQLcustomer/connect3.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/signup.css">
    <script src="JS/jquery-3.5.1.min2.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

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

    <section>
        <div class="mx-0 row w-100 justify-content-center p-5 bg-image position-relative">
            <div class="layer position-absolute"></div>
            <div class="col-md-7 w-100">
                <div class="w-100 shadow-lg p-5 bg-white">
                    <div class="titel position-relative text-center">
                        <h2 class="lite">S</h2>
                        <hr style="width: 75px; margin-top:0 ; border-color: #495057;">
                        <h2 class="position-absolute text-uppercase text-color" style="font-size: 45px;">Sign up</h2>
                    </div>
                    <div class="tabs">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form method="post" action="SQLcustomer/process_Customer.php" enctype="multipart/form-data" id="regForm">
                                <div class="row justify-content-center p-1 position-relative">
                                    <img src="Images/img.png" id="myimg" class="rounded-circle" style="width: 200px; height: 200px;">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="btn text-white " for="customFile">Upload a photo</label>
                                </div>
                                </div>
                                <div class="form-row mt-5">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" required placeholder="First name" id="inputFName" pattern="^[a-z]+$" name="first_name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" required placeholder="Last name" id="inputLName" pattern="^[a-z]+$" name="last_name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Email" required id="inputEmail" pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$" name="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control" placeholder="Password" required id="inputPassword" pattern="^(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S{6,25}$" name="password">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="01120000000" required title="Enter Posstive numbers">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Address : 1234 Main St" required id="inputAddress" pattern="^[#.0-9a-zA-Z\s,-]+$" name="address">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select id="inputState" class="form-control" name="city" required>
                                            <option selected disabled>City</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select id="output" class="form-control" name="area" required>
                                            <option selected disabled>Area</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn text-white bg-color my-4">Create your account</button>
                                    <div class="paragraph">
                                        <span>Already have an account ?</span>
                                        <a href="log-in.php">Sign in</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
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
    <script src="JS/signup.js"></script>
    <!-- <script src="JS/apiTest.js"></script> -->
</body>

</html>