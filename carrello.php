<?php
session_start();
if (!isset($_SESSION['utente'])) {
    header("Location: index.php");
    exit;
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
</head>
<body>

<h2>Carrello di <?php echo $_SESSION['utente']['nome'] . " " . $_SESSION['utente']['cognome']; ?></h2>

<p><a href="oggetti.php">Torna agli oggetti</a> | <a href="logout.php">Logout</a></p>

<h3>Oggetti nel carrello:</h3>

<ul>
<?php
if (empty($_SESSION['carrello'])) {
    echo "<p>Nessun oggetto nel carrello</p>";
} else {
    foreach ($_SESSION['carrello'] as $id) {
        echo "<li>" . $oggettiById[$id] . "</li>";
    }
}
?>
</ul>

</body>
</html>
