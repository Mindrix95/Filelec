<?php
	include('includes/session.php');
	$nom = $prenom = $mail = $message = $disabled = "";
	
	if(isset($_POST['sub']))
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$message = $_POST['message'];
		sendMail($nom, $prenom, $mail, $message);
	}
	if(isset($_SESSION['mail']))
	{
		$nom = $_SESSION['nom'];
		$prenom = $_SESSION['prenom'];
		$mail = $_SESSION['mail'];
		$disabled = " readonly='readonly' ";
	}
	
	
	
	
	include('vue/body-contact.php');
	
	include('vue/footer.php');
	
	
	function sendMail($nom, $prenom, $mail, $message)
	{
		$to = "nicomaindroult@hotmail.fr";
		$corps = "<html>
		<head><title>Message client de Filelec</title></head>
		<body>
		<p>Message de la part de ".$nom." ".$prenom."</p>
		<p>Adresse de messagerie : ".$mail."</p>
		<p>Message :</p>
		<p>".$message."</p>
		</body>
		</html>";
		$test = "Message de la part de ".$nom." ".$prenom."\n\nAdresse de messagerie : ".$mail."\n\nMessage :\n".$message;
		$body = "";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		if(mail($to, "Message client de Filelec", $corps, $headers))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
?>