<?php



header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
	
var_dump($_POST);
// $file = "data.json";

// $index = $_POST;
// // echo var_dump($newTask);
// // prova a cambiare il completed true/false qua da string a boolean 

// $dataStr = file_get_contents($file);
// $data = json_decode($dataStr);

// echo "<pre>";
// echo var_dump($index);
// echo "</pre>";
// if($data[$index]->completed === "true"){
//     $data[$index]->completed = "false";
// }
// else{
//     $data[$index]->completed = "true";
// }
// $encData = json_encode($data);

// file_put_contents($file, $encData);

// echo $encData;
