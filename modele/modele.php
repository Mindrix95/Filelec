<?php

class Modele{

	private $unPdo, $uneTable;

	 public function __construct($server, $bdd, $user, $mdp) 
	{
		$this->unPdo = null;
		try {
			$this->unPdo=new PDO("mysql:host=".$server.";dbname=".$bdd,$user,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); 
			}
			catch(PDOexeption $exp) 
				{
					echo "Erreur de connexion au serveur !";
					echo $exp->getMessage();
			}
			
	}

	public  function setTable($uneTable)
	{
		$this->uneTable=$uneTable;
	}
	public function selectAll()
	{
		
		if ($this->unPdo != null )
		{

		/* Extraction des donnée avec select */ 
		$requete = "select * from  ".$this->uneTable.";" ;
		//echo $requete;
		/* preparatio de la requete */ 
		$select = $this->unPdo->prepare ($requete);
		/* execution de la requete */  
		$select->execute (); 
		/* extraction de tous les tuples */ 
		$resultats = $select->fetchAll();
		return $resultats;
		}
		else 
		{
			return null; 
		}
	}

	
	public function selectWhere($champs,$where,$operateur)
	{
		
		if ($this->unPdo != null )
		{
			//transformation du array en chaine de caractére séparée par une virgule
			$chaineChamps = implode(",",$champs);

			$donnees = array();
			$tabwhere = array();
			foreach($where as $cle => $valeur)
			{
				$tabwhere[] = $cle."= :".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaineWhere = implode($operateur,$tabwhere);

		/* Extraction des donnée avec select */ 
		$requete = "select ".$chaineChamps." from  ".$this->uneTable." where ".$chaineWhere.";" ;
		//echo $requete;$this->where
		/* preparatio de la requete */ 
		$select = $this->unPdo->prepare($requete);
		$select->execute($donnees); 
		/* extraction de tous les tuples */ 
		$resultats = $select->fetchAll();
		return $resultats;
		}
		else 
		{
			return null; 
		}
	}
	
	public function selectWhereTables($champs,$where,$operateur, $tables)
	{
		$chaineTables = implode(", ", $tables);
		if ($this->unPdo != null )
		{
			//transformation du array en chaine de caractére séparée par une virgule
			$chaineChamps = implode(",",$champs);

			$tabwhere = array();
			foreach($where as $cle => $valeur)
			{
				$tabwhere[] = $cle." = ".$valeur;
				//$donnees[":".$cle] = $valeur;
			}
			$chaineWhere = implode($operateur,$tabwhere);

		/* Extraction des donnée avec select */ 
		$requete = "select ".$chaineChamps." from  ".$chaineTables." where ".$chaineWhere.";" ;
		//echo $requete;$this->where
		/* preparatio de la requete */ 
		var_dump($requete);
		$select = $this->unPdo->prepare($requete);;
		$select->execute(); 
		/* extraction de tous les tuples */ 
		$resultats = $select->fetchAll();
		return $resultats;
	}
	else 
	{
		return null; 
	}
}

	public function insert($tab)
	{
		if($this->unPdo != null)
		{
			
			$donnees = array();
			$champsTab=array();
			$champsBDD = array();
			//construction des donnés dans le value
			foreach($tab as $cle => $valeur)
			{
				$champsBDD[] = $cle;
				$champsTab[] = ":".$cle;
				$donnees[":".$cle] = $valeur;
			}
			//separation des données par virgules 
			$chaineTab = implode(",",$champsTab);
			$chaineBDD = implode(",",$champsBDD);
			$requete = "insert into ".$this->uneTable." (".$chaineBDD.") values (".$chaineTab.");";
			//preparation avant execution
			$insert = $this->unPdo->prepare($requete);
			$insert->execute ($donnees);
		}
	}

	public function delete($where,$operateur)
	{
		if($this->unPdo != null)
		{
			
			$donnees = array();
			$champsWhere=array();
			//construction des donnés dans le value
			foreach($where as $cle => $valeur)
			{
				$champsWhere[] = $cle."=:".$cle;
				$donnees[":".$cle] = $valeur;
			}
			//separation des données par virgules 
			$chaineWhere = implode($operateur,$champsWhere);

			$requete = "delete from ".$this->uneTable." where ".$chaineWhere." ;";
			//preparation avant execution
			$delete = $this->unPdo->prepare($requete);
			$delete->execute ($donnees); 
		}
	}

	public function update($champs, $where, $operateur)
	{
		if($this->unPdo == null)
		{
			return null;
		}
		else
		{
			$donnees = array();
			$champsWhere = array();
			$champsSet = array();

			foreach ($champs as $cle => $valeur)
			{
				$champsSet[] = $cle."=:".$cle;
				$donnees[":".$cle]= $valeur;
			}
			$chaineChamps = implode (",",$champsSet);

			foreach($where as $cle => $valeur)
			{
				$champsWhere[] = $cle."=:".$cle;
				$donnees[":".$cle]= $valeur;
			}
			$chaineWhere = implode ($operateur,$champsWhere);

			$requete = "update ".$this->uneTable." set ".$chaineChamps." where ".$chaineWhere." ;";
			$update = $this->unPdo->prepare($requete);
			$update->execute($donnees);
		}
	}
}
?>
