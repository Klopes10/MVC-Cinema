<?php

// affiche la liste des entreprises
    $films = $data["films"];
    //var_dump($films);
?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=film&method=newFilm">Ajout d'un film </a>

<table>
    <thead>
        <tr>
            <th>Titre</th>          
            <th>Annee de sortie</th>
            <th>Realisateur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($films as $film) { ?>
        <tr>
            <td><a href="index.php?ctrl=film&method=detailFilms&id=<?= $film->getId()?>"><?= $film ?></a></td>            
            <td><?= $film->getAnneesortie()?></td>
            <td><?= $film->getRealisateur()?></td>
            <td>
                <a href="index.php?ctrl=film&method=editFilm&id=<?= $film->getId()?>"> editer </a>
                <a onclick ="return(confirm('Etes-vous sûr de vouloir supprimer ce film ?'));"href="index.php?ctrl=film&method=deleteFilm&id=<?= $film->getId()?>"> supprimer </a>.
            </td>
        </tr>
        <?php }
    ?>
    </tbody>
</table>