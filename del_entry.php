<?php

if (isset($_POST["modell_delete"])) {
    $sql = "DELETE FROM $table_name WHERE handy_modell='" . $_POST["modell_delete"] . "';";
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'><div class='container'>
        <h3><strong> Löschung Erfolgreich </strong></h3>
        <p>Der Eintrag mit dem Modellnamen <strong>". $_POST["modell_delete"] .
        "</strong> konnte erfolgreich von der Datenbank <strong>gelöscht</strong> werden.</p></div></div>";
    } else {
        echo "<div class='alert alert-danger'><div class='container'>
        <h3><strong> Fehler </strong></h3>
        <p>Der Eintrag mit dem Modellnamen <strong>" . $_POST["modell_delete"] .
        "</strong> konnte <strong>nicht</strong> gelöscht werden.<br>
        Fehlerausgabe: " . mysqli_error($conn) . "</p></div></div>";
    }
}

?>