<html>

<head>
    <title>Ideas</title>
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/ideas.css">
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

    <!-- tabs -->
    <div class="tabs container py-5">
        <p class="h2 text-center mb-4">Here are some recycling ideas that you can simply do at home.</p>
        <!-- links -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <!-- first tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">All</a>
            </li>

            <!-- second tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="plastic-tab" data-toggle="tab" href="#plastic" role="tab" aria-controls="plastic" aria-selected="false">Plastic</a>
            </li>

            <!-- third tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="glass-tab" data-toggle="tab" href="#glass" role="tab" aria-controls="glass" aria-selected="false">Glass</a>
            </li>

            <!-- fourth tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="paper-tab" data-toggle="tab" href="#paper" role="tab" aria-controls="paper" aria-selected="false">Paper</a>
            </li>

            <!-- fifth tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="metal-tab" data-toggle="tab" href="#metal" role="tab" aria-controls="metal" aria-selected="false">Metal</a>
            </li>
        </ul>

        <!-- content -->
        <div class="tab-content" id="myTabContent">
            <!-- first tab content -->
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row pt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/lighted gb.jpeg" class="card-img-top " alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Lighted glass bottles</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/3D paper snowflake.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">3D Paper snowflake</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/accessories pb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Plastic Accessories</h5>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Cans pens.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Can school tools</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/Big plastic bottles.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Book organizer</h5>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Moodlighting.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Moodlighting can</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/tray set.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tray set</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Felloe paper.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> Paper Felloe</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Decorate containers.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Decorate containers</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/piggy pb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">piggy Moneyboxes</h5>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Butterflies paper.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Butterflies</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/How-to-DIY-Nice-Vase-from Glass-Bottle.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Elegant Vase</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Snowman paper.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Paper Snowman</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/love gb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Love Vase</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/garden decoratin.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Garden decoration</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/Plant vessel.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Plant vessel</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/lotion pb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Charging Dock bottle</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Paper acccessories.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Paper accessories</h5>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Tableware vessel.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tableware vessel</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/shovels gb.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Shovels</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- second tab content -->
            <div class="tab-pane fade" id="plastic" role="tabpanel" aria-labelledby="plastic-tab">
                <div class="row pt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/accessories pb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup1')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup1">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup1');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Plastic Accessories</p>
                                <ol class="list">
                                    <li class="my-2">Bring some bottle and cut the last part of it.</li>
                                    <li class="my-2">Perforate the middle of the cut bottles.</li>
                                    <li class="my-2">Cut the edges to make a flower shape like picture no.2.</li>
                                    <li class="my-2">Bring some thin metal sticks and synthesize them like picture no.3.</li>
                                    <li class="my-2">Finally you will get an awesome accessories hanger.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/Big plastic bottles.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup2')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup2">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup2');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Book organizer</p>
                                <ol class="list">
                                    <li>Bring some empty bottles of soap which you have .</li>
                                    <li>Cut it as shown in the 2nd picture.</li>
                                    <li>Stick some tickets or stickers and write on it to organize your books.</li>
                                    <li>Now you have the best and simplest book organizer.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/piggy pb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup3')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup3">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup3');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">piggy Moneyboxes</p>
                                <ol class="list">
                                    <li>Prepare some of empty plastic bottles.</li>
                                    <li>Decorate it by sticking colorful fabric on it by the shape you want.</li>
                                    <li>Now you have your cute moneybox to save money.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/Plant vessel.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup4')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup4">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup4');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Plant vessel</p>
                                <ol class="list">
                                    <li>Bring a plastic bottle and a CD .</li>
                                    <li>Cut the bottle into two halves.</li>
                                    <li>Stick the bottleneck to the CD then splatter the two halves with any liquid color you prefer.</li>
                                    <li>Put some mud and plant in it.</li>
                                    <li>Finally you will have an elegant plant vessel .</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="plastic/lotion pb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup5')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup5">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup5');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Charging Dock bottle</p>
                                <ol class="list">
                                    <li>Prepare a lotion bottle and cut it as shown in the picture.</li>
                                    <li>Encapsulate it with ornamented fabric.</li>
                                    <li>Now you have a charging dock which protects your phone to be broken from the floor.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- third tab content -->
            <div class="tab-pane fade" id="glass" role="tabpanel" aria-labelledby="glass-tab">
                <div class="row pt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/lighted gb.jpeg" class="card-img-top " alt="...">
                            </div>
                            <div onclick="show('popup6')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup6">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup6');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Lighted glass bottles</p>
                                <ol class="list">
                                    <li>Bring some glass bottles.</li>
                                    <li>Fill it with wired lighted leds.</li>
                                    <li>You wil have a lighted glass bottles which make your home more calm and romantic.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/tray set.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup7')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup7">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup7');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Tray set</p>
                                <ol class="list">
                                    <li>Prepare some glass bottles and cut it as shown in the picture .</li>
                                    <li>Make it smooth by using emery paperto protect yourself from being hurt.</li>
                                    <li>Finally you will have a lovely tray set that you can use instead of dishes.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/How-to-DIY-Nice-Vase-from Glass-Bottle.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup8')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup8">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup8');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Elegant Vase</p>
                                <ol class="list">
                                    <li>Bring a glass bottle and coconvolve it with a tape and make a separate rings as 1st picture.</li>
                                    <li>Splatter the bottle with any liquid you need and let it dry.</li>
                                    <li>Remove the tape.</li>
                                    <li>Put a flower in it to have a nice vase.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/love gb.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup9')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup9">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup9');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Love Vase</p>
                                <ol class="list">
                                    <li>Prepare some bottles and plastic flowers.</li>
                                    <li>Convolve a colored thread which you prefer on them.</li>
                                    <li>Decorate them by sticking some plastic flowers and perforate on them.</li>
                                    <li>Put some plastic flowers in them to have a perfect vase.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="glass/shovels gb.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup10')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup10">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup10');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Shovels</p>
                                <ol class="list">
                                    <li>Bring some bottles and wood sticks.</li>
                                    <li>Cut the bottles to halves.</li>
                                    <li>Take the halves with the bottlenecks and cut it again as the picture without break the bottlenecks.</li>
                                    <li>Use emery paper to make them smoother and avoiding hurting yourself.</li>
                                    <li>Finally you will have shovels which you can use to put some ice in any drink with it.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- fourth tab content -->
            <div class="tab-pane fade" id="paper" role="tabpanel" aria-labelledby="paper-tab">
                <div class="row pt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/3D paper snowflake.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup11')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup11">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup11');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">3D Paper snowflake</p>
                                <ol class="list">
                                    <li>Bring some squared papers.</li>
                                    <li>Fold it to make a triangle and cut it as 2nd picture.</li>
                                    <li>Flatten the paper and stick each opposite side to each other like 3rd, 4th, 5th and 6th picture.</li>
                                    <li>Repeat these steps again and when you finished stick all together like 7th picture.</li>
                                    <li>Now you have a 3D paper snowflack to decorate your home in any occasion.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Felloe paper.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup12')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup12">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup12');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Paper Felloe</p>
                                <ol class="list">
                                    <li>Prepare a paper sheet and some colored paper.</li>
                                    <li>Roll the colored paper to form circles with different sizes.</li>
                                    <li>Stick the rolled paper randomly.</li>
                                    <li>Then, you will get a paper felloe which you can give it to anyone you want as a gift.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Butterflies paper.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup13')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup13">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup13');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Butterflies</p>
                                <ol class="list">
                                    <li>Bring some colored paper and colored tape.</li>
                                    <li>Cut them as shown in th 1st picture.</li>
                                    <li>Fold it many times as in the 2nd picture.</li>
                                    <li>Fasten them from the middle as in the 3rd picture.</li>
                                    <li>Try to open softly you will have a pretty shape of butterflies.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Snowman paper.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup14')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup14">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup14');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Paper Snowman</p>
                                <ol class="list">
                                    <li>Prepare two carton plates and some cut paper.</li>
                                    <li>Stick the two plates to each other as shown in the pictures.</li>
                                    <li>Put some glue on the back of the plates.</li>
                                    <li>splatter the cut paper on the plates.</li>
                                    <li>Finally you will have a cute snowman.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="paper/Paper acccessories.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup15')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup15">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup15');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Paper accessories</p>
                                <ol class="list">
                                    <li>Immerse the sticks in boiling water for 30 minutes.</li>
                                    <li>Drain the water and bend them.</li>
                                    <li>Let the sticks cool.</li>
                                    <li>Use glass tumbler to give the sticks appropriate shape.</li>
                                </ol>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- fifth tab content -->
            <div class="tab-pane fade" id="metal" role="tabpanel" aria-labelledby="metal-tab">
                <div class="row pt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Cans pens.png" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup16')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup16">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup16');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Can school tools</p>
                                <ol class="list">
                                    <li>Bring some cans and two carton paper.</li>
                                    <li>Cut the carton paper as shown ans stick them to make them harder.</li>
                                    <li>Stick half number of cans on the first face of the carton paper and the remain on the other face.</li>
                                    <li>Put a thick thread around cans ana the handle.</li>
                                    <li>Finally you will get an awesome can school tools.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Moodlighting.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup17')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup17">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup17');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Moodlighting can</p>
                                <ol class="list">
                                    <li>Prepare some tins, cloth hanger and clothespins.</li>
                                    <li>Encapsulate them with an elegant ornamented sticky paper.</li>
                                    <li>Fasten thread arround tins.</li>
                                    <li>Now you have a moodlighting cans used to decorate your home and make it romantic.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Decorate containers.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup18')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup18">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup18');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Decorate containers</p>
                                <ol class="list">
                                    <li>Bring some tins with different sizes and plastic flowers.</li>
                                    <li>Encapsulate them with colored fiber.</li>
                                    <li>Stick the plastic flowers on the tins.</li>
                                    <li>Finally you will have decorate containers which can used to put your things in.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/garden decoratin.jpg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup19')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup19">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup19');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Garden decoration</p>
                                <ol class="list">
                                    <li>Prapare a tin and some clothespins.</li>
                                    <li>Fix the clothespins on the tin.</li>
                                    <li>Put some mud and plant in the tin.</li>
                                    <li>Finally you have the simplest and fastest plant vessel to decorate your home.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="row overflow-hidden">
                                <img src="metals/Tableware vessel.jpeg" class="card-img-top" alt="...">
                            </div>
                            <div onclick="show('popup20')" class="position-absolute layer rounded d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                        </div>
                        <div class="popup position-fixed justify-content-center align-items-center" id="popup20">
                            <div class="content bg-white rounded p-5 position-relative">
                                <i class="fas fa-times position-absolute close" onclick="hide('popup20');event.stopPropagation()"></i>
                                <p class="h2 text-center py-3">Tableware vessel</p>
                                <ol class="list">
                                    <li>Bring some tins, a sheet of wood and a piece of metal.</li>
                                    <li>Paint the tins and the wood sheet with any liquid color you prefer and let them dry.</li>
                                    <li>Fix some tins on the first face of the wood sheet and the ramain to the other face.</li>
                                    <li>Bend the piece of metal and fix it on the top of the wood sheet to make it esier to left.</li>
                                    <li>Now you will get a tableware vessels</li>
                                </ol>
                            </div>
                        </div>
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


    <!-- Java script-->
    <script src="JS/ideas.js"></script>
</body>

</html>