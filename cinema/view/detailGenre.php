<?php
    $genres = $data["genres"];
    $films =$data["films"];
    
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=genre&method=allGenre"> Retour à la liste des genres </a>




<h1><?= $genres ?></h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>          
            <th>Année de sortie</th>
            
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($films as $film) { ?>
        <tr>
            <td><?= $film->getTitre() ?></td>
            <td><?= $film->getAnneeSortie()?></td>         
        </tr>
        <?php }
    ?>
    </tbody>
</table>

