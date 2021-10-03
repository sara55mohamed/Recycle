<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");

$response = array();
$matrial_type = $_POST['matrial_type'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$exchange_matrial = $_POST['exchange_matrial'];
$customer_id = $_SESSION['customer_id'];

$sql = mysqli_query($con, "INSERT INTO request (`matrial_type`, `amount`, `date`, `exchange_matrial`, `customer_id`) 
VALUES ('$matrial_type', '$amount', '$date', '$exchange_matrial', '$customer_id')");

if ($sql) {
    $response['message'] ='request added successfully'; 
    echo json_encode($response);
}
else {
    $response['message'] ='failed to add request'; 
    echo json_encode($response);
}