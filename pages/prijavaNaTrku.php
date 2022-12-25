<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Prijavite se na trku</title>
</head>
<body>
    <?php include '../komponente/nav.php' ?>
    <br>
    <?php
        include '../database/konekcija.php';
        $id=$_GET["id"];
        $sql2 = "SELECT * FROM trke";
            $result = $conn->query($sql2);
            while ($row = $result->fetch_assoc()) {
                if($id==$row["idTrke"])
                {
                    $drzava=$row['drzava'];
                    $datum= $row['datum'];
                }
            }
        $sql = "SELECT * FROM prijave";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if($datum==$row["datumOdrzavanja"] && $drzava==$row["drzava"])
            {
                echo '
                    <div class="container">
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
                                                    <span class="widget-49-date-day">'. $row['idPrijave'] . '</span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title">Datum održavanja</span>
                                                    <span class="widget-49-meeting-time">' . $row['datumOdrzavanja'] . '</span>
                                                </div>
                                            </div>
                                            <ul class="widget-49-meeting-points">
                                                <li class="widget-49-meeting-item"><span>Država u kojoj se organizuje: ' . $row['drzava'] . '</span></li>
                                                <li class="widget-49-meeting-item"><span>Takmičar: ' . $row['takmicar'] . '</li>
                                            </ul>
                                            <div id="prijavaTrka" class="widget-49-meeting-action">
                                                <form method="post">
                                                    <input name="prijavaTrka" type="submit" class="btn btn-primary" value="Prijavi se na trku">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
    ?>
    <?php
        $provera=0;
        if(isset($_POST["prijavaTrka"]))
        {
            if(isset($_SESSION["pr"]))
            {
                
                if($_SESSION["pr"]==2)
                {
                    $ime=$_SESSION["ime"];
                    $sql4 = "SELECT * FROM prijave";
                    $result = $conn->query($sql4);
                    while ($row = $result->fetch_assoc()) {
                        if($ime==$row['takmicar'] && $datum==$row['datumOdrzavanja'])
                        {
                            $provera=1;
                        }
                    }
                    if($provera==1)
                    echo "<script>alert('Već ste prijavljeni')</script>";
                    else
                    {
                        $sql1 = "INSERT INTO prijave (drzava, datumOdrzavanja, takmicar)
                        VALUES ('$drzava','$datum','$ime')";
                        if ($conn->query($sql1) === TRUE) {
                        echo "<script>alert('Prijavilil ste se na trku')</script>";
                        } else {
                        echo "Error: " . $sql1 . "<br>" . $conn->error;
                        }
                    }
                }
                else{
                    echo "<script>alert('Morate biti ulogovani kao takmičar')</script>";
                }
            }
            else{
                echo "<script>alert('Morate se ulogovati')</script>";
            }
            $conn->close();
        }
        include '../komponente/footer.php';
    ?>
</body>
</html>