<?php echo "<main role='main'>
      <section class='jumbotron text-center'>
        <div class='container'>
          <h1 class='jumbotron-heading'>Contactez-nous</h1>
          <p class='lead text-muted'>Merci de remplir tout les champs</p>
		  <style>
			.inputform { width : 300px; }
			.messageform { width : 300px; height : 200px; }
			.tableauform { position : relative;  right : 36px}
		  </style>
		  <center>
		  <form method='POST' action='contact.php'>
		  <table class='tableauform'>
			<tr>
				<td style='width : 70px'>Nom : </td>
				<td><input name='nom' class='inputform' type='text' value='".$nom."' ".$disabled."></input></td>
			</tr>
			<tr>
				<td>Prénom : </td>
				<td><input name='prenom' class='inputform' type='text' value='".$prenom."' ".$disabled."></input></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><input name='mail' class='inputform' type='text' value='".$mail."' ".$disabled."></input></td>
			</tr>
			<tr>
				<td>Message : </td>
				<td><textarea name='message' class='messageform'>".$message."</textarea></td>
			</tr>
		  </table>
		  <button type='submit' class='btn btn-primary my-2' name='sub'>Envoyer</button>
		  </form>
		  </center>
        </div>
      </section>
</main>";
?>