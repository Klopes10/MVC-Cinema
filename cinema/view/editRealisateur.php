<?php

    $realisateur = $data["realisateur"];

    
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=realisateur&method=allRealisateurs"> Retour à la liste des realisateurs </a>

<h2>Formulaire</h2>

<form action="?ctrl=realisateur&method=editRealisateurOk&id=<?= $realisateur->getId()?>" method="POST">
          
    <p>
        <label for="nomreal">Nom &nbsp;: </label>
        <input class ="uk-input" type="text" name="nomreal" id="nomreal" value="<?=$realisateur->getNomreal()?>" required>
    </p>
    <p>
        <label for="prenomreal"> Prenom &nbsp;: </label>
        <input class ="uk-input" type="text"  name="prenomreal" id="prenomreal" value="<?=$realisateur->getPrenomreal()?>" required>
    </p>
    <p>
        <label for="sexereal"> Sexe &nbsp;: </label>
        <input class ="uk-input" type="text" name="sexereal" id="sexereal"value="<?=$realisateur->getSexereal()?>" required>
    </p>  
    <p>
        <label for="datenaireal"> Date de Naissance &nbsp;: </label>
        <input class ="uk-input" type="date" name="datenaireal" id="datenaireal" value="<?=$realisateur->getDatenaireal()?>" required>
    </p> 

    <p class="submit-row">
        <input type="submit" name="submit" value="Editer le realisateur">
    </p>

</form>