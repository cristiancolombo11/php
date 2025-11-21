<?php
session_start();
if (!isset($_SESSION['utente'])) {
    header("Location: index.php");
    exit;
}

$oggetti = json_decode(file_get_contents("oggetti.json"), true);

// Aggiunta al carrello
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);
    $_SESSION['carrello'][] = $id;
    header("Location: oggetti.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="stile.css">
</head>
<body>

<h2>Benvenuto, <?php echo $_SESSION['utente']['nome']; ?></h2>

<p><a href="carrello.php">Mostra carrello</a> | <a href="logout.php">Logout</a></p>

<h3>Lista oggetti</h3>

<ul>
<?php foreach ($oggetti as $o): ?>
    <li>
        <?php echo $o['nome']; ?>
        <a href="?add=<?php echo $o['id']; ?>">[Aggiungi]</a>
    </li>
<?php endforeach; ?>
</ul>

</body>
</html>
