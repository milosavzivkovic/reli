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
    <title>Registracija takmičara</title>
</head>
<body>
    <?php
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $br=0;
        $greskaUser=$greskaLozinka=$greskaIme=$greskaPrezime=$greskaGod=$greskaAuto=$greskaMotor="";
        if(isset($_POST["submit"]))
        {
            $korisnik=$lozinka=$ime=$prezime=$god=$auto=$motor="";
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if (empty($_POST["user"])) 
                {
                    $greskaUser = "Korisnicko ime je obavezno";
                } 
                else if (!filter_var($_POST["user"], FILTER_VALIDATE_EMAIL))
                {
                    $greskaUser = "Korisnicko ime nije u dobrom formatu";
                }
                else
                {
                    $greskaUser = "";
                    $korisnik = test_input($_POST["user"]);
                    $br++;
                }
                if (empty($_POST["lozinka"])) 
                {
                    $greskaLozinka = "Lozinka je obavezna";
                }
                else
                {
                    $greskaLozinka = "";
                    $lozinka=test_input($_POST["lozinka"]);
                    $br++;
                }
                if(empty($_POST["ime"]))
                    $greskaIme="Ime je obavezno";
                else
                {
                    $greskaIme="";
                    $ime=test_input($_POST["ime"]);
                    $br++;
                }
                if(empty($_POST["prezime"]))
                    $greskaPrezime="Prezime je obavezno";
                else
                {
                    $greskaPrezime="";
                    $prezime=test_input($_POST["prezime"]);
                    $br++;
                }
                if(empty($_POST["god"]))
                    $greskaGod="Morate uneti broj godina";
                else
                {
                    $greskaGod="";
                    $god=test_input($_POST["god"]);
                    $br++;
                }
                if(empty($_POST["auto"]))
                    $greskaAuto="Morate uneti koji automobil vozite";
                else
                {
                    $greskaAuto="";
                    $auto=test_input($_POST["auto"]);
                    $br++;
                }
                if(empty($_POST["motor"]))
                    $greskaMotor="Morate uneti jačinu motora";
                else
                {
                    $greskaMotor="";
                    $motor=test_input($_POST["motor"]);
                    $br++;
                }
            }
        }

    ?>
    <?php include '../komponente/nav.php' ?>
    <br><br>





    <h2 class="text-center reg">REGISTRUJTE SE</h2>
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
     <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
          <!-- Ime input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Ime</label>
                <input type="text" id="form3Example3" class="form-control" name="ime"><span class="greska"><?php echo $greskaIme; ?></span>
 
            </div>

              <!-- Prezime input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Prezime</label>
                <input type="text" id="form3Example4" class="form-control" name="prezime"><span class="greska"><?php echo $greskaPrezime; ?></span>
              
            </div>

              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Korisničko ime</label>
                <input type="text" id="form3Example4" class="form-control" name="user"><span class="greska"><?php echo $greskaUser; ?></span>
            </div>
            <!-- Lozinka input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Lozinka</label>
                <input type="password" id="form3Example4" class="form-control" name="lozinka" ><span class="greska"><?php echo $greskaLozinka; ?></span>

            </div>
              
             <!-- Broj godina lozinka input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Broj godina</label>
                <input type="number" id="form3Example4" class="form-control" name="god" ><span class="greska"><?php echo $greskaGod; ?></span>
            </div>

            
            <!-- Automobil input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Automobil</label>
                <input type="text" id="form3Example4" class="form-control"  name="auto" ><span class="greska"><?php echo $greskaAuto; ?></span>
            </div>
            <!-- Jačina motora lozinka input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Jačina motora(KS):</label>
                <input type="number" id="form3Example4" class="form-control" name="motor" ><span class="greska"><?php echo $greskaMotor; ?></span>
            </div>
              <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Registrujte se">


            </form>
          </div>
        </div>
      </div>
    </div>
</div>

    <?php
        include '../komponente/footer.php';
    ?>
    <?php
        include '../database/konekcija.php';
        if($br==7)
        {
            $sql = "INSERT INTO takmicari (ime, prezime, korisnickoIme,lozinka, brojGodina, automobil, jacinaMotora)
                VALUES ('$ime','$prezime','$korisnik','$lozinka', '$god', '$auto','$motor')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Registrovali ste se')</script>";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            $conn->close();
        }
    ?>
</body>
</html>
