

<?php
  include 'sql.php';
  $req = " SELECT * FROM joueurs";
  $res = mysqli_query($con, $req);
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Tournoi de Polo </title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1> Polo </h1>
        </div>
      </div>


      <?php
        if(isset($_POST['idselect']) && strlen($_POST['idselect']) > 0) {
      ?>
        <div class="row justify-content-center">
          <div class="col-12">
            Votre selection :
          </div>

          <?php
          $level = 0;
          foreach ($res as $ligne)  {
            $idjoueur = $ligne["idjoueur"];
            // Ici je vais exclure les joueurs déjà selectionnés
            $pos = strpos($_POST['idselect'], '['.$idjoueur.']');
            if($pos !== false) {
              $nomjoueur = $ligne["nomjoueur"];
              $prenomjoueur = $ligne["prenomjoueur"];
              $niveaujoueur = $ligne["niveaujoueur"];
              $level += $niveaujoueur;
              $reset = str_replace('['.$idjoueur.']', '', $_POST['idselect']);
          ?>
            <div class="col-3 joueurs mt-4 ml-4">
              <p> Nom: <?php echo $nomjoueur; ?>  </p>
              <p> Prénom:  <?php echo $prenomjoueur; ?> </p>
              <p> Niveau: <?php echo $niveaujoueur; ?>  </p>
              <form method="POST" action="index">
                <input type="hidden" name="idselect" value="<?php echo $reset ?>" />
                <input type="submit" class="btn btn-danger" value="Enlever">
              </form>
            </div>
          <?php
              }
            }
          ?>

        </div>

        <?php if(substr_count($_POST['idselect'], ']') >= 4) { ?>
          <div class="row">
            <div class="col-12 text-center mt-4">
              <form method="POST" action="fight.php">
                <input type="hidden" name="team" value="<?php echo $_POST['idselect'] ?>" />
                <input type="hidden" name="level" value="<?php echo $level ?>" />
                <input type="submit" value="Demarer le combat !" class="btn btn-warning" />
              </form>
            </div>
          </div>
        <?php } ?>

      <?php
        }
      ?>
      <div class="row">
        <div class="col-12 h2">
          Choisir quatres joueurs pour votre équipe
        </div>
        <div class="col-12">
          Vous avez un crédit de 20 points
        </div>
      </div>

      <div class="row justify-content-center">



      <?php
         foreach ($res as $ligne)  {
          $idjoueur = $ligne["idjoueur"];
          $nomjoueur = $ligne["nomjoueur"];
          $prenomjoueur = $ligne["prenomjoueur"];
          $niveaujoueur = $ligne["niveaujoueur"];
          $select = '['.$idjoueur.']';
          $full = false;
          if(isset($_POST['idselect'])) {

            // Ici je vais exclure les joueurs déjà selectionnés
            $pos = strpos($_POST['idselect'], '['.$idjoueur.']');
            if($pos !== false) {
              continue;
            }

            if(substr_count($_POST['idselect'], ']') >= 4) {
              $full = true;
            }

            // Si le joueur n'est pas séléctionner, je continue mon process d'affchage
            $select .= $_POST['idselect'];
          }
      ?>

      <div class="col-3 joueurs mt-4 ml-4">
        <p> Nom: <?php echo $nomjoueur; ?>  </p>
        <p> Prénom:  <?php echo $prenomjoueur; ?> </p>
        <p> Niveau: <?php echo $niveaujoueur; ?>  </p>
        <?php  if(!$full) { ?>
          <form method="POST" action="index">
            <input type="hidden" name="idselect" value="<?php  echo $select ?>" />
            <input type="submit" class="btn btn-success" value="Choisir">
          </form>
        <?php } ?>
      </div>

      <?php
        }
      ?>
      </div>
    </div>
  </body>
</html>
