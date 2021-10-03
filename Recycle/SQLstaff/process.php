<?php
             // Create connection with database
            require("connect.php");
             // identifiy variables
            $dbname = "recycle";
            $servername = "localhost";
            $Firstname = null;
            $Lastname = null;
            $Email = null;
            $Password =null;
            $Gender =null;
            $Position =null;
            $Role =null;
            $Salary =null;
              // Check connection
            try {
                $dsn = "localhost" . $servername . ";recycle=" . $dbname;
              } catch(PDOException $e) {
                echo  $dsn . "<br>" . $e->getMessage();
              }
              //var_dump($success); 
              // var_dump('before if');
              // post variables
            if(isset($_POST['first_name'])==true){
                $Firstname= isset($_POST['first_name']) ? $_POST['first_name'] : '';
                $Lastname= isset($_POST['last_name']) ? $_POST['last_name'] : '';
                $Email= isset($_POST['email']) ? $_POST['email'] : '';
                $Password= isset($_POST['password']) ? $_POST['password'] : '';
                $Gender= isset($_POST['gender']) ? $_POST['gender'] : '';
                $Position= isset($_POST['position']) ? $_POST['position'] : '';
                $Role= isset($_POST['role']) ? $_POST['role'] : '';
                $Salary= isset($_POST['salary']) ? $_POST['salary'] : '';

                //prevent dublication
                $check_dublicate_email="SELECT email from staff
                   where email = '$Email' ";
                $check_dublicate_emailStatement = $connect->prepare($check_dublicate_email); 
                $check_dublicate_emailStatement -> execute();

                if ($row= $check_dublicate_emailStatement->fetch(PDO::FETCH_ASSOC)){            
                  echo  "<html><head><script>alert('Email already taken. please use another Email!');
                  window.location='../worker.php';</script></head><body></body>";
                  //header("Location:../worker.php");
                }else{
                      // check fields are empty
                 if(empty($Firstname)|| empty($Lastname)||empty($Email)|| empty($Password)|| empty($Gender)|| empty($Position)||empty($Role)|| empty($Salary)) {
                  echo  "<html><head><script>alert('Enter All fields Please');
                  window.location='../worker.php';</script></head><body></body>";
                }else {        
                // set the PDO error mode to exception
                $dsn = "INSERT INTO staff (first_name,last_name,email,password, gender, position,role, salary)
                       VALUES ('".$Firstname."','".$Lastname."','".$Email."','".$Password."','".$Gender."','".$Position."','".$Role."','".$Salary."')";
                // use exec() because no results are returned
                // Do connect with query $db
                 $success= $connect->exec($dsn);
                 // tell staff with message is saved or not
                 if($success){
                    echo  "<html><head><script>alert('Saved');
                    window.location='../worker.php';</script></head><body></body>";
                    
                  }else{
                    echo  "<html><head><script>alert('Error');
                    window.location='../worker.php';</script></head><body></body>";
                   
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