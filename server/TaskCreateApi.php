<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$newTodo = $_GET['newTodo'];
$jsonTodoList = file_get_contents("ToDo.json", true);
$todoList = json_decode($jsonTodoList);
$todoList[] = [
    "id" => uniqid(),
    "text" => $newTodo,
    "completed" => false
];
$jsonTodoList = json_encode($todoList);
file_put_contents('ToDo.json', $jsonTodoList);
?>