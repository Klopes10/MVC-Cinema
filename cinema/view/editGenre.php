<?php

    $genre = $data["genre"];

    
?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=genre&method=allGenre"> Retour à la liste des genres </a>

<h2>Formulaire</h2>

<form action="?ctrl=genre&method=editGenreOk&id=<?= $genre->getId()?>" method="POST">
          
    <p>
        <label for="libelle">Nom du genre&nbsp;: </label>
        <input class ="uk-input" type="text" name="libelle" id="libelle" value="<?=$genre->getLibelle()?>" required>
    </p>

    <p class="submit-row">
        <input type="submit" name="submit" value="Editer le genre">
    </p>

</form>