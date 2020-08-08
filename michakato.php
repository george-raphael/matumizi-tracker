<?php
$_POST = json_decode(file_get_contents("php://input"),true);
$kiasi = $_POST['kiasi'];
$description = $_POST['description'];

$host = '127.0.0.1';
$db_name = 'matumizi_tracker';
$username = 'root';
$password ='';
//connect to the database
$con = mysqli_connect($host,$username,$password,$db_name);
//prepare the query
$query = "INSERT INTO matumizi VALUES('',$kiasi,'$description')";
//Run the query to add the data to the database
mysqli_query($con,$query);

//Select the data in the database
$query = "SELECT * FROM matumizi";
$result = mysqli_query($con,$query);
//convert the data to json
$data = [];
while($row = mysqli_fetch_assoc($result)){
    array_push($data,$row);
}

//return the data 
echo json_encode($data);
