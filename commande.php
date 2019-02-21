<?php
	require('FPDF/fpdf.php');
	define('EURO',utf8_encode(chr(128)));
	ob_start();
	session_start();
	
	include("controleur/controler.php");
	include("controleur/config.php");
	
	
	$unC = new Controleur($serveur, $bdd, $user, $mdp);
	class PDF extends FPDF
	{
		// Load data
		function LoadData($file)
		{
			// Read file lines
			$lines = file($file);
			$data = array();
			foreach($lines as $line)
			{
				$data[] = explode(';',trim($line));
			}
			
			return $data;
		}
		// Colored table
		function FancyTable($header, $data)
		{
			// Colors, line width and bold font
			$this->SetFillColor(255,0,0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
			// Header
			$w = array(70, 35, 40, 45);
			for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			// Color and font restoration
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Data
			$fill = false;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
				$this->Ln();
				$fill = !$fill;
			}
			// Closing line
			$this->Cell(array_sum($w),0,'','T');
		}
		
		function Cell($w,$h=0,$txt='',$border=0,$ln=0,$align='',$fill=0,$link='') {
			parent::Cell($w,$h, utf8_decode($txt), $border,$ln,$align,$fill,$link);
		}
	}
	
	
	if(isset($_POST['afficher']))
	{		
		$tables = array("commandes", "user", "produit");
		$where = array("commandes.idUser"=>$_SESSION['id'],
		"commandes.REFCOM"=>$_POST['REFCOM'], "user.idUser"=>$_SESSION['id'], "commandes.idProduit" => "produit.ID");
		$operateur = " AND ";
		$champs = array(
		"commandes.REFCOM",
		"commandes.DATECOM",
		"commandes.prix",
		"commandes.ETAT",
		"commandes.DATELIVRE",
		"commandes.qtt as QTT",
		"commandes.idService",
		"produit.LIBELLE",
		"user.NOM",
		"user.PRENOM"
		);
		$commande = $unC->selectWhereTables($champs, $where, $operateur, $tables);
		ob_end_clean();
		//var_dump($commande);
		$commande = $commande[0];
		$username = $commande['NOM'].$commande['PRENOM'];
		$refCom = $commande['REFCOM'];
		$dateCom = $commande['DATECOM'];
		$produit = $commande['LIBELLE'];
		$qtt = $commande['QTT'];
		if($commande['idService'] == NULL)
		{
			$service = "Non inclus";
		}
		else
		{
			$service = "Inclus";
		}
		$livraison = $commande['DATELIVRE'];
		$prixTotal = $commande['prix'].EURO;
		
		$pdf = new PDF();
		// Column headings
		$header = array('Produit', 'Quantité', 'Installation', 'Prix total');
		// Data loading
		//$data = $pdf->LoadData('FPDF/countries.txt');
		
		$data = array (
			array (
			$produit,
			$qtt,
			$service,
			$prixTotal
			)
		);
		
		$pdf->SetFont('Arial','',14);
		$pdf->AddPage();
		$pdf->Cell(80,10,"Numéro de commande : ".$refCom, 0, 0, '', false);
		$pdf->Ln();
		$pdf->Cell(40,10,"Commande effectué le ".$dateCom, 0, 0, '', false);
		$pdf->Ln();
		$pdf->Cell(40,10,"Acheteur : ".$username, 0, 0, '', false);
		$pdf->Ln();
		$pdf->FancyTable($header,$data);
		$pdf->Ln();
		$pdf->Cell(40,10,"Livraison éstimé le : ".$livraison, 0, 0, '', false);
		$pdf->Output();
		
	}
?>