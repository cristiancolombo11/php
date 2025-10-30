<?php
/** 
 * controllo : esiste il file 
 * creo i dati ricevuti in imput
 * salvare i dati
 * leggo il contenuto del file
 * aggiungere informazione 
 * salvare l'informazione nel file
 */
$nomefile = "dati.json";


if (!file_exists($nomefile)) {
    die("errore del sistema");// die fa terminare il programma
} else {
    $utente = [
        "login" => "paolo",
        "password" => "ciao123"
];
//leggere il file
    $json = file_get_contents($nomefile);
    //trasformare in un array  associativo
    $dati = json_decode($json, true);
    
     //aggiungere un nuovo utente
    $dati[]= $utente;
   
    file_put_contents($nomefile, json_encode($utente)); // prende 
    
    
    

    //TRASFORMO L'ARRAY ASSOCIATIVO IN JSON
    $json = json_encode($dati, JSON_PRETTY_PRINT);

    //SALVO LA STRINGA SU FILE
    file_put_contents($nomefile, $json);
}


?>