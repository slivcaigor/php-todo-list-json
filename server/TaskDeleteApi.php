<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$id = $_GET['id'];
$jsonTodoList = file_get_contents("ToDo.json");
$data = json_decode($jsonTodoList, true);
foreach ($data as $key => $task) {
    if ($task['id'] == $id) {
        unset($data[$key]);
        break;
    }
}
$jsonTodoList = json_encode($data);
file_put_contents("ToDo.json", $jsonTodoList);
?>