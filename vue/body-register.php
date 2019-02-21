<main role='main'>
	<section class='jumbotron text-center'>
        <div class='container'>
			<h1 class='jumbotron-heading'>Inscription</h1>
			<form style='text-align: right; position:relative; right:200px' action="register.php" method="POST">
				Email : <input type='email' name='mail'></input><br>
				Mot de passe : <input type='password' name='mdp'></input><br>
				Vérifier mot de passe : <input type='password' name='mdpcheck'></input><br>
				Nom : <input type='text' name='nom'></input><br>
				Prénom : <input type='text' name='prenom'></input><br>
				Adresse : <input type='text' name='adresse'></input><br>
				<p>
					<a href='index.php' class='btn btn-secondary my-2'>Retour</a>
					<input type="submit" name="submit" value="S'inscrire" class='btn btn-primary my-2'>
				</p>
			</form>
			<p class='lead text-muted'><?php echo $erreur; ?></p>
			
		</div>
	</section>
</main>