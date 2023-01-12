<?php
// indica che l'origine "http://localhost:5173" è autorizzata ad accedere a questa risorsa
header("Access-Control-Allow-Origin: http://localhost:5173");
// indica che l'intestazione "X-Requested-With" è accettata
header("Access-Control-Allow-Headers: X-Requested-With");
//  indica che il tipo di contenuto della risposta è in formato JSON
header('Content-Type: application/json');
// assegna il valore del parametro "newTodo" della richiesta GET alla variabile $newTodo
$newTodo = $_GET['newTodo'];
// la funzione "file_get_contents" legge il contenuto del file "ToDo.json" e lo assegna alla variabile $jsonTodoList
$jsonTodoList = file_get_contents("ToDo.json", true);
// la funzione "json_decode" decodifica il contenuto del file "ToDo.json" in un oggetto PHP e lo assegna alla variabile $todoList
$todoList = json_decode($jsonTodoList);
// aggiunge un nuovo elemento all'array $todoList
$todoList[] = [
    // assegna il valore della variabile $newTodo alla proprietà "text" dell'elemento appena creato
    "text" => $newTodo,
    // questa riga assegna il valore false alla proprietà "completed" dell'elemento appena creato
    "completed" => false
];
// la funzione "json_encode" codifica l'array $todoList in formato JSON e lo assegna alla variabile $jsonTodoList
$jsonTodoList = json_encode($todoList);
//  la funzione "file_put_contents" scrive il contenuto della variabile $jsonTodoList nel file "ToDo.json", aggiornando cosi il file con i nuovi dati
file_put_contents('ToDo.json', $jsonTodoList);