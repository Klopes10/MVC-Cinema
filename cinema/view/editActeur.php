<?php

    $acteur = $data["acteur"];

?>

<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=acteur&method=allActeurs"> Retour à la liste des acteurs</a> <br>

<h2>Formulaire</h2>

<form action="?ctrl=acteur&method=editActeurOk&id=<?= $acteur->getId()?>" method="POST">
          
    <p>
        <label for="nomacteur">Nom  &nbsp;: </label>
        <input class ="uk-input" type="text" name="nomacteur" id="nomacteur" value="<?=$acteur->getNomacteur()?>"required>
    </p>
    <p>
        <label for="prenomacteur"> Prenom &nbsp;: </label>
        <input class ="uk-input" type="text"  name="prenomacteur" id="prenomacteur" value="<?=$acteur->getPrenomacteur()?>"required>
    </p>
    <p>
        <label for="sexeacteur"> Sexe &nbsp;: </label>
        <input class ="uk-input" type="text" name="sexeacteur" id="sexeacteur" value="<?=$acteur->getSexeacteur()?>"required>
    </p>  
    <p>
        <label for="datenaiacteur"> Date de Naissance &nbsp;: </label>
        <input class ="uk-input" type="date" name="datenaiacteur" id="datenaiacteur"value="<?=$acteur->getDatenaiacteur()?>" required>
    </p>    
   
    <p class="submit-row">
        <input type="submit" name="submit" value="Editer l'acteur">
    </p>

</form>