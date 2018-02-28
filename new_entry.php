<?php

if (isset($_POST["new-" . $column_names[1]])){
    $sql = "INSERT INTO $table_name (";
    foreach ($column_names as $key => $value) {
        if ($key == 1) {
            $sql .= $value;
        } elseif ($key != 0) {
            $sql .= ", $value";
        }
    }
    $sql .= ") VALUES (";
    foreach ($column_names as $key => $value) {
        if ($key == 1) {
            $sql .= "'" . $_POST["new-" . $value] . "'";
        } elseif ($key != 0) {
            if ($_POST["new-" . $value] === "") {
                $sql .= ", NULL";
            } else {
                $sql .= ", '" . $_POST["new-" . $value] . "'";
            }
        }
    }
    $sql .= ");";
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'><div class='container'>
        <h3><strong>Erfolgreich hinzugefügt</strong></h3>
        <p><strong>". $_POST["new-" . $column_names[1]] .
        "</strong> konnte erfolgreich zur Datenbank <strong>hinzugefügt</strong> werden.</p></div></div>";
    } else {
        echo "<div class='alert alert-danger'><div class='container'>
        <h3><strong> Fehler </strong></h3>
        <p>Das Modell <strong>" . $_POST["new-" . $column_names[1]] .
        "</strong> konnte <strong>nicht</strong> zur Datenbank hinzugefügt werden.<br>
        Fehlerausgabe: " . mysqli_error($conn) . "</p></div></div>";
    }
}

?>