<?php
   session_start();
   require("SQLcustomer/connect3.php");
?>

<html>

<head>
    <title>Your Profile </title>
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/profile.css">
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
          // if (session_status() == PHP_SESSION_NONE) {
          //   session_start();
          // }
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

    <!-- $getCustomer = "SELECT image FROM customer WHERE email LIKE '%$email%'"; -->

    <div class="bg-image py-5">
        <div class="container text-center">
            <?php
            // if (session_status() == PHP_SESSION_NONE) {
            //     session_start();
            // }
            if (!empty($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $getCustomer = "SELECT * FROM customer WHERE email LIKE '%$email%'";
                $getCustomerDetails = $connect->prepare($getCustomer);
                $getCustomerDetails->execute();
                if ($row = $getCustomerDetails->fetch(PDO::FETCH_ASSOC)) {
                    $Firstname = $row['first_name'];
                    $Lastname = $row['last_name'];
                    $Email = $row['email'];
                    $Address = $row['address'];
                    $Phonenumber = $row['phone'];
                    $imageName = 'customer_Images/' . $row['image'];
                    echo '<div class="profile shadow-lg p-5 w-75 m-auto rounded bg-white ">
                       <div class="layer position-absolute"></div> 
                       <div>
                       <img class="image" src=' . $imageName . '  >
                       <br><br>
                       <a href="settings.php" class="text-dark"><i class="far fa-edit"></i></a>
                       <div class="title">
                           <h1> ' . $Firstname . ' ' . $Lastname . ' </h1>
                           <hr>
                           <h3>I N F O R M A T I O N</h3>
                       </div>
                   </div>
                   <div class="main-container">
                       <p>
                           <i class="far fa-envelope mr-2" aria-hidden="true"></i>
                           <b>Email</b> ' . $Email . '
                       </p>
                       <p>
                           <i class="fa fa-mobile-alt info" aria-hidden="true"></i>
                           <b>Phone</b>' . $Phonenumber . '
                       </p>
                       <p>
                           <i class="fa fa-map-marker-alt info" aria-hidden="true"></i>
                           <b>Address</b> ' . $Address . '
                       </p>
                   </div>
               </div>';
                }
            } else {
                echo "<html><head><script>alert('Error');
                window.location='index.php';</script></head><body></body>";
            }
            ?>
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="copy d-flex justify-content-between align-items-center">
                <div class="text">
                    <p class="my-auto">2021 ?? Copyright, Recycle Waste Management. All Rights Reserved.</p>
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

</body>

</html>