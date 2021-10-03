<?php
// header("Access-Control-Allow-Origin : *");
// header("Access-Control-Allow-Credentials" : true);

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");

$response = array();
$old_email = $_POST['email'];
$new_email = $_POST['new_email'];
$Firstname = $_POST['first_name'];
$Lastname = $_POST['last_name'];
$Password = $_POST['password'];
$Address = $_POST['address'];
$City = $_POST['city'];
$Area = $_POST['area'];
$Phonenumber = $_POST['phone'];
$imageData = $_FILES["image"]["tmp_name"];
$image = $_FILES['image']['name'];
$dir = "customer_Images/" . $image;
move_uploaded_file($imageData, $dir);

$sql = mysqli_query($con, "UPDATE customer SET email='$new_email', first_name='$Firstname', last_name='$Lastname', 
password='$Password', address='$Address' , city='$City', area='$Area' , phone='$Phonenumber',
image='$image' WHERE email='$old_email'");

if ($sql) {
    $response['message'] ='data updated successfully'; 
    echo json_encode($response);
}
else {
    $response['message'] ='failed to update your data'; 
    echo json_encode($response);
}