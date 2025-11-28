<?php
/** 
 * controllo : esiste il file 
 * creo i dati ricevuti in imput
 * salvare i dati
 * leggo il contenuto del file
 * aggiungere informazione 
 * salvare l'informazione nel file
 */
$nomefile = "utente.json";

if (!file_exists($nomefile)) {
    die("errore del sistema");// die fa terminare il programma
} else {
$nome = $_POST['nome'];
if (empty($nome)) {
    die("Errore: campo nome vuoto");
}
$cognome = $_POST['cognome'];
if (empty($cognome)) {
    die("Errore: campo cognome vuoto");
}
$pass = $_POST['pass'];
if (empty($pass)) {
    die("Errore: campo password vuoto");
}
$id = uniqid() ."";
$utente = [
    'id' => $id,
    'nome' => $nome,
    'cognome' => $cognome,
    'pass' => $pass
];
// Leggi e decodifica il file JSON per ottenere gli utenti esistenti
$json = file_get_contents($nomefile);
$users = json_decode($json, true) ?: [];
$logins = array_column($users, 'id'); // ottiene solo gli username
if (in_array($id, $logins, true)) {
    die('Errore: id già presente.');
}

    $users[] = $utente;
    //TRASFORMO L'ARRAY ASSOCIATIVO IN JSON
    $json = json_encode($users, JSON_PRETTY_PRINT);
    //SALVO LA STRINGA SU FILE
    file_put_contents($nomefile, $json, LOCK_EX);
    echo "Utente salvato correttamente";
}
header("Location: index.php");
?>
<?php
