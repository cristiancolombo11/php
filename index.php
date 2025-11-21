<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idInserito = $_POST['user_id'];

    $utenti = json_decode(file_get_contents("utente.json"), true);

    foreach ($utenti as $u) {
        if ($u['id'] == $idInserito) {
            $_SESSION['utente'] = $u;
            $_SESSION['carrello'] = $_SESSION['carrello'] ?? [];
            header("Location: oggetti.php");
            exit;
        }
    }

    $errore = "ID utente non valido";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="stile.css">
</head>
<body>
<h2>Login Utente</h2>

<form method="POST">
    <label>ID Utente:</label>
    <input type="number" name="user_id" required>
    <button type="submit">Entra</button>
</form>

<?php if (!empty($errore)) echo "<p style='color:red'>$errore</p>"; ?>
</body>
</html>