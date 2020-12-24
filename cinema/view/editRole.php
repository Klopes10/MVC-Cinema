<?php

    $roles = $data["roles"];


?>
<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=role&method=allRoles"> Retour à la liste des roles </a>

<h2>Formulaire</h2>

<form action="?ctrl=role&method=editRoleOk&id=<?= $roles->getId()?>" method="POST">
          
    <p>
        <label for="nomrole">Nom du role &nbsp;: </label>
        <input class ="uk-input" type="text" name="nomrole" id="nomrole" value="<?=$roles->getNomRole()?>" required>
    </p>

    <p class="submit-row">
        <input type="submit" name="submit" value="Ajouter le role">
    </p>

</form>