<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<!-- Display table -->
<table border="1">
    <tr>
        <th>Ändern / Löschen</th>
        <th>Änderungs-Datum</th>
        <th>Modell</th>
        <th>Analyse</th>
        <th>Display-Glas</th>
        <th>Display-LCD</th>
        <th>Gehäuse</th>
        <th>Wasserschaden</th>
        <th>Lautsprecher</th>
        <th>Mikrofon</th>
        <th>Hörmuschel</th>
        <th>Hauptkamera</th>
        <th>Vorderkamera</th>
        <th>Kopfhörerbuchse</th>
        <th>Akku</th>
        <th>Ladebuchse</th>
        <th>Home-Button</th>
        <th>Power-Button</th>
        <th>Software</th>
    </tr>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Hanorepair';

//Create and check connection DB
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
    die("Es konnte keine Verbindung zum Datenbankserver aufgenommen werden: " . mysqli_connect_error() . "<br />");
}


//Get data vom DB and display as table
$sql = "SELECT * FROM reparatur_preise;";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $keys = array_keys($row);
    echo "<tr>";
    echo "<td>BUTTON-BILD-DELETE&nbsp";
    echo "BUTTON-BILD-EDIT</td>";
    for($i = 0; $i < count($keys); $i++) {
        echo "<td>" . $row[$keys[$i]] . "</td>";        
    }
}
echo "</table>";



//Check if row was selected to be deleted and if so delete selected row
if(isset($_POST["modell_delete"])) {
    $sql = "DELETE FROM reparatur_preise WHERE modell = '" . $_POST["modell_delete"] . "';";
    mysqli_query($conn, $sql);
}



//Check if row was selected to be edited and if so create environment to edit row
if(isset($_POST["modell_edit"])) {
    ?>    
    
    <p>Ändern von <?php echo $_POST["modell_edit"] ?> </p>
    <table>
        <tr>
            <td>Modell</td>
            <td>Analyse</td>
            <td>Display-Glas</td>
            <td>Display-LCD</td>
            <td>Gehäuse</td>
            <td>Wasserschaden</td>
            <td>Lautsprecher</td>
            <td>Mikrofon</td>
            <td>Hörmuschel</td>
            <td>Hauptkamera</td>
            <td>Vorderkamera</td>
            <td>Kopfhörerbuchse</td>
            <td>Akku</td>
            <td>Ladebuchse</td>
            <td>Home-Button</td>
            <td>Power-Button</td>
            <td>Software</td>
        </tr>
    <?php 
   
   //To get database name of collumns
   $sql1 = "SELECT `COLUMN_NAME` 
            FROM `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE `TABLE_SCHEMA`='hanorepair' 
            AND `TABLE_NAME`='reparatur_preise';";
    $result1 = mysqli_query($conn, $sql1);
    //Move pointer to discard first result, because we only need the other results
    mysqli_fetch_assoc($result1);

    //To get values of current row from database
    $sql2 = "SELECT * FROM reparatur_preise WHERE modell = '" . $_POST["modell_edit"] . "';";
    $result2 = mysqli_query($conn, $sql2);
    $col2 = mysqli_fetch_assoc($result2);
    $keys = array_keys($col2);
    $i = 1;
    $ii = 0;
    echo "<form action='datenbank-index.php' method='POST'> <tr>";
    while($col1 = mysqli_fetch_assoc($result1)) {
        $colname[$ii] = $col1["COLUMN_NAME"];
        echo "<td> <input type='text' name='colname$ii' value='" . $col2[$keys[$i]] . "'> </td>";
        $i++;
        $ii++;
    }
    echo "</tr></table>";
    echo "<input type='submit' name='submitted'> </form>";
    
}




//Check if row was edited and if so override row in database
if(isset($_POST["submitted"])) {
    $sql = "UPDATE reparatur_preise";
    $ii = 0;
    echo $colnametest;
    for($ii = 0; $ii < count($colname); $ii++) {
        $sql .= " SET $colname[$ii] = " . $_POST["colname$ii"] . " WHERE ";
        echo "<br />" . $colname[$ii] . "&nbsp" . $_POST["colname$ii"];
        $ii++;

    }
}

?>





<!-- Specify which row to delete or edit -->
<form action="datenbank-index.php" method="POST">
    <input type="hidden" name="modell_delete" value="">
    <input type="text" name="modell_edit" value="new">
</form>


<?php 
mysqli_close($conn);
?>
</body>
</html>