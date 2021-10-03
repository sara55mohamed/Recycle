<?php 
session_start();
// Create connection with database
            require("connect4.php");
             // identifiy variables
            $dbname = "recycle";
            $servername = "localhost";
            $ID = null;
            $matrialType = null;
            $Amount = null;
            $Date = null;
            $exchangeMatrial =null;
              // Check connection
            try {
                $dsn = "localhost" . $servername . ";recycle=" . $dbname;
              } catch(PDOException $e) {
                echo  $dsn . "<br>" . $e->getMessage();
              }
              // post variables
            if(isset($_POST['matrial_type'])){
                $matrialType=isset($_POST['matrial_type']) ? $_POST['matrial_type'] : '';
                $Amount=isset($_POST['amount']) ? $_POST['amount'] : '';
                $Date=isset($_POST['date']) ? $_POST['date'] : '';
                $exchangeMatrial= isset($_POST['exchange_matrial']) ? $_POST['exchange_matrial'] : '';
                $ID= isset($_POST['id']) ? $_POST['id'] : '';
                // check fields are empty
                 if(empty($matrialType)|| empty($Amount)||empty($Date)|| empty($exchangeMatrial))
                  {
                  echo  "<html><head><script>alert('Enter All fields Please');
                  window.location='../Request.php';</script></head><body></body>";
                }else {        
                // set the PDO error mode to exception
                $dsn = "INSERT INTO request (matrial_type,amount,date,exchange_matrial, customer_id)
                       VALUES ('".$matrialType."','".$Amount."','".$Date."','".$exchangeMatrial."',".$_SESSION['customer_id'].")";
                // use exec() because no results are returned
                // Do connect with query $db
                 $success= $connect->exec($dsn);
                 // tell staff with message is saved or not
                 if($success){
                    echo  "<html><head><script>
                    window.location='../Request.php';</script></head><body></body>";
                    
                  }else{
                    echo  "<html><head><script>alert('Error');
                    window.location='../Request.php';</script></head><body></body>";
                   
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
