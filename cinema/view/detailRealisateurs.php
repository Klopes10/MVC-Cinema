<?php
    $realisateur = $data["realisateur"];
    $films =$data["films"];
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a><br>
<a href="index.php?ctrl=realisateur&method=allRealisateurs"> Retour à la liste des réalisateurs </a> 


<h1><?= $realisateur ?></h1>

<p>

Sexe: <?= $realisateur->getSexereal() ?> <br>
Date de naissance: <?= $realisateur->getDatenaireal() ?> <br>

</p>

<h2>Filmographie</h2>

<table>
<thead>
    <tr>
        <td> Film </td>
        <td>Année de sortie</td>
    </tr>
</thead>

<tbody>
    <?php
        foreach($films as $film) {
            ?>
            <tr>
                <td><?= $film->getTitre()?></td>
                <td><?= $film->getAnneeSortie()?></td>
            </tr>
        <?php }
        ?>


</tbody>
</table>
