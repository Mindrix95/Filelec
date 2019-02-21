<main role='main'>
	<center>
		<section class='jumbotron text-center'>
			<div class='container'>
				<h1 class='jumbotron-heading'>Pannier</h1>
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
						<td>Produit</td>
						<td>Quantité</td>
						<td>Service instalation</td>
						<td>Prix total</td>
						<td>Supprimer</td>
					</tr>
					<?php echo $content; ?>
				</table>
				<p class='lead text-muted' style="text-align : center"><?php echo $message; ?></p>
				<a href='register.php' class='btn btn-secondary my-2'>Vider votre panier</a>
				<form method="POST" action="commandes.php">
					<input type="submit" name="paye" value="Payer" class='btn btn-primary my-2'>
				</form>
			</div>
		</section>
	</center>
</main>