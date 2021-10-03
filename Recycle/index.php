<?php
session_start();
require("SQLconnect_us/connect6.php");
?>
<html>

<head>
    <title>Recycle</title>
    <link rel="icon" href="Images/cropped-favicon-1-150x150.png" sizes="192x192" />
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/jquery-3.5.1.min2.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- loading screen -->
    <div id="loading" class="d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>

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
                            <a class="dropdown-item" href="#about">Who We Are</a>
                            <a class="dropdown-item" href="#services">Services</a>
                            <a class="dropdown-item" href="#why">Why Us</a>
                        </div>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="ideas.php">Ideas</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <?php
                    // if (session_status() == PHP_SESSION_NONE) {
                    //     session_start();
                    // }
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

    <!-- Header -->
    <header class="header">
        <div class="layer w-100 h-100">
            <div class="container">
                <div class="caption text-white h-100 col-md-6 d-flex align-items-center justify-content-center px-5">
                    <div>
                        <h1>We Protect What Matters</h1>
                        <p>Environment-friendly practices and solutions for your business and organization.</p>
                        <a href="#services" class="btn btn-outline-light text-uppercase py-2 px-4">our solution</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="about py-5 mt-5" id="about">
        <div class="container py-5">
            <div class="row text-center items">
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-lightbulb"></i>
                        <h4 class="my-3">Highly Customizable</h4>
                        <p>All the options, features and widgets are well thought out, allowing fast and easy customization.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-leaf"></i>
                        <h4 class="my-3">Packed With Features</h4>
                        <p>Recycle has everything you need to build an outstanding website for your environmental business or project.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-fan"></i>
                        <h4 class="my-3">Awesome Support</h4>
                        <p>We care about your experience and our friendly support team is always ready to answer your questions.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-hands"></i>
                        <h4 class="my-3">Made With Care</h4>
                        <p>We are passionate about creating high-quality WorPress themes and we put our hearts into our products.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5 caption">
                <div class="col-md-8 left">
                    <h3>OUR PURPOSE & VALUES</h3>
                    <p class="font-italic">We spread the culture of recycling and awareness toward the community through entrepreneurial actions, campaigns, workshops, events and recycling fairs.</p>
                    <p class="secP">We provide a various types of services and tools which help the customers to start the first step of recycling from the home, collecting the solid wastes from homes, cafes, restaurants and schools then turning it to recycled raw materials through many processes.</p>
                </div>
                <div class="col-md-4 right mt-4 px-4">
                    <div class="row">
                        <i class="fas fa-leaf mr-2"></i>
                        <p>Experienced waste management team.</p>
                    </div>
                    <div class="row">
                        <i class="fas fa-leaf mr-2"></i>
                        <p>Fast and 100% reliable customer support.</p>
                    </div>
                    <div class="row">
                        <i class="fas fa-leaf mr-2"></i>
                        <p>5 million pounds of cardboard recycled.</p>
                    </div>
                    <div class="row">
                        <i class="fas fa-leaf mr-2"></i>
                        <p>Steady and sustainable growth.</p>
                    </div>
                    <div class="row">
                        <i class="fas fa-leaf mr-2"></i>
                        <p>Giving back to the community.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services pb-5" id="services">
        <div class="recycle-man d-flex align-items-end">
            <div class="container">
                <div class="caption px-5 text-white col-md-6 h-50 d-flex align-items-center justify-content-center">
                    <div>
                        <h2>Better Recycling</h2>
                        <p>Environment-friendly practices and solutions for your business and organisation.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- items -->
        <div class="container">
            <div class="row text-center items mt-5 pt-5">
                <div class="col-md-3">
                    <div class="item">
                        <i class="far fa-trash-alt"></i>
                        <h4 class="my-3">Collecting</h4>
                        <p>Recycle has everything you need to build an outstanding website for your environmental business or project.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-cubes"></i>
                        <h4 class="my-3">Storing</h4>
                        <p>All the options, features and widgets are well thought out, allowing fast and easy customization.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-sync-alt"></i>
                        <h4 class="my-3">Processing</h4>
                        <p>We care about your experience and our friendly support team is always ready to answer your questions.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="fas fa-recycle"></i>
                        <h4 class="my-3">Recycling</h4>
                        <p>We are passionate about creating high-quality WorPress themes and we put our hearts into our products.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- materials -->
        <div class="container py-5 materials">
            <h2 class="text-center mt-5">RECYCLING BASICS</h2>
            <div class="row mt-4 text-center">
                <div class="items col-md-3 py-5">
                    <div class="item">
                        <img src="Images/glass-waste-icon.png" alt="" class="img-fluid">
                        <h3 class="mt-5 mb-3">Glass</h3>
                        <p class="text-justify">The glass is cut into "gobs" and these individual pieces are fired down into the forming machine. Within seconds, the glass is pressed and blown into shape within a mould and emerges as a glass bottle or jar.</p>
                    </div>
                </div>
                <div class="items col-md-3 py-5">
                    <div class="item">
                        <img src="Images/plastic-waste-icon.png" alt="" class="img-fluid">
                        <h3 class="mt-5 mb-3">Plastic</h3>
                        <p class="text-justify">Plastic bottles are made from oil that will one day run out. It is important to make use of materials that can be recycled and re-used, rather than continually exploiting the fossil fuels used to make them in the first place.</p>
                    </div>
                </div>
                <div class="items col-md-3 py-5">
                    <div class="item">
                        <img src="Images/paper-waste-icon.png" alt="" class="img-fluid">
                        <h3 class="mt-5 mb-3">Paper</h3>
                        <p class="text-justify">The paper is washed to remove any film, glue, ink and other contaminants using soapy water. Once washed the paper is then transfered to a large container, where it is mixed with water to create a pulp.</p>
                    </div>
                </div>
                <div class="items col-md-3 py-5">
                    <div class="item">
                        <img src="Images/metal-waste-icon.png" alt="" class="img-fluid">
                        <h3 class="mt-5 mb-3">Metal</h3>
                        <p class="text-justify">Metals can be recycled repeatedly without altering their properties. According to the AISI, steel is the most recycled material. The other highly recycled metals include aluminum, copper, silver, brass, and gold.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why py-5" id="why">
        <!-- progress -->
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 left py-3">
                    <h3 class="text-dark">Annual Report</h3>
                    <p class="firP">Maintain household service levels where
                        they currently receive packaging and collection.</p>
                    <p class="secP">871,000 single-family households and 384,000 multi-family
                        households received curbside and multi-family collection
                        services. The adjusted targets (less local
                        governments that did not participate) are 793,000 singlefamily households and 364,000 multi-family households.</p>
                    <div class="button d-flex justify-content-between align-items-center mt-4">
                        <a href="#" class="text-capitalize text-white">full report</a>
                        <a href="#"><i class="fas fa-cloud-download-alt text-white"></i></a>
                    </div>
                </div>
                <div class="col-md-6 right py-3">
                    <!-- one -->
                    <div class="caption d-flex justify-content-between align-items-center">
                        <p>Paper & Cardboard</p>
                        <p>76%</p>
                    </div>
                    <div class="prog">
                        <div class="green h-100"></div>
                    </div>
                    <!-- two -->
                    <div class="caption d-flex justify-content-between align-items-center">
                        <p>Medical Waste</p>
                        <p>70%</p>
                    </div>
                    <div class="prog">
                        <div class="orange h-100"></div>
                    </div>
                    <!-- three -->
                    <div class="caption d-flex justify-content-between align-items-center">
                        <p>Industrial Scrap Metal</p>
                        <p>35%</p>
                    </div>
                    <div class="prog">
                        <div class="green2 h-100"></div>
                    </div>
                    <!-- two -->
                    <div class="caption d-flex justify-content-between align-items-center">
                        <p>Glass Bottles</p>
                        <p>55%</p>
                    </div>
                    <div class="prog">
                        <div class="blue h-100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonials -->
        <div class="container testimonials py-5">
            <h3 class="mb-5 text-center">Happy Customers.</h3>
            <div id="carouselExampleCaptions" class="carousel slide bg-white py-5" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active rounded-circle d-inline-block" data-target="#carouselExampleCaptions" data-slide-to="0"></li>
                    <li class="rounded-circle d-inline-block" data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li class="rounded-circle d-inline-block" data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner text-center w-75 mx-auto">
                    <div class="carousel-item active">
                        <div class="pic mb-3">
                            <img src="Images/client1.jpg" alt="" class="rounded-circle img-fluid">
                        </div>
                        <div class="content mt-4">
                            <p class="mb-4">I just started using this great service and it has been wonderful. I feel great. I would definitely recommend it to my friends.</p>
                            <h6 class="font-weight-bold">Andrew London</h6>
                            <p class="env">ScrapCorp International</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="pic mb-3">
                            <img src="Images/client2.jpg" alt="" class="rounded-circle img-fluid">
                        </div>
                        <div class="content mt-4">
                            <p class="mb-4">I tried this service over a long period and it helped me a lot. When I have problems with any type of materials, this service helps me solve it.</p>
                            <h6 class="font-weight-bold">Robert Jones</h6>
                            <p class="env">Metal, Glass & Co</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="pic mb-3">
                            <img src="Images/client3.jpg" alt="" class="rounded-circle img-fluid img3">
                        </div>
                        <div class="content mt-4">
                            <p class="mb-4">The team helped me alot in recycling. I had a problem with the materials that i couldn't deal with it by myself, but they took care of it right away.</p>
                            <h6 class="font-weight-bold">Alex Smith</h6>
                            <p class="env">Envato Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact -->
    <section class="contact py-5" id="contact">
        <div class="container py-5">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4 left">
                    <h3 class="text-dark mb-3">Contact Us!</h3>
                    <!-- <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida fringilla neque sit amet sollicitudin. Duis aliquam dictum feugiat.</p> -->
                    <div class="icons mt-5">
                        <!-- first -->
                        <div class="icon d-flex align-items-center my-3">
                            <i class="fas fa-phone text-white mr-3 d-flex align-items-center justify-content-center phone"></i>
                            <div class="caption">
                                <p class="my-1 text-dark">100-800-5555</p>
                                <p class="my-1 secP">Call us today!</p>
                            </div>
                        </div>
                        <!-- second -->
                        <div class="icon d-flex align-items-center my-3">
                            <i class="far fa-clock text-white mr-3 d-flex align-items-center justify-content-center clock"></i>
                            <div class="caption">
                                <p class="my-1 text-dark">Office Hours</p>
                                <p class="my-1 secP">Monday-Friday: 7 AM to 4PM</p>
                            </div>
                        </div>
                        <!-- third -->
                        <div class="icon d-flex align-items-center my-3">
                            <i class="fas fa-map-marker-alt text-white mr-3 d-flex align-items-center justify-content-center map"></i>
                            <div class="caption">
                                <p class="my-1 text-dark">Company Headquarters</p>
                                <p class="my-1 secP">Cairo, Sheikh Zayed City</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right column -->
                <form class="col-md-8 right" method="post" action="SQLconnect_us/process_ConnectUs.php" enctype="multipart/form-data">
                    <div class="row my-4">
                        <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Your Full Name">
                        </div>
                        <div class="col">
                            <input type="text" name="company" class="form-control" placeholder="Company">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Your E-mail">
                        </div>
                        <div class="col">
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="help" id="exampleFormControlTextarea1" placeholder="How can we help?" rows="5">
                    </div>
                    <button type="submit" class="btn rounded-0 text-white mt-2 text-uppercase">Send</button>
                </form>
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

    <!-- JavaScript -->
    <script src="JS/script.js"></script>
    <!-- <script src="JS/apiTest.js"></script> -->
</body>

</html>