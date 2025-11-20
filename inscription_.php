<?php
  $titre = "Inscription";

  include('header.inc.php');
  
  

?>
<link rel="stylesheet" href="style_page_inscription.css">
  <h1>Création d'un compte</h1>
  <form  method="POST" action="tt_inscription.php">

    <!-- Nom et prénom sur une ou deux lignes (en fonction de la taille) -->
    <!-- Ici on utilise le breakpoint medium -->
    <div class="row my-3">
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control " id="nom" name="nom" placeholder="Votre nom..." required>
        </div>
        <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Votre prénom..." required>
        </div>
    </div>
    <!-- email et mot de passe -->
    <div class="row">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email..."
            pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$" required title="L'email doit se terminer par @gmail.com">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control " id="password" name="password" placeholder="Votre mot de passe..." required>
        </div>
    </div>
    <!--adresse et téléphone -->
    <div class="row">
        <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control " id="adresse" name="adresse" placeholder="Votre adresse..." required>
        </div>
        <div class="col-md-6">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="tel" class="form-control " id="telephone" name="telephone" placeholder="Votre numero de telephone..." required>
        </div>
    </div>
    <!--Rôle-->
    <div class="row">
        <div class="col-md-6">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-control" id="role" name="role" required>
                <option value="">-- Sélectionner un rôle --</option>
                <option value="1">Client</option>
                <option value="2">Déménageur</option>
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="d-grid d-md-block">
            <button class="btn btn-outline-primary" type="submit">Inscription</button></div>   
        </div>
    </div>
</form>
 
<?php
  include('footer.inc.php');
?>