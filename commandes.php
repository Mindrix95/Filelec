<?php 
	
	include('includes/session.php');
	
	include("controleur/controler.php");
	include("controleur/config.php");
	
	
	$unC = new Controleur($serveur, $bdd, $user, $mdp);
	
	if(isset($_POST['paye']))
	{
		$tables = array("panier", "produit", "service", "user");
		$where = array("panier.idUser"=>$_SESSION['id'],
		"panier.ID"=>"produit.ID",
		"produit.idService"=>"service.ID",
		"user.idUser"=>$_SESSION['id']
		);
		$operateur = " AND ";
		$champs = array("panier.QTT", "panier.SERVICE", "produit.LIBELLE", "produit.PRIX as prixProduit", "service.PRIX as prixService", "produit.ID as idProduit", "panier.idPanier", "service.ID as idService", "nbCommande");
		$paniers = $unC->selectWhereTables($champs, $where, $operateur, $tables);
		var_dump($paniers);
		$reduction = 0;
		foreach($paniers as $panier)
		{
			if($panier['nbCommande']%5 == 0)
			{
				$reduction = 1;
			}
			$date = date('Y-m-d');
			$dateLivre = date('Y-m-d', strtotime($date."+7 day"));
			$service = null;
			if($panier['SERVICE'] == 1)
			{
				$service = $panier['idService'];
			}
			$prixTotal = 0.00;
			if($panier['SERVICE'] == 1)
			{
				$prixTotal = $panier['QTT'] * $panier['prixProduit'] + $panier['prixService'];
			}
			else
			{
				$prixTotal = $panier['QTT'] * $panier['prixProduit'];
			}
			if($reduction)
			{
				$prixTotal = $prixTotal * 0.90;
			}
			$champs = array(
			"REFCOM" => NULL,
			"idUser" => $_SESSION['id'],
			"DATECOM" => $date,
			"DATELIVRE" => $dateLivre,
			"ETAT" => "Prise en charge",
			"idProduit" => $panier['idProduit'],
			"idService" => $service,
			"qtt" => $panier['QTT'],
			"prix" => round($prixTotal, 2),
			);
			echo "ha";
			var_dump($champs);
			$unC->setTable('commandes');
			$unC->insert($champs);
		}
	}
	
	
	
	
	
	$content = "";
	
	$tables = array("commandes", "produit", "service");
	$where = array("commandes.idUser"=>$_SESSION['id'],
	"commandes.idProduit"=>"produit.ID"
	);
	$operateur = " AND ";
	$champs = array(
	"commandes.REFCOM",
	"commandes.DATECOM",
	"commandes.prix",
	"commandes.ETAT",
	"commandes.DATELIVRE",
	"commandes.qtt as QTT",
	"commandes.idService",
	"produit.ID as idProduit",
	"produit.LIBELLE"
	);
	$commandes = $unC->selectWhereTables($champs, $where, $operateur, $tables);
	var_dump($commandes);
	foreach($commandes as $commande)
	{
		$content .= "<tr>";
		$content .= "<td><form method='POST' action='commande.php'><input type='hidden' name='REFCOM' value=".$commande['REFCOM']."><input name='afficher' value=".$commande['REFCOM']." type='submit'></form></td>";
		$content .= "<td><p>".$commande['DATECOM']."</p></td>";
		$content .= "<td><p>".$commande['LIBELLE']."</p></td>";
		$content .= "<td><p>".$commande['QTT']."</p></td>";
		$content .= "<td><p>";
		if($commande['idService'] != NULL)
		{
			$content .= "Inclus";
		}
		else
		{
			$content .= "Non inclus";
		}
		$content .= "</p></td>";
		$content .= "<td><p>".$commande['DATELIVRE']."</p></td>";
		$content .= "<td><p>".$commande['ETAT']."</p></td>";
		$content .= "<td><p>".$commande['prix']."€</p></td>";
		$content .= "</tr>";
		
		
		$delete = "<form method='POST' action='panier.php'><input type='hidden' name='idPanier' value=''><input type='submit' name='delete' value='X'></form>";
		
	}
	
	include('vue/body-commandes.php');
	include('vue/footer.php');
?>