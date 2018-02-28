<?php
require_once "db_meta.php";

$conn = mysqli_connect($servername, $username, $password, $db_name);
if(!$conn) {
	die("Es konnte keine Verbindung zum Datenbankserver aufgenommen werden: " . mysqli_connect_error() . "<br />");
}

$render_column_names = array(
	"Änderungs-Datum",
	"Modell",
	"Analyse",
	"Display-Glas",
	"Display-LCD",
	"Gehäuse",
	"Wasserschaden",
	"Lautsprecher",
	"Mikrofon",
	"Hörmuschel",
	"Hauptkamera",
	"Vorderkamera",
	"Kopfhörerbuchse",
	"Akku",
	"Ladebuchse",
	"Home-Button",
	"Power-Button",
	"Software"
);


$column_names = array();
    $result = mysqli_query($conn, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name';");
    while ($array = mysqli_fetch_assoc($result)) {
        foreach ($array as $value) {
            array_push($column_names, $value);
        }								
    }

?>