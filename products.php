<?php
	include('includes/session.php');
	
	include('controleur/controler.php');
	include("controleur/config.php");
	$unC = new Controleur($serveur, $bdd, $user, $mdp);
	
	$unC->setTable("produit");
	
	$produits = $unC->selectAll();
	
	//var_dump($produits);
	
	
	$content ="";
	
	foreach($produits as $produit)
	{
		$image = $produit['IMAGE'];
		$description = $produit['DESCRI'];
		$libelle = $produit['LIBELLE'];
		$prix = $produit['PRIX'];
		$link = "product.php?id=".$produit['ID'];
		include("vue/object.php");
		$content = $content.$chaine;
	}
	/**for($i = 0; $i <= 20; $i = $i + 1)
	{
		$image = $produit['IMAGE'];
		$description = $produit['DESCRI'];
		$libelle = $produit['LIBELLE'];
		$prix = $produit['PRIX'];
		$link = "product.php?id=".$produit['ID'];
		include("vue/object.php");
		$content = $content.$chaine;
	}*/
	
	include('vue/body-products.php');
	include('vue/footer.php');
?>