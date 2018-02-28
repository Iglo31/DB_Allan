<?php

/* Creates the database and the table with its desired structure. */

require_once "db_meta.php";

$conn = mysqli_connect($servername, $username, $password);
if(!$conn) {
    die("Connection failed: ". mysqli_connect_error(). "<br />");
}

$sql = "CREATE DATABASE $db_name;";
if(mysqli_query($conn, $sql)) {

    echo "Successfully created DB: $db_name <br />";

    mysqli_query($conn, "USE $db_name;");

    $sql = "CREATE TABLE $table_name (
        aenderungsdatum TIMESTAMP,
        handy_modell VARCHAR(100) NOT NULL PRIMARY KEY,
        analyse_kosten FLOAT(4,2) DEFAULT 0,
        displayschaden_glas_kosten FLOAT(4,2),
        displayschaden_lcd_touch_kosten FLOAT(4,2),
        gehaeuse_austausch_kosten FLOAT(4,2),
        wasserschadenbehandlung_kosten FLOAT(4,2),
        lautsprecher_kosten FLOAT(4,2),
        mikrofon_kosten FLOAT(4,2),
        hoermuschel_kosten FLOAT(4,2),
        hauptkamera_kosten FLOAT(4,2),
        vorderkamera_kosten FLOAT(4,2),
        kopfhoererbuchse_kosten FLOAT(4,2),
        akku_kosten FLOAT(4,2),
        ladebuchse_kosten FLOAT(4,2),
        home_button_kosten FLOAT(4,2),
        power_button_kosten FLOAT(4,2),
        software_update_kosten FLOAT(4,2))";
    
    if(mysqli_query($conn, $sql)) {
        echo "Successfully created Table: $table_name <br />";
    }
    else {
        echo "Couldn't create Table: ". mysqli_error($conn). "<br />";
    }
}
else {
    echo "Couldn't create DB: ". mysqli_error($conn). "<br />";
}

mysqli_close($conn);
?>