<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=film&method=allFilms"> Retour à la liste des films</a> <br>
<?php
    $realisateurs= $data["realisateurs"];
    //$genres = $data["genres"];
    $film = $data["film"];
   
   
    
?>

<h2>Formulaire</h2>

<form action="?ctrl=film&method=editFilmOk<?=$film->getId()?>" method="POST"> 
          
    <p>
        <label for="titre">Nom du film &nbsp;: </label>
        <input class ="uk-input" type="text" name="titre" id="titre" value="<?=$film->getTitre()?>" required>
    </p>
    <p>
        <label for="anneesortie"> Année de sortie &nbsp;: </label>
        <input class ="uk-input" type="number" min= 0 name="anneesortie" id="anneesortie" value="<?=$film->getAnneeSortie()?>" required>
    </p>
    <p>
        <label for="duree"> Durée &nbsp;: </label>
        <input class ="uk-input" type="number" name="duree" min= 0  id="duree" value="<?= $film->getDuree()?>" required>
    </p>  
    <p>
        <label for="synopsis"> Synopsis &nbsp;: </label>
        <textarea class ="uk-textarea" name="synopsis" id="synopsis" required cols="30" rows="10" value="<?= $film->getSynopsis() ?>"></textarea>
    </p>    
    <p>
        <label for="note"> Note &nbsp;: </label>
        <input class ="uk-input" type="number" min= 0 max= 5 name="note" id="note" value ="<?= $film->getNote()?>" required>
    </p>    
    <p>
        <label for="affiche"> Affiche &nbsp;: </label>
        <input class ="uk-input" type="url" name="affiche" id="affiche" value = "<?= $film->getAffiche() ?>" required>
    </p>

    <p>
        <label for="realisateurs">Réalisateur &nbsp;:</label>
        <select class="uk-select" name="realisateurs" id="realisateurs">
        <?php
            foreach($realisateurs as $realisateur){
                $selected = ($film->getRealisateur()->getId() == $realisateur->getId()) ?"selected": "";           // ternaire, compare si l'id de réal du film modifié = au réalisateur courant dans la liste 
                ?>
                <option value ="<?= $realisateur->getId() ?>" <?= $selected ?>><?= $realisateur ?> </option>
            <?php }
            ?>
        </select>
    </p>

    <!--<p><label for="genres">Genre</label>
        <select class="uk-select" name="genres" id="genres" multiple>
            <?php
            foreach($genres as $genre) { ?>
                <option value="<? $genre->getId() ?>"><?= $genre ?></option>
            <?php }
            ?>
        </select>
    </p>-->

    <p class="submit-row">
        <input type="submit" name="submit" value="Editer le film">
    </p>

</form>