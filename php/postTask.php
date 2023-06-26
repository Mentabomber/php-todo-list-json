<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
	
$file = "data.json";

$newTask = $_POST;


// prova a cambiare il completed true/false qua da string a boolean 

$dataStr = file_get_contents($file);
$data = json_decode($dataStr);

$newTask['completed'] = false;
// echo var_dump($newTask['completed']);
// cambio il 'false' da stringa a booleano false dato che le task sono sempre non completate all inizio quindi false
$data[] = $newTask;

$encData = json_encode($data);

file_put_contents($file, $encData);

echo $encData;