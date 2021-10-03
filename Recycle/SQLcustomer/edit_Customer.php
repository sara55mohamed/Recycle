<?php
        // Create connection with database
        require("connect3.php");
        // post variables
         if(isset($_POST['email'])){
                $old_email= isset($_POST['email']) ? $_POST['email'] : '';
                $Firstname= isset($_POST['first_name']) ? $_POST['first_name'] : '';
                $Lastname= isset($_POST['last_name']) ? $_POST['last_name'] : '';
                $Password= isset($_POST['password']) ? $_POST['password'] : '';
                $Address= isset($_POST['address']) ? $_POST['address'] : '';
                $City= isset($_POST['city']) ? $_POST['city'] : '';
                $Area= isset($_POST['area']) ? $_POST['area'] : '';
                $Phonenumber= isset($_POST['phone']) ? $_POST['phone'] : '';
                $imageName = !empty($_FILES["image"]['name']) ? $_FILES["image"]['name'] : $_POST['image_name'];

                if(!empty($_FILES["image"]['name'])){
                  $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
                  $imageType = $_FILES["image"]["type"];
                  move_uploaded_file($_FILES['image']['tmp_name'], '../customer_Images/'.$imageName);
                }
                  // check fields are empty
                if(empty($old_email)) {
                    echo  "<html><head><script>alert('Enter Email Please');</script></head><body></body>";
                    // header("Location:../settings.php");  
                  } 
            else{
             // Prepare statement
                  $dsn = "UPDATE customer SET
                  first_name='$Firstname',
                  last_name='$Lastname', 
                  password='$Password',
                  address='$Address',
                  phone='$Phonenumber',
                  image='$imageName'
                  WHERE email='$old_email'";
  
            // execute the query
            $success = $connect->exec($dsn);
          // echo a message to say the UPDATE succeeded
                if($success){
                    echo "<html><head><script>alert('Success');window.location='../settings.php';</script></head><body></body>";
                   
                  }else{
                    echo "<html><head><script>alert('Error');window.location='../settings.php';</script></head><body></body>";
                    
            }
        } 
            }
              
         
        ?>