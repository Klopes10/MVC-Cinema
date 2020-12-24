<?php

// affiche la liste des entreprises
    $realisateurs = $data["realisateurs"];
    
  
   
?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=realisateur&method=newRealisateur">Ajout d'un réalisateur </a>

<table>
    <thead>
        <tr>
            <th>REALISATEUR</th>
            <th>DATE DE NAISSANCE</th>
            <th>ACTIONS</th>
            
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($realisateurs as $realisateur) { ?>
        <tr>
            <td><a href="index.php?ctrl=realisateur&method=detailRealisateurs&id=<?= $realisateur->getId()?>"><?= $realisateur?></a></td>
            <td><?= $realisateur->getDatenaireal()?></td>
            <td>
                <a href="index.php?ctrl=realisateur&method=editRealisateur&id=<?= $realisateur->getId()?>"> editer </a>
                <a onclick ="return(confirm('Etes-vous sûr de vouloir supprimer ce realisateur ?'));"href="index.php?ctrl=realisateur&method=deleteRealisateur&id=<?= $realisateur->getId()?>"> supprimer </a>
            </td>
        </tr>
        <?php }
    ?>
    </tbody>
</table>