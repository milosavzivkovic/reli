<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reli";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Greška pri konektovanju sa bazom podataka: " . $conn->connect_error);
    }
?>