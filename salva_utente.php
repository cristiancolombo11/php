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
$login = $_GET['login'];
if (empty($login)) {
    die("Errore: campo login vuoto");
}
$pass = $_GET['pass'];
if (empty($pass)) {
    die("Errore: campo password vuoto");
}
$utente = [
    'login' => $login,
    'pass' => $pass
];
// Leggi e decodifica il file JSON per ottenere gli utenti esistenti
$json = file_get_contents($nomefile);
$users = json_decode($json, true) ?: [];
 $logins = array_column($users, 'login'); // ottiene solo gli username
if (in_array($login, $logins, true)) {
    die('Errore: login già presente.');
}

    $users[] = $utente;
    //TRASFORMO L'ARRAY ASSOCIATIVO IN JSON
    $json = json_encode($users, JSON_PRETTY_PRINT);
    //SALVO LA STRINGA SU FILE
    file_put_contents($nomefile, $json, LOCK_EX);
    echo "Utente salvato correttamente";
}
?>

