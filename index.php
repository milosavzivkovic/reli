<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Reli</title>
</head>
<body>
    <?php
        include 'komponente/nav.php';
        include 'database/konekcija.php';
        $sql = "SELECT * FROM trke ORDER BY datum ASC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '  <div class="container" style="padding-top:20px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card card-margin">
                                    <div class="card-header no-border">
                                        <h5 class="card-title">Zakazane trke</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-primary">
                                                    <span class="widget-49-date-day">'. $row['idTrke'] . '</span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title">Datum održavanja</span>
                                                    <span class="widget-49-meeting-time">' . $row['datum'] . '</span>
                                                </div>
                                            </div>
                                            <ul class="widget-49-meeting-points">
                                                <li class="widget-49-meeting-item"><span>Država u kojoj se organizuje: ' . $row['drzava'] . '</span></li>
                                                <li class="widget-49-meeting-item"><span>Organizator: ' . $row['organizator'] . '</li>
                                            </ul>
                                            <div class="widget-49-meeting-action">
                                                <a href="pages/prijavaNaTrku.php?id=' . $row["idTrke"] . '" class="btn btn-sm btn-flash-border-primary">Prijavite se!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    ?>
 

    <?php
        include 'komponente/footer.php';
    ?>
</body>
</html>