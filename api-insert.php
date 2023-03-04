<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

$data =  json_decode(file_get_contents("php://input"), true);

$student_name = $data["sname"];
$student_age = $data["sage"];
$student_city = $data["scity"];
include "connection.php";

$result = mysqli_query($con,"INSERT INTO tlb_students(students_name, age, city) VALUES ('{$student_name}','{$student_age}','{$student_city}')")or die(mysqli_error($con));

if($result){

    
    echo json_encode(array('message' => 'Student Record Inserted.','status' => true));

}else{

    echo json_encode(array('message' => 'Student Record Not Inserted.','status' => false));

}
?>