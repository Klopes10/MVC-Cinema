<?php

// affiche la liste des entreprises
    $acteurs = $data["acteurs"];
   
?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=acteur&method=newActeur">Ajout d'un acteur </a>

<table>
    <thead>
        <tr>
            <th>ACTEUR</th>
            <th>DATE DE NAISSANCE</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($acteurs as $acteur) { ?>
        <tr>
            <td><a href="index.php?ctrl=acteur&method=detailActeurs&id=<?= $acteur->getId()?>"><?= $acteur ?></a></td>            
            <td><?= $acteur->getDatenaiacteur()?></td>
            <td>
                <a href="index.php?ctrl=acteur&method=editActeur&id=<?= $acteur->getId()?>"> editer </a>
                <a onclick ="return(confirm('Etes-vous sûr de vouloir supprimer cet acteur ?'));"href="index.php?ctrl=acteur&method=deleteActeur&id=<?= $acteur->getId()?>"> supprimer </a>
            </td>
        </tr>
        <?php }
    ?>
    </tbody>
</table>