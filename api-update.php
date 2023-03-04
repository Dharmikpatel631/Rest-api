<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

$data =  json_decode(file_get_contents("php://input"), true);

$student_id = $data["sid"];
$student_name = $data["sname"];
$student_age = $data["sage"];
$student_city = $data["scity"];
include "connection.php";

$result = mysqli_query($con,"UPDATE tlb_students SET students_name='{$student_name}',age='{$student_age}',city='{$student_city}' WHERE id ={$student_id}")or die(mysqli_error($con));

if($result){

    
    echo json_encode(array('message' => 'Student Record Updated.','status' => true));

}else{

    echo json_encode(array('message' => 'Student Record Not Updated.','status' => false));

}
?>