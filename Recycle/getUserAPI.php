<?php
// header("Access-Control-Allow-Origin : *");
// header("Access-Control-Allow-Credentials" : true);

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");
$response = array();
$id = $_GET['id'];
if ($con){
    $sql = "select * from customer where id = '$id'";
    $result = mysqli_query($con, $sql);
    header('Content-Type: application/json');
    if ($result){
        $i = 0;
        if($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['first_name'] = $row['first_name'];
            $response[$i]['last_name'] = $row['last_name'];
            $response[$i]['email'] = $row['email'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['address'] = $row['address'];
            $response[$i]['city'] = $row['city'];
            $response[$i]['area'] = $row['area'];
            $response[$i]['phone'] = $row['phone'];
            $response[$i]['image'] = $row['image'];

            echo json_encode($response);
        }else{
            $response['error'] ='user not found'; 
            echo json_encode($response);
        }
    }
}
else {
    echo json_encode(['error'=>'database connection failed']);
}