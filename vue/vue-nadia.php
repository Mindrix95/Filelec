<h2>Liste des elèves de l'école Iris</h2>

<?php
	/* affichage des données */
	echo "<table border=1>
	<tr><td>Nom</td>
	<td>Prenom</td>
	<td>Classe </td>
	<td>Salle </td></tr>";
	foreach($resultats as $unresultat) {
		echo "<tr>
		<td>".$unresultat["nom"]."</td>
		<td>".$unresultat["prenom"]."</td>
		<td>".$unresultat["classe"]."</td>
		<td>".$unresultat["salle"]."</td>
		</tr>";
	}
	echo "</table>";
?>