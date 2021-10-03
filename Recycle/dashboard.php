<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <title>Dashboard
  </title>

  <meta charset="utf-8" />
  <title>Our Gifts</title>
  <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/dashboard.css">
  <meta name="description" content="edit pesonality information" />
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="icon" href="html/photo/icon.jpg" />
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="JS/popper.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/Chart.min.js"></script>
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
                            <a class='dropdown-item' href='dashboard.php'>Dashboard</a>
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

  <header>
    <h1> Dashboard </h1>
  </header>

  <div class="row">
    <div class="col">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2 class="h2" id="dashboard">Chart</h2>
      </div>
      <canvas class="my-4 chartjs-render-monitor" id="myChart"></canvas>
      <div id="chartContainer" style="height: 250px; width: 80%;"></div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
    <div class="col">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2 class="h2" id="order">Recycle matrial </h2>
      </div>
      <div id="piechart"></div>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Dashboard of Table</h2>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm table-hover">
          <thead>
            <tr>
              <th>point of request</th>
              <th>type of matrial</th>
              <th>Gift state </th>
              <th>exchange matrial</th>
              <th>date of request</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2</td>
              <td>plastic</td>
              <td>loading</td>
              <td>none</td>
              <td>1/1/2020</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>elit</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              <td>Praesent</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>cursus</td>
              <td>ante</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>Sed</td>
              <td>nisi</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>sem</td>
              <td>at</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>imperdiet</td>
              <td>Duis</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>sagittis</td>
              <td>ipsum</td>
              <td>Praesent</td>
              <td>mauris</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>Fusce</td>
              <td>nec</td>
              <td>tellus</td>
              <td>sed</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>augue</td>
              <td>semper</td>
              <td>porta</td>
              <td>Mauris</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>massa</td>
              <td>Vestibulum</td>
              <td>lacinia</td>
              <td>arcu</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>eget</td>
              <td>nulla</td>
              <td>Class</td>
              <td>aptent</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>taciti</td>
              <td>sociosqu</td>
              <td>ad</td>
              <td>litora</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>torquent</td>
              <td>per</td>
              <td>conubia</td>
              <td>nostra</td>
            </tr>
            <tr>
              <td><b>Total of point</b></td>
              <td>30</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><b>Total of Reguest</b></td>
              <td>15</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Progress of Gift</h2>
      </div>
      <div class="row">
        <div class="col">
          <div class="card-body">
            <h5 class="card-title">The first Gift</h5>
            <div class="widget-numbers mt-0 fsize-3 text-success">90%</div>
            <div class="progress">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
            </div>
            <br><button type="button" class="btn btn-light" style="background-color: #22aa86; color: white;">Collect</button>
          </div>
        </div>
        <div class="col">
          <div class="card-body">
            <h5 class="card-title">The second Gift</h5>
            <div class="widget-numbers mt-0 fsize-3 text-success">60%</div>
            <div class="progress">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
            </div>
            <br><button type="button" class="btn btn-light" style="background-color: #22aa86; color: white;">Collect</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card-body">
            <h5 class="card-title">The third Gift</h5>
            <div class="widget-numbers mt-0 fsize-3 text-success">40%</div>
            <div class="progress">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
            </div>
            <br><button type="button" class="btn btn-light" style="background-color: #22aa86; color: white;">Collect</button>
          </div>
        </div>
        <div class="col">
          <div class="card-body">
            <h5 class="card-title">The four Gift</h5>
            <div class="widget-numbers mt-0 fsize-3 text-success">35%</div>
            <div class="progress">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width: 35%;"></div>
            </div>
            <br><button type="button" class="btn btn-light" style="background-color: #22aa86; color: white;">Collect</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card-body">
            <h5 class="card-title">The fifth Gift</h5>
            <div class="widget-numbers mt-0 fsize-3 text-success">20%</div>
            <div class="progress">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
            </div>
            <br><button type="button" class="btn btn-light" style="background-color: #22aa86; color: white;">Collect</button>
          </div>
        </div>
        <div class="col">
          <div class="card-body">
            <h5 class="card-title">The six Gift</h5>
            <div class="widget-numbers mt-0 fsize-3 text-success">14%</div>
            <div class="progress">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width: 14%;"></div>
            </div>
            <br><button type="button" class="btn btn-light" style="background-color: #22aa86; color: white;">Collect</button>
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
          <p class="my-auto">2021 © Copyright, Recycle. All Rights Reserved.</p>
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

  <script src="JS/dashboard.js"></script>
</body>

</html>