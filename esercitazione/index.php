<?php
session_start();
$utenti = json_decode(file_get_contents("utente.json"), true);

if (isset($_POST['id'])) {
    $idInserito = intval($_POST['id']);

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
    <label>ID utente:</label>
    <input type="number" name="id" required>
    <button type="submit">Accedi</button>
</form>

<?php if(isset($errore)) echo "<p style='color:red;'>$errore</p>"; ?>
</body>
</html>
