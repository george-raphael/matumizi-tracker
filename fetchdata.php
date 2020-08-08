<?php
$host = '127.0.0.1';
$db_name = 'matumizi_tracker';
$username = 'root';
$password ='';
//connect to the database
$con = mysqli_connect($host,$username,$password,$db_name);
//prepare the query
//Select the data in the database
$query = "SELECT * FROM matumizi ORDER BY id desc";
$result = mysqli_query($con,$query);
//convert the data to json
$data = [];
while($row = mysqli_fetch_assoc($result)){
    array_push($data,$row);
}

//return the data 
echo json_encode($data);