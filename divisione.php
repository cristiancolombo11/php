<?php
function divisione($numero1, $numero2){
    if ($numero2 == 0) {
        return "Errore: Divisione per zero non consentita.";
    }
    return $numero1 / $numero2;
}
?>
