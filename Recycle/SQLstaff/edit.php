<?php
            // Create connection with database
         require("connect.php");
       // Check connection
         try {
            // set the PDO error mode to exception
                 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
         catch(PDOException $e) {
            echo $dsn . "<br>" . $e->getMessage();
            }
        // post variables
         if(isset($_POST['email'])){
          $old_email= isset($_POST['email']) ? $_POST['email'] : '';
          $new_email= isset($_POST['new_email']) ? $_POST['new_email'] : '';
          $Firstname= isset($_POST['first_name']) ? $_POST['first_name'] : '';
          $Lastname= isset($_POST['last_name']) ? $_POST['last_name'] : '';
          $Password= isset($_POST['password']) ? $_POST['password'] : '';
          $Gender= isset($_POST['gender']) ? $_POST['gender'] : '';
          $Position= isset($_POST['position']) ? $_POST['position'] : '';
          $Role= isset($_POST['role']) ? $_POST['role'] : '';
          $Salary= isset($_POST['salary']) ? $_POST['salary'] : '';
                  // check fields are empty
                if(empty($old_email) || empty($new_email) || empty($Firstname)|| empty($Lastname)|| empty($Password)|| empty($Gender)|| empty($Position)||empty($Role)|| empty($Salary)) {
                    echo  "<html><head><script>alert('Enter All fields Please');</script></head><body></body>";
                    header("Location:../worker.php");  
                  } 
            else{
             // Prepare statement
                  $dsn = "UPDATE staff SET email='$new_email',
                  first_name='$Firstname',
                  last_name='$Lastname', 
                  password='$Password',
                  gender='$Gender' ,
                  position='$Position',
                  role='$Role',
                  salary='$Salary' WHERE email='$old_email'";
  
            // execute the query
            $success= $connect->exec($dsn);
          // echo a message to say the UPDATE succeeded
                if($success){
                    echo "<html><head><script>alert('Update saved');
                    window.location='../worker.php';</script></head><body></body>";
                   
                  }else{
                    echo "<html><head><script>alert('Error');
                    window.location='../worker.php';</script></head><body></body>";
                    
            }
        } 
            }
              
         
        ?>