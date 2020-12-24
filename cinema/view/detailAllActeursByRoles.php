<?php
    $castings = $data["castings"];
    $roles = $data["roles"];
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=role&method=allRoles"> Retour à la liste des roles </a>


<h1><?= $roles ?></h1>

<table>
    <thead>
        <tr>
            <th>Acteur</th>          
            <th>Date de Naissance</th>
            <th>Film</th>
            <th>Année de sortie</th>
            
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($castings as $casting) { ?>
        <tr>
            <td><?= $casting->getActeur() ?></td>            
            <td><?= $casting->getActeur()->getDatenaiacteur()?></td>
            <td><?= $casting->getFilm() ?></td>
            <td><?= $casting->getFilm()->getAnneeSortie()?></td>
          
        </tr>
        <?php }
    ?>
    </tbody>
</table>
