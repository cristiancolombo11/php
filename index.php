<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stile.css">
    </head>
<body>
<div class="container">
<h2>Calcolatrice</h2>

<form action="" method="post">
  <label for="numero1">numero:</label><br>
  <input type="number" id="numero1" name="numero1" value="" required><br>
  <input type="button" value="+">
  <input type="button" value="-">
  <input type="button" value="*">
  <input type="button" value="/">
  <input type="submit" value="=">
</form> 
<div class="risultato">
<?php
     $risultato = "";  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["numero1"]) && isset($_POST["operatore"])) {    
        include 'somma.php';
        include 'sottrazione.php';
        include 'moltiplicazione.php';
        include 'divisione.php';


    $numero1 = $_POST["numero1"];
    $risultato = $_POST["risultato"];
    $operatore = $_POST["operatore"];
    switch ($operatore) {
    case 'somma':
        $risultato = somma($numero1,$risultato);
        break;
    case 'sottrazione':
        $risultato = sottrazione($numero1, $risultato);
        break;
    case 'moltiplicazione':
        $risultato = moltiplicazione($numero1, $risultato);
        break;
    case 'divisione':
        $risultato = divisione($numero1, $risultato);
        break;
    default:
        $risultato = "Operatore non valido";
}}}

echo "<h3>Risultato: $risultato</h3>";
?>
 
</div>
</body>
</html>
