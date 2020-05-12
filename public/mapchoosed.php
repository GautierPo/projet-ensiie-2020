<?php

include '../src/Utilisateur.php';
include '../src/Map.php';
include '../src/MapRepository.php';
include '../src/UtilisateurRepository.php';
include '../src/Factory/DbAdaperFactory.php';

$dbAdaper = (new DbAdaperFactory())->createService();
$utilisateurRepository = new \Utilisateur\UtilisateurRepository($dbAdaper);
$mapRepository = new \Map\MapRepository($dbAdaper);
$utilisateurs = $utilisateurRepository->fetchAll();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>La Ligue des Deglingos</title>
    <meta name="description" content="Projet web Ensiie">
    <meta name="author" content="Theau FERNANDEZ / Quentin JURY / Gabriel Meziere">
    <link rel="stylesheet" href="style.css?v=1.0">
</head>

<body>

<div class="endgame">
    <?php $mapchoisie = $mapRepository->getChoosedMap();
        $votedMap =  "images/map" . $mapchoisie . ".jpg" ;?>
    <div class="image">
        <img src=<?= $votedMap ?>>
    </div>
    <?php $nb_votes = $mapRepository->getVoteMap($mapchoisie); ?>
    <p>Map Choisie avec <?php echo($nb_votes); ?> votes !</p>
    <form action="/gameend.php">
        <button class="gamebutton">Commencer la partie</button>
    </form>
</div>

</body>
</html>