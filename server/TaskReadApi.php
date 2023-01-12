<?php
// indica che l'origine "http://localhost:5173" è autorizzata ad accedere a questa risorsa
header("Access-Control-Allow-Origin: http://localhost:5173");
// indica che l'intestazione "X-Requested-With" è accettata
header("Access-Control-Allow-Headers: X-Requested-With");
//  indica che il tipo di contenuto della risposta è in formato JSON
header('Content-Type: application/json');
// la funzione "file_get_contents" legge il contenuto del file "ToDo.json" e lo assegna alla variabile $jsonTodoList
$jsonTodoList = file_get_contents("ToDo.json", true);
// la funzione "echo" stampa il contenuto della variabile $jsonTodoList, quindi l'elenco dei to-do in formato JSON, come risposta alla richiesta GET
echo $jsonTodoList;