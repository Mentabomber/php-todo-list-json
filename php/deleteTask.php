<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
	
$file = "data.json";

$index = $_POST['index'];

$tasksStr = file_get_contents($file);
$tasks = json_decode($tasksStr);

array_splice($tasks, $index, 1);

$tasksStr = json_encode($tasks);

file_put_contents($file, $tasksStr);
echo $tasksStr;
// foreach ($data as $key => $newTask) {
    
//     // var_dump($data[$key]);
//     if ($newTask === $data[$key]) {
        
//     }
// }

// $data[] = $newTask;

// $encData = json_encode($data);

// file_put_contents($file, $encData);

// echo $encData;


// $index = $_POST;
// echo json_encode($index);
// array_splice($students, $index, 1);
// echo json_encode($students);