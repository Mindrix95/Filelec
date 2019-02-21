<?php
	include('includes/session.php');
	
	include("controleur/controler.php");
	include("controleur/config.php");
	
	
	$unC = new Controleur($serveur, $bdd, $user, $mdp);
	$retourPanier = "";
	//Set selected product with the GET id value
	if(isset($_GET['id']))
	{
		$unC->setTable("produit");
		$where = array("ID"=>$_GET['id']);
		$operateur = " ";
		$champs = array("*");
		$produit = $unC->selectWhere($champs, $where, $operateur);
		if($produit == NULL)
		{
			//Ce produit n'existe pas
			include("vue/body-notfound.php");
		}
		else
		{
			//var_dump($produit);
			$produit = $produit[0];
			
			//set services linked with this product
			$tables = array("service","produit");
			$where = array("service.ID"=>"produit.idService",
			"produit.id"=>$produit['ID']
			);
			$operateur = " AND ";
			$champs = array("service.id", "service.libelle", "service.descri", "service.image", "service.prix");
			$service = $unC->selectWhereTables($champs, $where, $operateur, $tables);
			
			//var_dump($service);
			
			$service = $service[0];
			
			if(isset($_POST['ajoutpanier'])) {
				$idProduit = $_POST['produit'];
				$idService = $_POST['service'];
				$inclus = $_POST['inclus'];
				$qtt = $_POST['quantite'];
				$idUser = $_SESSION['mail'];
				
				$unC->setTable("panier");
				
				$champs = array("idUser"=>$_SESSION['id'], "ID"=>$idProduit, "QTT"=>$qtt, "SERVICE"=>$inclus);
				$unC->insert($champs);
				
				$retourPanier = "<div style='background-color : green; height : 30px; width : auto;'><p style='color : white; margin : auto auto; text-align : center'>Ce produit à bien été ajouté à votre panier</p></div>";
				include('vue/body-product.php');
				
			}
			else {
				include('vue/body-product.php');
			}
		}
	}
	else
	{
		include("vue/body-notfound.php");
	}
	
	
	
	
	include('vue/footer.php');
	
	
	
?>