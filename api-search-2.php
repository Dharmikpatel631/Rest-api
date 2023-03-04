<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// $data =  json_decode(file_get_contents("php://input"), true);

// $student_search = $data["search"];

$student_search = isset($_GET['search']) ? $_GET['search'] : die();

include "connection.php";

$result = mysqli_query($con,"SELECT * FROM tlb_students where students_name LIKE '%{$student_search}%'")or die(mysqli_error($con));

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);

}else{

    echo json_encode(array('message' => 'No Search Found','status' => false));

}
?>