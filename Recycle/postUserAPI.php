<?php

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");

$response = array();
$Firstname = $_POST['first_name'];
$Lastname = $_POST['last_name'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$Address = $_POST['address'];
$City = $_POST['city'];
$Area = $_POST['area'];
$Phonenumber = $_POST['phone'];
$imageData = $_FILES["image"]["tmp_name"];
$image = $_FILES['image']['name'];
$dir = "customer_Images/" . $image;
move_uploaded_file($imageData, $dir);

$sql = mysqli_query($con, "INSERT INTO customer (`first_name`, `last_name`, `email`, `password`, 
`address`, `city`, `area`, `phone`, `image`) VALUES ('$Firstname', '$Lastname', '$Email', '$Password', 
'$Address', '$City', '$Area', '$Phonenumber', '$image')");

if ($sql) {
    $response['message'] ='register is success'; 
    echo json_encode($response);
}
else {
    $response['message'] ='failed to register'; 
    echo json_encode($response);
}