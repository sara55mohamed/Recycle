<?php
// header("Access-Control-Allow-Origin : *");
// header("Access-Control-Allow-Credentials" : true);

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");
$response = array();
$id = $_GET['id'];
if ($con){
    $sql = "select * from request where customer_id = '$id'";
    $result = mysqli_query($con, $sql);
    header('Content-Type: application/json');
    if ($result){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['matrial_type'] = $row['matrial_type'];
            $response[$i]['amount'] = $row['amount'];
            $response[$i]['date'] = $row['date'];
            $response[$i]['exchange_matrial'] = $row['exchange_matrial'];
            $response[$i]['customer_id'] = $row['customer_id'];

            $i++;
        }
        if($response){
            echo json_encode($response);
        }
        else{
            $response['error'] ='no requests found for this user'; 
            echo json_encode($response);
        }
    }
}
else {
    echo json_encode(['error'=>'database connection failed']);
}