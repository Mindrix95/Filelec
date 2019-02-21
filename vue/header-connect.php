<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='bootstrap/favicon.ico'>

    <title>Filelec</title>

    <!-- Bootstrap core CSS -->
    <link href='bootstrap/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='bootstrap/album.css' rel='stylesheet'>
  </head>

  <body>

    <header>
	
      <div class='collapse bg-dark' id='navbarHeader'>
        <div class='container'>
          <div class='row'>
            <div class='col-sm-8 col-md-7 py-4'>
              <h4 class='text-white'>MENU</h4>
			  <ul class='list-unstyled'>
                <li><a href='index.php' class='text-white'>Accueil</a></li>
				<li><a href='products.php' class='text-white'>Les produits</a></li>
				<li><a href='services.php' class='text-white'>Les services</a></li>
				<li><a href='contact.php' class='text-white'>Nous contacter</a></li>
			  </ul>
            </div>
            <div class='col-sm-4 offset-md-1 py-4'>
              <h4 class='text-white'>Mon compte</h4>
              <ul class='list-unstyled'>
				<li><a href='panier.php' class='text-white'>Mon panier</a></li>
				<hr>
                <li><a href='panier.php' class='text-white'>Mon profil</a></li>
				<li><a href='commandes.php' class='text-white'>Mes commandes</a></li>
				<hr>
				<li>
					<form action="index.php" method="POST">
						<style>
							.sedeco {padding : 0; background-color: transparent; border: 0; font-size: 1rem; cursor: pointer;}
							.sedeco:hover {text-decoration : underline;}
						</style>
						<input value='Se déconnecter' name="destroy" class='text-white sedeco' type="submit" ></input>
					</form>
				</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
	  
      <div class='navbar navbar-dark bg-dark shadow-sm'>
        <div class='container d-flex justify-content-between'>
          <a href='index.php' class='navbar-brand d-flex align-items-center'>
            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='mr-2'><path d='M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z'></path><circle cx='12' cy='13' r='4'></circle></svg>
            <strong>Filelec</strong>
          </a>
		  <style>
			.utilisateur {margin: auto 0; position: absolute; right : 125px; color : white}
		  </style>
		  <p class="utilisateur"><?php echo $_SESSION['prenom']." ".$_SESSION['nom'] ?></p>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarHeader' aria-controls='navbarHeader' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
        </div>
      </div>
    </header>