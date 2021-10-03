<?php
        // Create connection
        require("connect.php");
        
        if(isset($_POST['email'])){ 
           $Email=$_POST['email'];   
       try {
       // set the PDO error mode to exception
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
       // sql to delete a record
           $dsn = "DELETE FROM staff WHERE  email='$Email'";
 
       // use exec() because no results are returned
           $success = $connect->exec($dsn);
           if($success){
               echo "<html><head><script>alert('Deleted');
               window.location='../worker.php';</script></head><body></body>";
               
            }else{
               echo "<html><head><script>alert('Error');
               window.location='../worker.php';</script></head><body></body>";
        
            }
       } catch(PDOException $e) {
                 echo $dsn . "<br>" . $e->getMessage();
                
           }
          $connect = null;
       }
     ?>