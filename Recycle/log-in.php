<?php
 session_start();
    // header("location:index.php");
require("SQLcustomer/connect3.php");
if (isset($_POST['submit'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    
    $getCustomer = "SELECT * FROM customer WHERE email='" . $Email . "' AND password= '" . $Password . "'";

    $getCustomerDetails = $connect->prepare($getCustomer);
    $getCustomerDetails->execute();

    if ($row = $getCustomerDetails->fetch(PDO::FETCH_ASSOC)) {
        //header("Location: ". $authorizedUsers);
        $_SESSION['email'] = $Email;
        $_SESSION['customer_id'] = $row['id'];
        $_SESSION['password'] = $Password;
        // $_SESSION['last_login_timestamp'] = time(); 
        echo "<html><head><script>
                              window.location='index.php';</script></head><body></body>";
    } else {
        echo "<script>alert('Invalid user')</script>";
    }
}
?>
<html>

<head>
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/log-in.css">
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
    <!-- log in -->
    <div class="container py-5">
        <div class="row overflow-hidden pt-5">
            <div class="col-lg-6 col-sm-12 d-flex align-items-center pr-5">
                <div class="left-row">
                    <img src="Images/2021-03-13.jpg" class="w-100" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12  d-flex align-items-center pl-5">
                <div class="row">
                    <div class="col-lg-10 col-sm-12 text-center">
                        <div class="titel position-relative text-center pt-3">
                            <h2 class="lite">S</h2>
                            <hr>
                            <h2 class="position-absolute text-uppercase text-color titel-sign-in">Sign in</h2>
                        </div>
                    </div>
                    <form id="loginForm" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-lg-10 col-sm-12 pt-4">
                                <div class="input">
                                    <input type="email" placeholder="E-mail" name="email" class="border-bottom w-100" id="inputEmail" pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$">
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-12 pt-4">
                                <div class="input">
                                    <input type="password" placeholder="Password" name="password" class="border-bottom w-100" id="inputPassword" pattern="^(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S{6,25}$">
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-12 pt-4">
                                <div class="submit">
                                    <!-- <button type="submit" onclick="myInput()">submit</button> -->
                                    <input type="submit" name="submit" value="Log in" onclick="myInput()" class="rounded-pill w-100 border-0 text-uppercase text-white my-3"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class=" col-10 link">
                        <span> Don't have an account ?</span>
                        <a href="sign-up.php">Sign up </a>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Java script -->
    <script src="JS/log in.js"></script>
</body>

</html>