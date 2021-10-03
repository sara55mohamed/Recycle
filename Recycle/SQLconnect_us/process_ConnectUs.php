<?php 
             // Create connection with database
            require("connect6.php");
             // identifiy variables
            $dbname = "recycle";
            $servername = "localhost";
            $Fullname = null;
            $Email = null;
            $Comapny =null;
            $Help =null;
            $Phonenumber =null;
              // Check connection
            //   try {
            //     // set the PDO error mode to exception
            //          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //  } 
            try {
              $dsn = "localhost" . $servername . ";recycle=" . $dbname;
            }catch(PDOException $e) {
              echo  $dsn . "<br>" . $e->getMessage();
            }
            if(isset($_POST['name'])==true){
              $Fullname= isset($_POST['name']) ? $_POST['name'] : '';
                $Email= isset($_POST['email']) ? $_POST['email'] : '';
                $Comapny= isset($_POST['company']) ? $_POST['company'] : '';
                $Phonenumber= isset($_POST['phone']) ? $_POST['phone'] : '';
                $Help= isset($_POST['help']) ? $_POST['help'] : '';


                      // check fields are empty
                 if(empty($Fullname)|| empty($Email)||empty($Comapny)|| empty($Phonenumber)|| empty($Help)) {
                  echo  "<html><head><script>alert('Enter All fields Please');
                  window.location='../index.php';</script></head><body></body>";
                }else {        
                // set the PDO error mode to exception
                // $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
                $dsn = "INSERT INTO connectus (name,email,company, phone , help)
                       VALUES ('".$Fullname."','".$Email."','".$Comapny."','".$Phonenumber."','".$Help."')";
                // use exec() because no results are returned
                // Do connect with query $db
                 $success= $connect->exec($dsn);
                 // tell staff with message is saved or not
                 if($success){
                    echo  "<html><head><script>
                    window.location='../log-in.php';</script></head><body></body>";
                    
                  }else{
                    echo  "<html><head><script>alert('Error');
                    window.location='../index.php';</script></head><body></body>";
                   
                  }
            }
                }
    /*
    // set API Access Key
    $access_key = 'afd1a21dba7fe6a7260c0f063f856198';
     
    // set email address
    $email_address = 'smohamedamer4@gmail.com';
     
    // Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
    // Receive the data:
    $json = curl_exec($ch);
    curl_close($ch);
     
    // Decode JSON response:
    $validationResult = json_decode($json, true);
    echo"<pre>";print_r($validationResult);echo"<pre>";
     
    if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
        echo "Email is valid";
    } else {
        echo "Email is not valid";
    }
    */
    ?>