<?php
    $organizatori="CREATE TABLE organizatori(
        idOrganizatora INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ime VARCHAR(30) NOT NULL,
        prezime VARCHAR(30) NOT NULL,
        korisnickoIme VARCHAR(50) NOT NULL,
        lozinka varchar(30) NOT NULL
    );";

    if ($conn->query($organizatori) === TRUE) {
        echo "Tabela organizatori je kreirana";
      } else {
        echo "Greska pri kreiranju: " . $conn->error;
      }

    $takmicari="CREATE TABLE takmicari(
        idTakmicara INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ime VARCHAR(30) NOT NULL,
        prezime VARCHAR(30) NOT NULL,
        korisnickoIme VARCHAR(50) NOT NULL,
        lozinka varchar(30) NOT NULL,
        brojGodina INT NOT NULL,
        automobil VARCHAR(60) NOT NULL,
        jacinaMotora INT NOT NULL
    );";

    if ($conn->query($takmicari) === TRUE) {
        echo "Tabela takmicari je kreirana";
    } else {
        echo "Greska pri kreiranju: " . $conn->error;
    }

    $trke="CREATE TABLE trke(
        idTrke INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        drzava VARCHAR(30) NOT NULL,
        datum DATE NOT NULL,
        organizator VARCHAR(30) REFERENCES organizatori(ime)
    );";

    if ($conn->query($trke) === TRUE) {
        echo "Tabela trke je kreirana";
    } else {
        echo "Greska pri kreiranju: " . $conn->error;
    }

    $prijave="CREATE TABLE prijave(
        idPrijave INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        drzava VARCHAR(30) REFERENCES trke(drzava),
        datumOdrzavanja DATE REFERENCES trke(datum) ,
        takmicar VARCHAR(30) REFERENCES takmicari(ime)
    );";

    if ($conn->query($prijave) === TRUE) {
        echo "Tabela prijave je kreirana";
    } else {
        echo "Greska pri kreiranju: " . $conn->error;
    }
?>