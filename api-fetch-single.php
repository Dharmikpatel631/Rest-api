<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data =  json_decode(file_get_contents("php://input"), true);

$student_id = $data["sid"];

include "connection.php";

$result = mysqli_query($con,"SELECT * FROM tlb_students where id={$student_id}")or die(mysqli_error($con));

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);

}else{

    echo json_encode(array('message' => 'No Record Found','status' => false));

}
?>