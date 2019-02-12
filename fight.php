<?php

// Si la requête n'est pas bonne, je redirige l'utilisateur sur la selection en GET
if(!isset($_POST['team']) || substr_count($_POST['team'], ']') < 4 || !isset($_POST['level'])) {
  header('Location: index.php');
}

// Ici $_POST['team'] et $_POST['level'] est forcement présent et complet

include 'sql.php';
// On récup tout les autres joueurs non séléctionnés
$myteam = str_replace('[', '', $_POST['team']);
$myteam = str_replace(']', ',', $myteam);
$myteam = substr($myteam, 0, strlen($myteam) - 1);
$req = "SELECT * FROM joueurs WHERE idjoueur not in (".$myteam.")";
echo $req;
$res = mysqli_query($con, $req);



$test = array();
foreach ($res as $value) {
  array_push($test, $value);
}

// On recup 4 joueurs aléatoirement
$rand_player = array_rand($test, 4);
$level = 0;
foreach ($rand_player as $value) {
  $level += $test[$value]['niveaujoueur'];
}

if($level >= $_POST['level']) {
  header('Location: loose.php');
} else {
  header('Location: win.php');
}
