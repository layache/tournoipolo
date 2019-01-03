

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
              <link rel="stylesheet" type="text/css" href="style.css">
        <title> Tournoi de Polo </title>
    </head>
    <body>
        <?php
        include 'sql.php';
        $req = " SELECT * FROM joueurs";
        $res = mysqli_query($con, $req);
        ?>

        <h1> Polo </h1>
        <h2> Choisir quatres joueurs pour votre équipe </h2>
        <p> Vous avez un crédit de 20 points </p>

        <?php
            if(isset($_POST['idjoueur'])) {
                $listPlayer = explode(';', $_POST['idjoueur']);
                foreach($player as $listPlayer) {
                    echo 'Vous avez choisi '.$player;
                }
            }
        ?>


        <?php
            while ($ligne = mysqli_fetch_array($res)) {
        ?>
            <form action="" method="POST">
                <input type="hidden" name="idjoueur" value="<?php echo (isset($_POST['idjoueur']) ?$_POST['idjoueur'].';' : '').$ligne["idjoueur"]; ?>" />
                <div class="joueurs">
                    <p> Nom: <?php echo $ligne["nomjoueur"]; ?>  </p>
                    <p> Prénom:  <?php echo $ligne["prenomjoueur"]; ?> </p>
                    <p> Niveau: <?php echo $ligne["niveaujoueur"]; ?>  </p>
                    <input type="submit" value="Choisir">
                </div>
            </form>
        <?php
            }
        ?>




    </body>
</html>
