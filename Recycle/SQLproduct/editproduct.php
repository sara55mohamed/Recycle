<?php
             // Create connection with database
             require("connect2.php");
                try {
                  $connect= new PDO($dsn,$product , $pass, $option);
                  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
              
                catch(PDOException $e) {
                  echo 'Failed To Connect' . $e->getMessage();
                } 
             // identifiy variables
            $dbname = "recycle";
            $servername = "localhost";
            $product_Name = null;
            $outLine = null;
            
              // Check connection
            try {
                $dsn = "localhost" . $servername . ";recycle=" . $dbname;
              } catch(PDOException $e) {
                echo  $dsn . "<br>" . $e->getMessage();
              }
              //var_dump($success); 
              // var_dump('before if');
              // post variables
            if(isset($_POST['product_name'])==true){
                $productName= isset($_POST['product_name']) ? $_POST['product_name'] : '';
                $new_outLine= isset($_POST['outLine']) ? $_POST['outLine'] : '';
            
                 // check fields are empty
                 if(empty($productName)||empty($new_outLine)) {
                  echo  "<html><head><script>alert('Enter All fields Please');
                  window.location='../product.php';</script></head><body></body>";
                   
                } 
            else{
                    $dsn = "UPDATE product SET outline='$new_outLine'
                     WHERE product_name='$productName'";
           // execute the query
           $success= $connect->exec($dsn);
         // echo a message to say the UPDATE succeeded
               if($success){
                   echo "<html><head><script>alert('Update saved');
                   window.location='../product.php';</script></head><body></body>";
                    
                  }else{
                   echo "<html><head><script>alert('Error');
                   window.location='../product.php';</script></head><body></body>";
                   
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