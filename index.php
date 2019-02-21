<?php
	session_start();
	if(isset($_POST['destroy']))
	{
		session_unset();
	}
	include('includes/session.php');
	include('vue/body-default.php');
	$variable = "test";
	echo "<script type='text/javascrypt'>
				window.open('".$variable."', 'panier', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no');
			</script>";
	include('vue/footer.php');
?>