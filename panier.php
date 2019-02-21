<?php
	include('includes/session.php');
	
	include("controleur/controler.php");
	include("controleur/config.php");
	
	
	$unC = new Controleur($serveur, $bdd, $user, $mdp);	
	
	//$content = "<td></td><td></td><td></td><td></td><td></td>";
	$content = "";
	$message = "";
	$tables = array("panier", "produit", "service", "user");
	$where = array("panier.idUser"=>$_SESSION['id'],
	"panier.ID"=>"produit.ID",
	"produit.idService"=>"service.ID",
	"user.idUser"=>$_SESSION['id']
	);
	$operateur = " AND ";
	$champs = array("panier.QTT", "panier.SERVICE", "produit.LIBELLE", "produit.PRIX as prixProduit", "service.PRIX as prixService", "produit.ID as idProduit", "panier.idPanier", "user.nbCommande");
	$paniers = $unC->selectWhereTables($champs, $where, $operateur, $tables);
	var_dump($paniers);
	$reduction = 0;
	foreach($paniers as $panier)
	{
		if($panier['nbCommande']%5 == 0)
		{
			$reduction = 1;
		}
		$produit = "<a href='product.php?id=".$panier['idProduit']."'>".$panier['LIBELLE']."</a>";
		$qtt = $panier['QTT'];
		
		$inclus = "Non inclus";
		$prixTotal = 0.00;
		
		if($panier['SERVICE'] == 1)
		{
			$inclus = "Inclus";
			$prixTotal = $panier['QTT'] * $panier['prixProduit'] + $panier['prixService'];
		}
		else
		{
			$prixTotal = $panier['QTT'] * $panier['prixProduit'];
		}
		
		$delete = "<form method='POST' action='panier.php'><input type='hidden' name='idPanier' value='".$panier['idPanier']."'><input type='submit' name='delete' value='X'></form>";
		
		$content = $content."<tr><td>".$produit."</td><td>".$qtt."</td><td>".$inclus."</td><td>".$prixTotal."</td><td>".$delete."</td></tr>";
	}
	if($reduction)
	{
		$message = "Vous avez une réduction de -10% sur la totalité de votre panier";
	}
	include('vue/body-panier.php');
	include('vue/footer.php');
?>