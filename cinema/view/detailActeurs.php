<?php
    $acteur = $data["acteur"];
    $castings =$data["castings"];
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=acteur&method=allActeurs"> Retour à la liste des acteurs </a>

<h1><?= $acteur ?></h1>

<p>

Sexe: <?= $acteur->getSexeacteur() ?> <br>
Date de naissance: <?= $acteur->getDatenaiacteur() ?> <br>


</p>

<h2>Rôle</h2>

<table>
    <thead>
        <tr>
            <td>Nom</td>
            <td>Film</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($castings as $casting) {
            ?>
            <tr>
                <td><?= $casting->getRole()?></td>
                <td><?= $casting->getFilm()?></td>
            </tr>
        <?php }
        ?>

    </tbody>
</table>

