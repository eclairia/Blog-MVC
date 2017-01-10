<?php 

	if(isset($_POST['id']))
	{
		//var_dump($_POST);
		include_once("app/model/commentaire/inserer_commentaire.php");
		$resultat = inserer_commentaire($_POST, $_SESSION["user"]["ID"]);

		if($resultat)
			header("Location:?module=article&action=detail&id=". $_POST["id"] . "&notif=ok");

		else
			header("Location:?module=article&action=detail&id=". $_POST["id"] . "&notif=nok");
	}

	else
	{
		die("POST absent !");
	}