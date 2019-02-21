<main role='main'>
	<center>
		<section class='jumbotron text-center'>
			<div class='container'>
				<h1 class='jumbotron-heading'>Connexion</h1>
				<form style='' action="connect.php" method="POST">
					<div style="text-align: right; position:relative; right:200px">
						Email : <input type='email' name='mail'></input><br>
						Mot de passe : <input type='password' name='mdp'></input><br>
					</div>
					<p>
						<p><?php echo $erreur?></p>
						<a href='register.php' class='btn btn-secondary my-2'>S'inscrire</a>
						<input type="submit" name="submit" value="Se connecter" class='btn btn-primary my-2'>
					</p>
				</form>
				<p class='lead text-muted' style="text-align : center">Si vous avez perdu votre mot de passe, contacter les administarteurs du site</p>
			</div>
		</section>
	</center>
</main>