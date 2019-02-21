<h2>Liste des classes de l'école Iris</h2>

<?php

	/* affichage des données */
	echo "<table border=1>
	<tr><td>Id classe </td>
	<td>Désignation </td>
	<td>Salle </td>
	<td>Diplôme </td>
	<td>Nombre d'élèves </td>
	<td>Supression</td></tr>";
	foreach($resultats as $unresultat) {
		echo "<tr>
		<td>".$unresultat["idclasse"]."</td>
		<td>".$unresultat["designation"]."</td>
		<td>".$unresultat["salle"]."</td>
		<td>".$unresultat["diplome"]."</td>
		<td>".$unresultat["nbeleves"]."</td>
		<td><a href='index.php?idclasse=".$unresultat['idclasse']."'>X</a></td>
		</tr>";
	}
	echo "</table>";

?>
<br>
<form method="POST" action="index.php">
	Designation : <input type="text" name="designation"><br>
	Salle : <input type="text" name="salle"><br>
	Diplome : <input type="text" name="diplome"><br>
	Nb Elèves : <input type="text" name="nbeleves"><br>
	<input type="submit" name="Ajouter" value="Ajouter">
</form>