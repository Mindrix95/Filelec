<main role='main'>
	<center>
		<section class='jumbotron text-center'>
			<div class='container' style='max-width : 60rem'>
				<h1 class='jumbotron-heading'>Mes commandes</h1>
				<style>
						.myTab {
							margin : 30 auto;
							
						}
						.myTab td {
							border : solid black 1px;
							padding : 3px;
							height : 24px;
						}
				</style>
				
				<table class="myTab">
					<tr>
						<td>Numéro de commande</td>
						<td>Date</td>
						<td>Produit</td>
						<td>Quantité</td>
						<td>Service installation</td>
						<td>Livraison</td>
						<td>Etat</td>
						<td>Prix total</td>
					</tr>
					<?php echo $content; ?>
				</table>
				<p class='lead text-muted' style="text-align : center">Votre Panier est vide</p>
				<a href='register.php' class='btn btn-secondary my-2'>Vider votre panier</a>
				<form method="POST" action="panier.php">
					<input type="submit" name="paye" value="Payer" class='btn btn-primary my-2'>
				</form>
			</div>
		</section>
	</center>
</main>