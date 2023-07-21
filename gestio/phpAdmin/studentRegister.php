<form action="traitementAdmin/insertEtudiant.php" method="POST">
    <h1>Informations Etudiant  </h1>
    <div class="boiteEnr1">
        <input class="entree" type="text" placeholder="Nom" name="nom" required /><br/>
        <input class="entree" type="text" placeholder="Prénom" name="prenom" required /><br/>
        <input class="entree" type="text" placeholder="Matricule" name="matricule" required /><br/>
        <input class="entree" type="email" placeholder="email" name="email" required /><br/>
        <input class="entree" type="tel" placeholder="téléphone" name="telephone" required /><br/>
        <input class="entree" type="text" placeholder="Nationnalité" name="pays" required /><br/>
        <input class="entree" type="text" placeholder="Ville d'origine" name="ville" required /><br/>
        <input class="entree" type="date" name="dataNaissance" required /><br/>
        <p class="radio">
            <label for="sexe1">Homme : </label><input id="sexe1" type="radio" name="sexe" value="homme" require="required" checked/>
            <label for="sexe2">Femme : </label><input id="sexe2" type="radio" name="sexe" value="femme" require="required" />
        </p>
    </div><br/>

    <h1>Informations Scolaire</h1>
    <div class="boiteEnr1">
        <select name="specialite" required>
            <option value="Génie logiciel">Génie logiciel</option>
            <option value="Sécurité informatique">Sécurité informatique</option>
            <option value="Internet et multimédia">Internet et multimédia</option>
        </select><br/>
        <select name="classe" required>
            <option value="Licence 1">Licence 1</option>
            <option value="Licence 2">Licence 2</option>
            <option value="Licence 3">Licence 3</option>
            <option value="Licence 4">Master 1</option>
            <option value="Licence 5">Master 2</option>
        </select><br/>
        <select name="annee" required>
            <option value="2018-2019">2018-2019</option>
            <option value="2019-2020">2019-2020</option>
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
        </select><br/><br/>
    </div><br/>

    <h1>Informations Extra-Scolaire</h1>
    <div class="boiteEnr1">
        <input class="entree" type="text" placeholder="Nom du pere" name="nomPapa" required /><br/>
        <input class="entree" type="text" placeholder="prénom du pere" name="prenomPapa" required /><br/>
        <input class="entree" type="tel" placeholder="téléphone" name="telephonePapa" required /><br/>
        <input class="entree" type="text" placeholder="Nom de la mere" name="nomMaman" required /><br/>
        <input class="entree" type="text" placeholder="prénom de la mere" name="prenomMaman" required /><br/>
        <input class="entree" type="tel" placeholder="téléphone" name="telephoneMaman" required /><br/>
        <input class="entree" type="tel" placeholder="téléphone en cas d'urgence" name="telephoneMaman" required /><br/><br/>
    </div><br/>
    <div class="send">
        <input class="bouton" type="submit" value="Enregistrer"/>
    </div>
</form>
