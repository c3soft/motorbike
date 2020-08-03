<?php
require_once('conn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MotorBike</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <video class="video-ban" muted="muted" autoplay loop>
            <source src="img/videoMotor.mp4" type="video/mp4" />
        </video>
        <h1>MotorBike</h1>
        <div class="formmoto">
            <form id="formmoto" action="" method="post">
                <input class="motcle" type="text" name="motcle" id="motcle" placeholder="Recherche une marque..." autocomplete="off"/>
                <button class="btn-find" type="submit" name="btnsubmit">Rechercher</button>
            </form>
        </div>
    </header>
    <section class="articles">
        <?php
        if (isset($_POST['btnsubmit'])) {
            $mc = $_POST['motcle'];
            $reqSelect = "select * from motos where brand like '%$mc%'";
        } else {
            $reqSelect = "select * from motos";
        }
        
        $resultat = mysqli_query($connect, $reqSelect);
        $nbresult = mysqli_num_rows($resultat);
        echo "<p><span>".$nbresult."</span> article trouvé ...</p>";

        while ($ligne = mysqli_fetch_assoc($resultat)) { ?>

            <div class="moto">
                <img src="<?= $ligne['photo'] ?>" alt=""><br>
                <?= $ligne['brand'] ?><br>
                <?= $ligne['price'] ?><br>
                <?= $ligne['imm'] ?>

            </div>

        <?php  }; ?>


    </section>
</body>

</html>