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
				<form method="POST" action="stock.php">
					<table class="myTab">
						<tr>
							<td>Libelle</td>
							<td>Description</td>
							<td>Prix</td>
							<td>Quantité</td>
						</tr>
						<?php echo $content; ?>
					</table>
					<p class='lead text-muted' style="text-align : center">Votre Panier est vide</p>
					<input type='submit' name='cancel' class='btn btn-secondary my-2' value="Vider votre panier">
					<input type="submit" name="update" value="Enregistrer" class='btn btn-primary my-2'>
				</form>
			</div>
		</section>
	</center>
</main>