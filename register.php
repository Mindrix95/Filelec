
<?php

include('includes/session.php');
include("controleur/controler.php");
include("controleur/config.php");
$unC = new Controleur($serveur, $bdd, $user, $mdp);
$unC->setTable("user");

$erreur = "";

if (isset($_POST['submit'])) {

	// $pseudo = htmlspecialchars($_POST['pseudo']);

	$mail = htmlspecialchars($_POST['mail']);

	// $mail2 = htmlspecialchars($_POST['mail2']);

	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdpcheck']);
	$adresse = htmlspecialchars($_POST['adresse']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	if (!empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpcheck']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse'])) {
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$where = array("MAIL"=>$mail);
			$operateur = " ";
			$champs = array("MAIL");
			$reqmail = $unC->selectWhere($champs, $where, $operateur);
			$reqmail = $reqmail[0];
			$mailexist = sizeof($reqmail);
			if ($mailexist == 0) {
				if ($mdp == $mdp2) {
					
					$champs = array("idUser"=>NULL"MAIL"=>$mail, "MDP"=>$mdp, "NOM"=>$nom, "PRENOM"=>$prenom, "ADRESSE"=>$adresse);
					$unC->insert($champs);


					$erreur = "Votre compte a bien été créé ! \nVous allez être redirigé automatiquement vers la page de connexion</a>";
					header( 'refresh: 3; url=index.php' );
				}
				else {
					$erreur = "Vos mots de passes ne correspondent pas !";
				}
			}
			else {
				$erreur = "Adresse mail déjà utilisée !";
			}
		}
		else {
			$erreur = "Votre adresse mail n'est pas valide !";
		}
	}
	else {
		$erreur = "Tous les champs doivent être complétés !";
	}

}

include ('vue/body-register.php');

include ('vue/footer.php');

?>
