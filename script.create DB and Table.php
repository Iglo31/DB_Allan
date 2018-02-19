<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Hanorepair';


//Create connection without DB 
$conn = mysqli_connect($servername, $username, $password);
 
//Check connection 
if(!$conn)
{
    die("Connection failed: ". mysqli_connect_error(). "<br />");
}
echo "Successfuly connected!<br />";

//Create Database
$sql = "CREATE DATABASE Hanorepair";
if(mysqli_query($conn, $sql))
{
    echo "Successfully created DB: Hanorepair <br />";
}
else 
{
    echo "Couldn't create DB: ". mysqli_error($conn). "<br />";
}

//Create connection with DB
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if(!$conn)
{
    die("Connection failed: ". mysqli_connect_error(). "<br />");
}
echo "Successfuly connected!<br />";


//Create Table
$sql = "CREATE TABLE reparatur_preise (
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
    lopfhoererbuchse_kosten FLOAT(4,2),
    akku_kosten FLOAT(4,2),
    ladebuchse_kosten FLOAT(4,2),
    home_button_kosten FLOAT(4,2),
    power_button_kosten FLOAT(4,2),
    software_update_kosten FLOAT(4,2))";

if(mysqli_query($conn, $sql))
{
    echo "Successfully created Table: Reparatur Preise <br />";
}
else 
{
    echo "Couldn't create Table: ". mysqli_error($conn). "<br />";
}

//Close connection
mysqli_close($conn);
?>