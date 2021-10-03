<?php

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");

$response = array();
$id = $_POST['id'];

$sql = mysqli_query($con, "DELETE FROM request WHERE id = '$id'");

if ($sql) {
    $response['message'] ='request deleted successfully'; 
    echo json_encode($response);
}
else {
    $response['message'] ='failed to delete request'; 
    echo json_encode($response);
}