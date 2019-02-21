<h2>Liste des elèves de l'école Iris</h2>

<?php

	/* affichage des données */
	echo "<table border=1>
	<tr><td>Id eleve </td>
	<td>Nom </td>
	<td>Prénom </td>
	<td>Adresse </td>
	<td>Id classe </td></tr>";
	foreach($resultats as $unresultat) {
		echo "<tr>
		<td>".$unresultat["ideleve"]."</td>
		<td>".$unresultat["nom"]."</td>
		<td>".$unresultat["prenom"]."</td>
		<td>".$unresultat["adresse"]."</td>
		<td>".$unresultat["idclasse"]."</td>
		</tr>";
	}
	echo "</table>";

?>