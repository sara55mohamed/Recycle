<?php
// header("Access-Control-Allow-Origin : *");
// header("Access-Control-Allow-Credentials" : true);

$con = mysqli_connect("remotemysql.com", "jRj0e5PdkS", "kjjgBKPnyw", "jRj0e5PdkS");$response = array();
if ($con){
    $sql = "select * from request";
    $result = mysqli_query($con, $sql);
    if ($result){
        header("Content-Type: JSON");
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
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
else {
    echo "database connection failed";
}