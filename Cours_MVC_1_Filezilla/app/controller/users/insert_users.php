<?php

	protection("user", "users", "login", USER_ADMIN);

	if(empty($_POST))
	{
		//Appel de la vue correspondante
		define("APP_LANG", "fr");
		define("PAGE_TITLE", 'Insérer un user');
		include_once('app/view/users/insert_users.php');
	}

	else
	{
		$_POST["user_pass"] = md5($_POST["user_pass"] . SALT);	
		//Appel du modele pour insérer un utilisateur
		include_once("app/model/users/inserer_users.php");
		$retour = inserer_users($_POST);


		if(!$retour)
		{
			//header("Location:?module=article&action=new&notif=nok");
			location("users", "inserer_user", "notif=nok");
		}

		else
		{
			//header("Location:?module=article&action=detail&id=". $retour . "&notif=ok");
			location("users", "all_users", "notif=ok");
		}
	}
