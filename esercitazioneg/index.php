<?php
session_start();
$utenti = json_decode(file_get_contents("utente.json"), true);

if (isset($_POST['id'])) {
    $idInserito = ($_POST['id']);

    foreach ($utenti as $u) {
        if ($u['id'] === $idInserito) {
            $_SESSION['utente'] = $u;
            $_SESSION['carrelli'][$idInserito] = $_SESSION['carrelli'][$idInserito] ?? [];
            $_SESSION['carrello_time'][$idInserito] = time();
            header("Location: oggetti.php");
            exit;
        }
    }

    $errore = "ID utente non trovato!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form action="" method="post">
    <label>nome:</label>
    <input type="text" name="nome" required>
    <label>cognome:</label>
    <input type="text" name="cognome" required>
    <label>Password:</label>
    <input type="password" name="pass" required>
    <button type="submit">Accedi</button>
</form>

<?php if(isset($errore)) echo "<p style='color:red;'>$errore</p>"; ?>
</body>
</html>
