<?php 
	include("modele/modele.php");
	
	class Controleur
	{
		
		private $unModele;
		
		public function __construct($server,$bdd,$user,$mdp) 
		{
			//instanciation du modele 
			$this->unModele = new Modele($server,$bdd,$user,$mdp);
			
		}
		public function setTable($uneTable)
		{
			$this->unModele->setTable($uneTable);
		}
		
		public function selectAll () 
		{
			//acces à la base de données, execution  dela requete 
			// retour  des rasultats : ici on peut controler les 
			// données venant de la base avant de les renvoyer  
			// à l'index. 
			$resultats = $this->unModele->selectAll(); 
			//des traitements 
			
			return $resultats; 
		}
		
		public function selectwhere ($champs,$where,$operateur)
		{
			$resultats = $this->unModele->selectWhere($champs,$where,$operateur);
			return $resultats;
		}
		
		public function selectwhereTables($champs,$where,$operateur, $tables)
		{
			$resultats = $this->unModele->selectWhereTables($champs,$where,$operateur, $tables);
			return $resultats;
		}
		
		public function insert($tab)
		{
			$this->unModele->insert($tab);
		}
		
		public function delete ($where,$operateur)
		{
			$this->unModele->delete($where,$operateur);
		}
		
		public function update ($champs,$where,$operateur)
		{
			$this->unModele->update($champs,$where,$operateur);
		}
	}
	
?>