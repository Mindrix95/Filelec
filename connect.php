<?php
	session_start();
	
	
	$erreur = "";
	if (isset($_POST['submit'])) {
		include("controleur/controler.php");
		include("controleur/config.php");
		$unC = new Controleur($serveur, $bdd, $user, $mdp);
		$unC->setTable("user");
		
		$mail = $_POST['mail'];
		$mdp = sha1($_POST['mdp']);
		
		$where = array("MAIL"=>$mail, 'MDP'=>$mdp);
		$operateur = " AND ";
		$champs = array("idUser", "MAIL", "MDP", "NOM", "PRENOM", "ADRESSE", "ISADMIN");
		$reqmail = $unC->selectWhere($champs, $where, $operateur);
		$reqmail = $reqmail[0];
		$credentialsExists = sizeof($reqmail);
		if($credentialsExists == 0)
		{
			$erreur = "Identifiants incorrects";
		}
		else
		{
			$erreur = "Connexion réussi, vous allez être redirigé automatiquement vers la page d'acceuil";
			
			$_SESSION['id'] = $reqmail['idUser'];
			$_SESSION['mail'] = $reqmail['MAIL'];
			$_SESSION['mdp'] = $reqmail['MDP'] ;
			$_SESSION['nom'] = $reqmail['NOM'] ;
			$_SESSION['prenom'] = $reqmail['PRENOM'] ;
			$_SESSION['adresse'] = $reqmail['ADRESSE'] ;
			$_SESSION['isadmin'] = $reqmail['ISADMIN'] ;
		}
		
		
		
	}
	
	include('includes/session.php');
	include('vue/body-connect.php');
	include('vue/footer.php');
?>