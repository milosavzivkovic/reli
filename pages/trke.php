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
    <link rel="stylesheet" href="/reli/css/style.css">
    <title>Organizujte trku</title>
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
        $greskaDatum=$greskaDrzava="";
        $danas=date("Y-m-d");
        if(isset($_POST["submit"]))
        {
            $drzava=$datum="";
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if (empty($_POST["drzava"])) 
                {
                    $greskaDrzava = "Morate uneti državu u kojoj će se održati trka";
                }
                else
                {
                    $greskaDrzava = "";
                    $drzava = test_input($_POST["drzava"]);
                    $br++;
                }
                if(empty($_POST["datum"]))
                {
                    $greskaDatum="Morate uneti datum održavanje trke";
                }
                else
                {
                    $datum=$_POST["datum"];
                    if($datum<=$danas)
                    $greskaDatum="Nevažeći datum";
                    else{
                        $greskaDatum="";
                        $br++;
                    }
                }
            }
        }
    ?>
    <?php include '../komponente/nav.php' ?>
    <br><br>



    <h2 class="text-center reg">ORGANIZUJ TRKU</h2>
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
     <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
          <!-- Država input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Država u kojoj se organizuje</label>
                <input type="text" id="form3Example3" class="form-control" name="drzava"><span class="greska"><?php echo $greskaDrzava; ?></span><br><br>

            </div>

              <!--Datum input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Datum trke</label>
                <input type="date" id="form3Example4" class="form-control" name="datum"><span class="greska"><?php echo $greskaDatum; ?></span><br><br>

            </div>

             
              <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Organizuj">


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
        if($br==2)
        {
            $organizator=$_SESSION["ime"];
            $sql = "INSERT INTO trke (drzava, datum, organizator)
                VALUES ('$drzava','$datum','$organizator')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Organizovali ste trku')</script>";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            $conn->close();
        }
    ?>
</body>
</html>