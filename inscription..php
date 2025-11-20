<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  session_start(); // Pour les massages

  // Contenu du formulaire :
  $nom =  htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email =  htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $adresse=  htmlentities($_POST['adresse']);
  $telephone= htmlentities($_POST['telephone']);
  $role =htmlentities($_POST['role']); 
  

  // Option pour bcrypt (voir le lien du cours vers le site de PHP) :
  $options = [
        'cost' => 10,
  ];
  // On crypte le mot de passe
  $password_crypt = password_hash($password, PASSWORD_BCRYPT, $options);

  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, $dbname);
  if ($mysqli->connect_error) {
    $_SESSION['erreur']="Problème de connexion à la base de données ! &#128557;";
      // die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              // . $mysqli->connect_error);
              header('Location: index.php');
    exit;

  }

  // À faire : vérifier si l'email existe déjà !
  if ($stmt = $mysqli->prepare("SELECT COUNT(*) FROM utilisateurs WHERE E_mail = ?")) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // L'email existe déjà
        $_SESSION['erreur'] = "L'email est déjà utilisé !";
        header('Location: index.php');
        exit;
    }
}

  // Modifier la requête en fonction de la table et/ou des attributs :
  if ($stmt = $mysqli->prepare("INSERT INTO utilisateurs(Nom, Prenom, E_mail, Mot_de_passe, Adresse, Telephone, Role) VALUES (?, ?, ?, ?, ?, ?, ?)")) {

    $stmt->bind_param("sssssss", $nom, $prenom, $email, $password_crypt,$adresse,$telephone, $role);
    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt->execute()) {
        // Requête exécutée correctement 
        $_SESSION['message'] = "Enregistrement réussi";

    } else {
        // Il y a eu une erreur
        $_SESSION['erreur'] =  "Impossible d'enregistrer";
    }
  }
 


  header('Location: index.php');


?>