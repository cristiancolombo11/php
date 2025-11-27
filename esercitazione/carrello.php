<?php
//if (isset($_SESSION)){
    session_set_cookie_params(10);
//}

session_start();

if (!isset($_SESSION['utente'])) {
    header("Location: index.php");
    exit;
}

$idUtente = $_SESSION['utente']['id'];

$_SESSION['carrelli'][$idUtente] = $_SESSION['carrelli'][$idUtente] ?? [];
$_SESSION['carrello_time'][$idUtente] = $_SESSION['carrello_time'][$idUtente] ?? time();


if (time() - $_SESSION['carrello_time'][$idUtente] > 10) {
    $_SESSION['carrelli'][$idUtente] = [];
    $_SESSION['carrello_time'][$idUtente] = time();
}

$oggetti = json_decode(file_get_contents("oggetti.json"), true);
$oggettiById = [];
foreach ($oggetti as $o) {
    $oggettiById[$o['id']] = $o['nome'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stile.css">
    <title>Carrello</title>
</head>
<body>

<h2>Carrello di <?php echo $_SESSION['utente']['nome'] . " " . $_SESSION['utente']['cognome']; ?></h2>

<p><a href="oggetti.php">Torna agli oggetti</a> | <a href="index.php">Logout</a></p>

<h3>Oggetti nel carrello:</h3>
<ul>
<?php
if (empty($_SESSION['carrelli'][$idUtente])) {
    echo "<p>Nessun oggetto nel carrello</p>";
} else {
    foreach ($_SESSION['carrelli'][$idUtente] as $id) {
        echo "<li>" . $oggettiById[$id] . "</li>";
    }
}
?>
</ul>

</body>
</html>
