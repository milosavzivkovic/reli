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
    <title>Ulogujte se</title>
</head>
<body>
    <?php
        include '../database/konekcija.php';
        $_SESSION["pr"]=$_GET["n"];
        $greskaUser=$greskaLozinka=$greska="";
        if(isset($_POST["submit"]))
        {
            $korisnik=$lozinka="";
            $korisnik = $_POST["korisnicko"];
            $lozinka=$_POST["lozinka"];
            $provera=0;
            if($_SESSION["pr"]==1)
            $sql = "SELECT ime, prezime, korisnickoIme,lozinka FROM organizatori";
            else if($_SESSION["pr"]==2)
            $sql = "SELECT ime, prezime, korisnickoIme,lozinka FROM takmicari";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["korisnickoIme"]==$korisnik && $row["lozinka"]==$lozinka)
                    {
                        $_SESSION["ime"]="";
                        $_SESSION["prezime"]="";
                        $greska="";
                        $_SESSION["ime"] = $row["ime"];
                        $_SESSION["prezime"] = $row["prezime"];
                        $provera=1;
                        break;
                    }
                    else
                    {
                        $provera=0;
                        $greska="Nevažeći podaci";
                    }
                }
            } else {
                echo "0 results";
            }
            if($provera==1)
            header("Location: /reli/index.php");
            $conn->close();
        }
    ?>
    <?php include '../komponente/nav.php' ?>
    <br><br>
    <h2 class="text-center reg">ULOGUJTE SE</h2>
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
     <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?n=" . $_GET["n"]; ?>" method="post">

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Korisničko ime</label>
                <input type="email" id="form3Example3" class="form-control" name="korisnicko" placeholder="email" />
                
              </div>

              <!-- Šifra input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Lozinka</label>
                <input type="password" id="form3Example4" class="form-control" name="lozinka" ><br><span class="greska"><?php echo $greska; ?></span>
               
              </div>


              <!-- Uloguj se button -->
             
              <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Uloguj se">
              </button>

              
            </form>
          </div>
        </div>
      </div>


            </div>
        </div>

    <?php
        include '../komponente/footer.php';
    ?>
</body>
</html>