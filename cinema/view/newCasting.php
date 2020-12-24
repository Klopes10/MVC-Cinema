<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=role&method=allRoles"> Retour à la liste des roles</a> <br>

<?php
    $films= $data["films"];
    $roles = $data["roles"];
    $acteurs = $data["acteurs"];
    
?>
<h2>FORMULAIRE </h2>

<form action="?ctrl=role&method=addCasting" method="POST">
<p>
    <label for="films"> Film &nbsp;:</label>
    <select class="uk-select" name="films" id="films">
    <?php
        foreach($films as $film){ ?>
            <option value ="<?= $film->getId() ?>"><?= $film?> </option>
        <?php }
        ?>
    </select>
</p>

<p>
    <label for="acteurs"> Acteurs &nbsp;:</label>
    <select class="uk-select" name="acteurs" id="acteurs">
    <?php
        foreach($acteurs as $acteur){ ?>
            <option value ="<?= $acteur->getId() ?>"><?= $acteur ?> </option>
        <?php }
        ?>
    </select>
</p>

<p>
    <label for="roles"> Roles &nbsp;:</label>
    <select class="uk-select" name="roles" id="roles">
    <?php
        foreach($roles as $role){ ?>
            <option value ="<?= $role->getId() ?>"><?= $role ?> </option>
        <?php }
        ?>
    </select>
</p>

<p class="submit-row">
        <input type="submit" name="submit" value="Ajouter le casting">
</p>


</form>