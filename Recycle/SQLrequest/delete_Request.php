<?php
        // Create connection
        require("connect4.php");

        
        if(isset($_POST['id'])){ 
           $ID=$_POST['id'];   
       try {

       // set the PDO error mode to exception
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
       // sql to delete a record
           $dsn = "DELETE FROM request WHERE  id='$ID'";
 
       // use exec() because no results are returned
           $success = $connect->exec($dsn);
           if($success){

            if(isset($_POST['page']))
               echo "<html><head><script>
               window.location='../order.php';</script></head><body></body>";
            else
               echo "<html><head><script>
               window.location='../Request.php';</script></head><body></body>";
               
            }else{
               echo "<html><head><script>alert('Error');
               window.location='../Request.php';</script></head><body></body>";
        
            }
       } catch(PDOException $e) {
                 echo $dsn . "<br>" . $e->getMessage();
                
           }
          $connect = null;
       }
     ?>