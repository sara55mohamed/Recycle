<?php 
             // Create connection with database
            require("connect3.php");
             // identifiy variables
            $dbname = "recycle";
            $servername = "localhost";
            $Firstname = null;
            $Lastname = null;
            $Email = null;
            $Password =null;
            $Address =null;
            $City =null;
            $Area =null;
            $Phonenumber =null;
            $imageName =null;
              // Check connection
            try {
                $dsn = "localhost" . $servername . ";recycle=" . $dbname;
              } catch(PDOException $e) {
                echo  $dsn . "<br>" . $e->getMessage();
              }
              // var_dump($success); 
              // var_dump('before hj');
              // post variables
            if(isset($_POST['first_name'])==true){
                $Firstname= isset($_POST['first_name']) ? $_POST['first_name'] : '';
                $Lastname= isset($_POST['last_name']) ? $_POST['last_name'] : '';
                $Email= isset($_POST['email']) ? $_POST['email'] : '';
                $Password= isset($_POST['password']) ? $_POST['password'] : '';
                $Address= isset($_POST['address']) ? $_POST['address'] : '';
                $City= isset($_POST['city']) ? $_POST['city'] : '';
                $Area= isset($_POST['area']) ? $_POST['area'] : '';
                $Phonenumber= isset($_POST['phone']) ? $_POST['phone'] : '';
                $imageName = $_FILES["image"]['name'];
                $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
                $imageType = $_FILES["image"]["type"];
                move_uploaded_file($_FILES['image']['tmp_name'], '../customer_Images/'.$imageName);
                //prevent dublication
                $check_dublicate_email="SELECT email from customer
                   where email = '$Email' ";
                $check_dublicate_emailStatement = $connect->prepare($check_dublicate_email); 
                $check_dublicate_emailStatement -> execute();

                if ($row= $check_dublicate_emailStatement->fetch(PDO::FETCH_ASSOC)){            
                  echo  "<html><head><script>alert('Email already taken. please use another Email!');
                  window.location='../sign-up.php';</script></head><body></body>";
                  //header("Location:../sign-up.php");
                }else{
                      // check fields are empty
                 if(empty($Firstname)|| empty($Lastname)||empty($Email)|| empty($Password)|| empty($Address)|| empty($City)||empty($Area)|| empty($Phonenumber)|| empty($imageName)) {
                  echo  "<html><head><script>alert('Enter All fields Please');
                  window.location='../sign-up.php';</script></head><body></body>";
                }else {        
                // set the PDO error mode to exception
                // $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
                $dsn = "INSERT INTO customer (first_name,last_name,email,password, address , city, area ,phone,image)
                       VALUES ('".$Firstname."','".$Lastname."','".$Email."','".$Password."','".$Address."','".$City."','".$Area."','".$Phonenumber."','".$imageName."')";
                // use exec() because no results are returned
                // Do connect with query $db
                 $success= $connect->exec($dsn);
                 // tell staff with message is saved or not
                 if($success){
                    echo  "<html><head><script>
                    window.location='../log-in.php';</script></head><body></body>";
                    
                  }else{
                    echo  "<html><head><script>alert('Error');
                    window.location='../sign-up.php';</script></head><body></body>";
                   
                  }
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