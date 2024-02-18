<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "test"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}


$sql_create_table = "CREATE TABLE IF NOT EXISTS benutzer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vorname VARCHAR(50) NOT NULL,
    nachname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwort VARCHAR(255) NOT NULL,
    erstellt_am TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabelle 'benutzer' erfolgreich erstellt oder bereits vorhanden.<br>";
} else {
    echo "Fehler beim Erstellen der Tabelle: " . $conn->error;
}


$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$passwort = $_POST['passwort'];


$sql_insert_data = "INSERT INTO benutzer (vorname, nachname, email, passwort) VALUES ('$vorname', '$nachname', '$email', '$passwort')";


if ($conn->query($sql_insert_data) === TRUE) {
    echo "Registrierung erfolgreich!<br>";
} else {
    echo "Fehler beim Registrieren: " . $conn->error;
}


$conn->close();
?>
