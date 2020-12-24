<a href="index.php?ctrl=home&method=index"> Retour accueil </a> <br>
<a href="index.php?ctrl=realisateur&method=allRealisateurs"> Retour à la liste des réalisateurs</a> <br>

<h2>Formulaire</h2>

<form action="?ctrl=realisateur&method=addReal" method="POST">
          
    <p>
        <label for="nomreal">Nom  &nbsp;: </label>
        <input class ="uk-input" type="text" name="nomreal" id="nomreal" required>
    </p>
    <p>
        <label for="prenomreal"> Prenom &nbsp;: </label>
        <input class ="uk-input" type="text"  name="prenomreal" id="prenomreal" required>
    </p>
    <p>
        <label for="sexereal"> Sexe &nbsp;: </label>
        <input class ="uk-input" type="text" name="sexereal" id="sexereal" required>
    </p>  
    <p>
        <label for="datenaireal"> Date de Naissance &nbsp;: </label>
        <input class ="uk-input" type="date" name="datenaireal" id="datenaireal" required>
    </p>    
   
    <p class="submit-row">
        <input type="submit" name="submit" value="Ajouter le réalisateur">
    </p>