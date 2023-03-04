<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

$data =  json_decode(file_get_contents("php://input"), true);

$student_id = $data["sid"];

include "connection.php";

$result = mysqli_query($con,"DELETE FROM tlb_students WHERE id ={$student_id}")or die(mysqli_error($con));

if($result){

    
    echo json_encode(array('message' => 'Student Record Deleted.','status' => true));

}else{

    echo json_encode(array('message' => 'Student Record Not Deleted.','status' => false));

}
?>