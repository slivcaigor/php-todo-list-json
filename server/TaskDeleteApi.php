<?php
// indica che l'origine è autorizzata ad accedere a questa risorsa
header("Access-Control-Allow-Origin: http://localhost:5173");
// indica che l'intestazione "X-Requested-With" è accettata
header("Access-Control-Allow-Headers: X-Requested-With");
// indica che il tipo di contenuto della risposta è in formato JSON
header('Content-Type: application/json');
// recupera l'indice della task da eliminare dai parametri della richiesta
$index = $_GET['index'];

// leggi il contenuto del file ToDo.json
$jsonTodoList = file_get_contents("ToDo.json");
// decodifica il contenuto del file in un oggetto PHP
$data = json_decode($jsonTodoList, true);

// utilizza unset per eliminare la task corrispondente all'indice
unset($data[$index]);
$data = array_values($data);

// codifica nuovamente l'oggetto in formato json
$jsonTodoList = json_encode($data);
// sovrascrivi il file ToDo.json con i dati aggiornati
file_put_contents("ToDo.json", $jsonTodoList);
?>