<?php

    $film = $data["film"];          
    $castings = $data["castings"];
    $genres = $data["genres"]
  
    
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=film&method=allFilms"> Retour à la liste des films</a> <br>



<h1><?= $film?></h1>        

<p>  

    Affiche: <img src=" <?= $film->getAffiche()?>"> <br>
    Année de sortie: <?= $film->getAnneeSortie() ?> <br>
    Durée : <?= $film->getDuree() ?> <br>
    Note : <?= $film->getNote() ?> <br> 
    Genre : <?php 
                foreach($genres as $genre) {
                    echo $genre." ";
                }  ?> <br>
    Realisateur: <?= $film->getRealisateur() ?> <br>
    Synopsis : <?= $film->getSynopsis() ?> <br>

</p>

<h2>Casting</h2>

<table>
<thead>
    <tr>
        <td> Acteur </td>
        <td> Role </td>
    </tr>
</thead>

<tbody>
    <?php
        foreach($castings as $casting) {
            ?>
            <tr>
                <td><?= $casting->getActeur()?></td>
                <td><?= $casting->getRole()?></td>
            </tr>
        <?php }
        ?>


</tbody>
</table>

