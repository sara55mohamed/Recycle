<?php 
  session_start();
  require("SQLcustomer/connect3.php");
?>
<html>

<head>
    <title> User settings </title>
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/settings.css">
    <script src="JS/jquery-3.5.1.min2.js"></script>
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
                    
                    // var_dump($_SESSION);
                    // die;
                    // $imageName= 'customer_Images/'.$row['image'];
                    //    $_SESSION['email'] = $Email;
                    //   $_SESSION['password'] = $Password;
                    // require_once("SQLcustomer/connect3.php");
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

    <div class="container pt-4">
        <h2 class="text-center">Update Profile</h2>
        <?php
        
        if (!empty($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $getCustomer = "SELECT * FROM customer WHERE email = '$email'";
            $getCustomerDetails = $connect->prepare($getCustomer);
            $getCustomerDetails->execute();
            if ($row = $getCustomerDetails->fetch(PDO::FETCH_ASSOC)) {
                $Firstname = $row['first_name'];
                $Lastname = $row['last_name'];
                $Email = $row['email'];
                $Password = $row['password'];
                $Address = $row['address'];
                $City=  $row['city'] ;
                $Area=$row ['area'] ;
                $Phonenumber = $row['phone'];
                $imageName = $row['image'];
                echo '<div class="tabs">
            <!-- tabs -->
            <!-- content -->
            <div class="tab-content" id="myTabContent">
                <!-- personal info -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form name="form" action="SQLcustomer/edit_Customer.php" id="regForm" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3 mt-5 left">
                                <img src="customer_Images/'.$imageName.'" id="myimg" class="rounded-circle" style="width: 200px; height: 200px;">
                                <div class="custom-file mb-3 ml-4">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="btn text-white mt-4 ml-2" for="customFile">Upload a photo</label>
                                </div>
                            </div>
                            <input type="text" hidden name="image_name" value="'.$imageName.'">
                            <div class="col-md-9 mt-5">
                                <!-- name -->
                                <div class="form-row pb-2 mb-3">
                                    <div class="col">
                                        <label for="fname">First Name</label>
                                        <input type="text" value = ' . $Firstname . ' class="form-control" placeholder="First name" name="first_name" required id="inputFName" pattern="^[a-z]+$"> <label id="lbl"></label>
                                    </div>
                                    <div class="col">
                                        <label for="lname">Last Name</label>
                                        <input type="text" value = ' . $Lastname . ' class="form-control" placeholder="Last name" name="last_name" required id="inputLName" pattern="^[a-z]+$">
                                    </div>
                                </div>
                                <!-- mail & pass -->
                                <div class="form-row pb-2 mb-3">
                                    <div class="col">
                                        <label for="inputEmail4"> Email</label>
                                        <input type="email" value = ' . $Email . ' readonly class="form-control" placeholder="Email" name="email" required id="inputEmail" pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$" title="Enter an Email from 6 to 25 characters">
                                    </div>
                                </div>
                                <div class="form-row pb-2 mb-3">
                                    <div class="col">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" value = ' . $Password . ' class="form-control" placeholder="Password" required id="inputPassword" name="password" pattern="^(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S{6,25}$" title="Enter a Password from 6 to 25 characters">
                                    </div>
                                    <div class="col">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="text" value = ' . $Phonenumber . ' name="phone" class="form-control" id="phoneNumber" placeholder="01120000000" required title="Enter Posstive numbers">
                                    </div>
                                </div>
                                <div class="form-row pb-2 mb-3">
                                    <div class="col">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" value = ' . $Address . ' name="address" class="form-control" placeholder="#1, North Street, Chennai - 11" required id="inputAddress" pattern="^[#.0-9a-zA-Z\s,-]+$">
                                    </div>

                                </div>
                                <!-- city & state -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select id="inputState" class="form-control"  name="city" required>
                                        <option selected value="'.$row['city'].'">'.$row['city'].'</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select id="output" class="form-control" name="area" required>
                                        <option selected value="'.$row['area'].'">'.$row['area'].'</option>
                                        </select>
                                    </div>
                                </div>
                                <button style="color: white;" type="submit" class="btn mb-2">Update</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';
            }
        } else {
            echo "<html><head><script>alert('Error');
                window.location='index.php';</script></head><body></body>";
        }
        ?>
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
    <script src="JS\settings.js"></script>
    <!-- <script src="JS/apiTest.js"></script> -->
    
</body>

</html>