<?php
    include '../database/konekcija.php';
    session_start();
    session_unset();
    session_destroy();
    header("Location: /reli/index.php");
?>