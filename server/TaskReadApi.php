<?php
// indica che l'origine "http://localhost:5173" è autorizzata ad accedere a questa risorsa
header("Access-Control-Allow-Origin: http://localhost:5173");
// indica che l'intestazione "X-Requested-With" è accettata
header("Access-Control-Allow-Headers: X-Requested-With");
//  indica che il tipo di contenuto della risposta è in formato JSON
header('Content-Type: application/json');