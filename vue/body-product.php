<main role='main'>
	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="margin: 0 auto">Ajouter au panier</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem 0">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class='container'><center>
						<h1 class='jumbotron-heading'><?php echo $produit['LIBELLE']; ?></h1>
						<img src='images/produits/1.png'/>
						<p class='lead text-muted'><?php echo $produit['DESCRI']; ?></p>
						<p style="display: inline-block;">Prix : <?php echo $produit['PRIX']; ?>€ / pièce</p>
						<br>
					</div>
					<hr>
					<p style="display : inline">Quantité : <input id="qtt1" onclick="updatePrix(<?php echo $produit['PRIX'];?>, 1)" type="number" min="0" style="width : 50px;" value="1"></input></p>
					<p style="display : inline; float : right">+<span id="prixproduit" class="panier"><?php echo $produit['PRIX'];?></span>€</p>
					<hr>
					<button id="forminclu" style="display : inline" type="button" class="btn btn-secondary my-2" data-toggle="modal" data-target="#exampleModal2">
						Inclure l'installation
					</button>
					<p id="affprixservice" style="display : none; float : right">+<span id="prixservice"><?php echo $service['prix'];?></span>€</p>
					<hr>
					<p>Prix total : </p>
					<p style="display : inline; float : right"><span id="prixtotal"><?php echo $produit['PRIX'];?></span>€</p>
					</center>
				</div>
				<div class="modal-footer">
					<form method="POST" action="product.php?id=<?php echo $produit['ID']?>">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
						<input type="hidden" name="produit" value="<?php echo $produit['ID']; ?>">
						<input type="hidden" name="service" value="<?php echo $service['id']; ?>">
						<input type="hidden" name="inclus" id="inpinclus" value="0">
						<input type="hidden" name="quantite" value="1" id="quantite">
						<input type="submit" class="btn btn-primary" name="ajoutpanier" value="Ajouter au panier"> </input>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="margin: 0 auto">Inclure un service</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem 0">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<div>
						<img src="<?php echo $service['image']; ?>"></img>
						<h3><?php echo $service['libelle']; ?></h3>
						<p><?php echo $service['descri']; ?></p>
						<p style="display : inline">Prix : <?php echo $service['prix']; ?>€</p>	
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="button" class="btn btn-primary" onclick="inclus()" id="inclus">Inclure</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="ressources/updatePrix.js"></script>
	<?php echo $retourPanier; ?>
	<section class='jumbotron text-center'>
		<div class='container'>
			<h1 class='jumbotron-heading'><?php echo $produit['LIBELLE']; ?></h1>
			<img src='images/produits/1.png'/>
			<p class='lead text-muted'><?php echo $produit['DESCRI']; ?></p>
			<p style="display: inline-block;">Prix : <?php echo $produit['PRIX']; ?>€ / pièce</p>
			<p>
				<form method="POST">
					Quantité : <input id="qtt0" onclick="updatePrix(<?php echo $produit['PRIX'];?>, 0)" type="number" min="0" style="width : 50px;" value="1"></input>
					
					<button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModal1">Ajouter au panier <span class="panier" color="green"><?php echo $produit['PRIX'];?>€</span></button>
					<button type="button" class="btn btn-secondary my-2" data-toggle="modal" data-target="#exampleModal2">
						Inclure un service
					</button>
					<!-- <a href='#' class='btn btn-secondary my-2'>Inclure un service</a> -->
					<input type="hidden" name="id" value="<?php echo $produit['ID']; ?>"></input>
				</form>
			</p>
		</div>
	</section>
</main>

