<?php
    // Create database
    $sql = "CREATE DATABASE reli";
    if ($conn->query($sql) === TRUE) {
    echo "Baza je kreirana";
    } else {
    echo "Greska pri preiranju baze: " . $conn->error;
    }
?>