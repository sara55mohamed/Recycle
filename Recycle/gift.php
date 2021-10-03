<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <title>Our Gifts</title>
  <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
  <link rel="stylesheet" href="CSS/all.min.css">
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/gift.css">
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
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
          // var_dump($_SESSION);
          // die;
          // $imageName= 'customer_Images/'.$row['image'];
          //    $_SESSION['email'] = $Email;
          //   $_SESSION['password'] = $Password;
          require_once("SQLcustomer/connect3.php");
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

  <div class="container py-5">
    <h1>Our Gifts</h1>
    <!-- first gift -->
    <div class="row justify-content-between py-3 align-items-center">
      <div class="col-md-6 pr-md-5 disc py-2">
        <h3 class="mb-3">Eco friendly paper tissues</h3>
        <p>You can earn this valuable gift from our website by collecting the required number of points decided by 50
          points, and you can collect points by making more requests through us.</p>
      </div>
      <div class="col-md-6 py-2">
        <img class="w-100" src="Images/Master.jpg" alt="bags">
      </div>
    </div>
    <!-- second gift -->
    <div class="row justify-content-between py-3 align-items-center flex-md-row-reverse">
      <div class="col-md-6 pl-md-5 disc py-2">
        <h3 class="mb-3">Liquid soap</h3>
        <p>You can earn this valuable gift from our website by collecting the required number of points decided by 70
          points, and you can collect points by making more requests through us.</p>
      </div>
      <div class="col-md-6 py-2">
        <img class="w-100" src="Images/ls2.jpg" alt="bags">
      </div>
    </div>
    <!-- third gift -->
    <div class="row justify-content-between py-3 align-items-center">
      <div class="col-md-6 pr-md-5 disc py-2">
        <h3 class="mb-3">Eco friendly food packaging</h3>
        <p>You can earn this valuable gift from our website by collecting the required number of points decided by 100
          points, and you can collect points by making more requests through us.</p>
      </div>
      <div class="col-md-6 py-2">
        <img class="w-100" src="Images/food2.png" alt="bags">
      </div>
    </div>
    <!-- fourth gift -->
    <div class="row justify-content-between py-3 align-items-center flex-md-row-reverse">
      <div class="col-md-6 pl-md-5 disc py-2">
        <h3 class="mb-3">Eco friendly bin</h3>
        <p>You can earn this valuable gift from our website by collecting the required number of points decided by 250
          points, and you can collect points by making more requests through us.</p>
      </div>
      <div class="col-md-6 py-2">
        <img class="w-100" src="Images/d72265e1a0f2750d3159bd064c7297c8.jpg" alt="bags">
      </div>
    </div>
    <!-- fifth gift -->
    <div class="row justify-content-between py-3 align-items-center">
      <div class="col-md-6 pr-md-5 disc py-2">
        <h3 class="mb-3">Laptop</h3>
        <p>You can earn this valuable gift from our website by collecting the required number of points decided by 500
          points, and you can collect points by making more requests through us.</p>
      </div>
      <div class="col-md-6 py-2">
        <img class="w-100" src="Images/lap.png" alt="bags">
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

  <script src="JS/gift.js"></script>
</body>

</html>