<?php 
	
	include('includes/session.php');
	
	include("controleur/controler.php");
	include("controleur/config.php");
	
	
	$unC = new Controleur($serveur, $bdd, $user, $mdp);
	
	if(isset($_POST['update']))
	{
		echo "lol";
		$unC->setTable('produit');
		for($i = 0; $i <= $_POST['i']; $i++)
		{
			echo "ha";
			$champs = array(
				"QTT" => $_POST['qtt'.$i]
			);
			$where = array(
				"ID"=>$_POST[$i]
			);
			$operateur = "";
			$unC->update($champs,$where,$operateur);
		}
	}
	
	
	$content = "";
	
	$unC->setTable('produit');
	$produits = $unC->selectAll();
	var_dump($produits);
	$i = 0;
	foreach($produits as $produit)
	{
		$content .= "<tr>";
		$content .= "<td><p>".$produit['LIBELLE']."</p></td>";
		$content .= "<td><p>".$produit['DESCRI']."</p></td>";
		$content .= "<td><p>".$produit['PRIX']."</p></td>";
		$content .= "<td><input type='hidden' name='".$i."' value=".$produit['ID']."><input name='qtt".$i."' value=".$produit['QTT']." type='number'></td>";
		$content .= "</tr>";
		$i++;
	}
	$i -= 1;
	$content .= "<input type='hidden' name='i' value='".$i."'>";
	include('vue/body-stock.php');
	include('vue/footer.php');
?>