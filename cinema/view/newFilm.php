<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=film&method=allFilms"> Retour à la liste des films</a> <br>
<?php
    $realisateurs= $data["realisateurs"];
    $genres = $data["genres"];

    
?>

<h2>Formulaire</h2>

<form action="?ctrl=film&method=addFilm" method="POST">
          
    <p>
        <label for="titre">Nom du film &nbsp;: </label>
        <input class ="uk-input" type="text" name="titre" id="titre" required>
    </p>
    <p>
        <label for="anneesortie"> Année de sortie &nbsp;: </label>
        <input class ="uk-input" type="number" min= 0 name="anneesortie" id="anneesortie" required>
    </p>
    <p>
        <label for="duree"> Durée &nbsp;: </label>
        <input class ="uk-input" type="number" name="duree" min= 0  id="duree" required>
    </p>  
    <p>
        <label for="synopsis"> Synopsis &nbsp;: </label>
        <textarea class ="uk-textarea" name="synopsis" id="synopsis" required cols="30" rows="10"></textarea>
    </p>    
    <p>
        <label for="note"> Note &nbsp;: </label>
        <input class ="uk-input" type="number" min= 0 max= 5 name="note" id="note" required>
    </p>    
    <p>
        <label for="affiche"> Affiche &nbsp;: </label>
        <input class ="uk-input" type="url" name="affiche" id="affiche" required>
    </p>

    <p>
        <label for="realisateurs">Réalisateur &nbsp;:</label>
        <select class="uk-select" name="realisateurs" id="realisateurs">
        <?php
            foreach($realisateurs as $realisateur){ ?>
                <option value ="<?= $realisateur->getId() ?>"><?= $realisateur ?> </option>
            <?php }
            ?>
        </select>
    </p>

    <p><label for="genres">Genre</label>
        <select class="uk-select" name="genres" id="genres" multiple>
            <?php
            foreach($genres as $genre) { ?>
                <option value="<? $genre->getId() ?>"><?= $genre ?></option>
            <?php }
            ?>
        </select>
    </p>

    <p class="submit-row">
        <input type="submit" name="submit" value="Ajouter le film">
    </p>

</form>