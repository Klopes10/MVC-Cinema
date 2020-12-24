<?php

// affiche la liste des castings
    $castings = $data["castings"];
  
    
   
?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a>

<table>
    <thead>
        <tr>
            
            <th>Casting</th>
            <th>Role</th>
            <th>Film</th>

        </tr>
    </thead>
    <tbody>
    <?php    
        foreach ($castings as $casting) { ?>
        <tr>
            <td><?= $casting->getActeur() ?> </td>
            <td><?= $casting->getRole() ?></td> 
            <td><?= $casting->getFilm() ?></td>             

        </tr>
        <?php }
    ?>
    </tbody>
</table>