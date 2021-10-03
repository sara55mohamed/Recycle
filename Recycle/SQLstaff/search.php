<?php
        // Create connection
           require("connect.php");
          // $output = '';
        if(isset($_POST['email'])){
            $Email=$_POST['email'];
            $getStaff = "SELECT * FROM staff WHERE email LIKE '%$Email%'";
            $getStaffDetails = $connect->prepare($getStaff);
            $getStaffDetails -> execute();
            $found = false;
        while ($row= $getStaffDetails->fetch(PDO::FETCH_ASSOC)) {
            # code...
            $found = true;
            $Firstname=$row['first_name'];
			$Lastname=$row['last_name'];
			$Email=$row['email'];
			$Password=$row['password'];
			$Gender=$row['gender'];
            $Position=$row['position'];
            $Role=$row['role'];
            $Salary=$row['salary'];
            
            echo'<tr role="row">
            <th class="sorting">'.$Firstname.''.$Lastname.'</th>
             <th class="sorting">'.$Email.'</th>
             <th class="sorting">'.$Password.'</th>
             <th class="sorting">'.$Gender.'</th>
             <th class="sorting">'.$Position.'</th>
             <th class="sorting">'.$Role.'</th>
             <th class="sorting">'.$Salary.'</th>
          </tr>'; 
        }

        if($found==false){
            echo "<html><head><script>alert('Not found');
            window.location='../worker.php';</script></head><body></body>";
            
        }
    }
     ?>
     </tbody>
      </table>
            </div>
         </div>
        </div>
    </body>
</html>