<?php

include '../src/Map.php';
include '../src/User.php';
include '../src/MapRepository.php';
include '../src/UserRepository.php';
include '../src/Factory/DbAdaperFactory.php';

$dbAdaper = (new DbAdaperFactory())->createService();
$mapRepository = new \Map\MapRepository($dbAdaper);
$userRepository = new \User\UserRepository($dbAdaper);
$users = $userRepository->fetchAll();
$maps = $mapRepository->fetchAll();

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

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Projet Web Ensiie 2020</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == True) echo("Welcome " .$_SESSION['username']);
    else echo("You can log in by clicking the Play button");
?>

</br>
<button type="button" id="playbutton" onclick=" document.getElementById('hide').style.display='block';">Jouer</button> 
<form method="POST" style="display:none" id="hide" action="/Login.php">
  <label for="name">Pseudo:</label>
  <input type="text" id="name" name="nom_utilisateur">
  <br>
  <label for="mdp">Mot de passe :</label>
  <input type="password" id="mdp" name="mdp_utilisateur">
  <br>
  <button type="submit"> Se connecter</button>
  <p id="hide" style="display:none">No account ? Signup now ! </p>
  <button type="button" onclick=" document.getElementById('hide2').style.display='block';document.getElementById('hide').style.display='none';">Créer un  compte</button> 
</form>
<form method="POST" style="display:none" id="hide2" action="/Signup.php">
  <label for="name">Pseudo:</label>
  <input type="text" id="name" name="nom_utilisateur">
  <br>
  <label for="mdp">Mail :</label>
  <input type="text" id="mail" name="mail_utilisateur">
  <br>
  <label for="mdp">Mot de passe :</label>
  <input type="password" id="mdp" name="mdp_utilisateur">
  <br>
  <button type="submit"> S'inscrire</button>
</form>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Map List</h1>
        </div>
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>meteo</th>
                    <th>terrain</th>
                    <th>mdj</th>
                </tr>
                <?php foreach($maps as $map): ?>
                    <tr>
                        <td><?= $map->getId() ?></td>
                        <td><?= $map->getMeteo() ?></td>
                        <td><?= $map->getTerrain() ?></td>
                        <td><?= $map->getMdj() ?></td>
                        <td>
                            <form method="POST" action="createMap.php">
                                <input name="mapMeteo" type="hidden" value="<?= $map->getMeteo() ?>">
                                <input name="mapTerrain" type="hidden" value="<?= $map->getTerrain() ?>">
                                <input name="mapMdj" type="hidden" value="<?= $map->getMdj() ?>">
                                <button type="submit">Create</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="deleteMap.php">
                                <input name="mapId" type="hidden" value="<?= $map->getId() ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-sm-12">
            <h1>User List</h1>
        </div>
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>password</th>
                    <th>created_at</th>
                </tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->getId() ?></td>
                        <td><?= $user->getUsername() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getCreatedAt()->format(\DateTime::ATOM) ?></td>
                        <td>
                            <form method="POST" action="createUser.php">
                                <input name="user_username" type="hidden" value="<?= $user->getUsername() ?>">
                                <input name="user_pwd" type="hidden" value="<?= $user->getEmail() ?>">
                                <input name="user_created_at" type="hidden" value="<?= $user->getCreatedAt()->format(\DateTime::ATOM) ?>">
                                <button type="submit">Create</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="deleteUser.php">
                                <input name="user_id" type="hidden" value="<?= $user->getId() ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<script src="scripts.js"></script>
</body>
</html>
