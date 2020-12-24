<?php

// affiche la liste des entreprises
    $roles = $data["roles"];
?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=role&method=newRole">Ajout d'un role </a><br>
<a href="index.php?ctrl=role&method=newCasting">Ajout d'un casting </a>

<table>
    <thead>
        <tr>
            <th>Role</th>
            <th>Actions</th>
           
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($roles as $role) { ?>
        <tr>
            <td><a href="index.php?ctrl=role&method=detailAllActeursByRoles&id=<?= $role->getId()?>"><?= $role?></a></td>
            <td> 
            <a href="index.php?ctrl=role&method=editRole&id=<?= $role->getId()?>"> editer </a>
            <a onclick ="return(confirm('Etes-vous sûr de vouloir supprimer ce role ?'));"href="index.php?ctrl=role&method=deleteRole&id=<?= $role->getId()?>"> supprimer </a>
        </td>
        </tr>
        <?php }
    ?>
    </tbody>
</table>