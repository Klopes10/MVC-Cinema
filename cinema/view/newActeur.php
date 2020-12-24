<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=acteur&method=allActeurs"> Retour à la liste des acteurs</a> <br>

<h2>Formulaire</h2>

<form action="?ctrl=acteur&method=addActeur" method="POST">
          
    <p>
        <label for="nomacteur">Nom  &nbsp;: </label>
        <input class ="uk-input" type="text" name="nomacteur" id="nomacteur" required>
    </p>
    <p>
        <label for="prenomacteur"> Prenom &nbsp;: </label>
        <input class ="uk-input" type="text"  name="prenomacteur" id="prenomacteur" required>
    </p>
    <p>
        <label for="sexeacteur"> Sexe &nbsp;: </label>
        <input class ="uk-input" type="text" name="sexeacteur" id="sexeacteur" required>
    </p>  
    <p>
        <label for="datenaiacteur"> Date de Naissance &nbsp;: </label>
        <input class ="uk-input" type="date" name="datenaiacteur" id="datenaiacteur" required>
    </p>    
   
    <p class="submit-row">
        <input type="submit" name="submit" value="Ajouter l'acteur">
    </p>

</form>