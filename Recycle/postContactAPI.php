<?php

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");

$response = array();
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$help = $_POST['help'];

$sql = mysqli_query($con, "INSERT INTO connectus (`name`, `email`, `company`, `phone`, `help`) 
VALUES ('$name', '$email', '$company', '$phone', '$help')");

if ($sql) {
    $response['message'] ='message sent successfully'; 
    echo json_encode($response);
}
else {
    $response['message'] ='failed to send message'; 
    echo json_encode($response);
}