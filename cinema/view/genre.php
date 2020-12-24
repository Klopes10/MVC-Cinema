<?php

// affiche la liste des entreprises
    $genres = $data["genres"];
    //var_dump($films);
?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=genre&method=newGenre">Ajout d'un genre </a>

<table>
    <thead>
        <tr>
            <th>Genre</th>  
            <th>Actions</th>        

        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($genres as $genre) { ?>
        <tr>
            <td><a href="index.php?ctrl=genre&method=detailGenre&id=<?= $genre->getId()?>"><?= $genre ?></a></td>            
            <td>
                <a href="index.php?ctrl=genre&method=editGenre&id=<?= $genre->getId()?>"> editer </a>
                <a onclick ="return(confirm('Etes-vous sûr de vouloir supprimer ce genre ?'));"href="index.php?ctrl=genre&method=deleteGenre&id=<?= $genre->getId()?>"> supprimer </a>
            </td>
        </tr>
        <?php }
    ?>
    </tbody>
</table>