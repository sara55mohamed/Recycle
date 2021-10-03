<?php
//Authentication ---> to prove you in staff or not(admin or worker)*/
             // ob_start();  
                require("SQLstaff/connect.php");#new code
              //  $authorizedUsers  = "admin.php";
             $Role =null;
                    if(isset($_POST['submit'])){
                        $Email = $_POST['email'];
                        $Password = $_POST['password'];
                     //    $Role = $_POST['role'];
               $getStaff = "SELECT * FROM staff WHERE email='".$Email."' AND password= '".$Password."'";
            
                $getStaffDetails = $connect->prepare($getStaff);
                $getStaffDetails -> execute();
                
                        if ($row = $getStaffDetails->fetch(PDO::FETCH_ASSOC)) {
                              //header("Location: ". $authorizedUsers);
                              session_start();
                              $_SESSION['email'] = $Email;
                              $_SESSION['password'] = $Password;
                              $_SESSION['role'] = $row['role'];

                          if($_SESSION['role'] == 'admin'){
                            header("Location:worker.php");
                        }elseif ($_SESSION['role'] == 'worker'){
                          header("Location:order.php");
                        }
                      }
                      else{
                        echo"<script>alert('Invalid Staff')</script>";
                    }
                 }
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LOG IN</title>
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
    <!-- Internal Style -->
    <style type="text/css">
      
    </style>
  </head>
  <body>
    <!-- nav bar-->
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
                    <!-- <li class="nav-item active mx-2">
                    <a class="nav-link active"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li> -->
                    
                    <li class="nav-item mx-1">
                        <a class="nav-link disabled"><i class="fas fa-home"></i>Workers</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link disabled" >Customers</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link disabled">Products</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link disabled">Orders</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link disabled">Reports</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- page -->
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <!-- LOG IN FORM -->
          <form style="max-width: 550px; margin: 20px auto;"  method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required pattern="^[^\W](\S){4,23}[^\W]@(yahoo|gmail)\.(com)$">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password" required pattern="^(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S{6,25}$">
            </div>
            

            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="form1Example3"
                    checked
                  />
                  <label class="form-check-label" for="form1Example3"> Remember me </label>
               </div>
              </div>

              <!-- <div class="col">
                <a href="#!" style="color: #22aa86 ;">Forgot password?</a>
              </div> -->
            </div>


            <a>
            <button type="submit" name="submit"  class="btn btn-primary btn-block" style="background-color: #22aa86 ;">Sign in</button>
           </a>
            

          </form>
        </div>
      </div>
    </div>
  
  </body>
  
  
</html>